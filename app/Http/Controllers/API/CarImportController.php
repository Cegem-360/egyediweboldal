<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class CarImportController extends Controller
{
    /**
     * Import single car via API
     */
    public function importSingle(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'category' => 'required|in:' . implode(',', array_keys(Car::CATEGORIES)),
            'type' => 'required|in:' . implode(',', array_keys(Car::TYPES)),
            'price' => 'required|numeric|min:0',
            'currency' => 'string|max:10',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'featured' => 'boolean',
            'active' => 'boolean',
            'specifications' => 'nullable|array',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $data = $validator->validated();
            
            // Handle image upload if present
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('cars', 'public');
                $data['image'] = $imagePath;
            }

            // Set defaults
            $data['currency'] = $data['currency'] ?? 'HUF';
            $data['featured'] = $data['featured'] ?? false;
            $data['active'] = $data['active'] ?? true;

            $car = Car::create($data);

            return response()->json([
                'success' => true,
                'message' => 'Car imported successfully',
                'data' => $car
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to import car: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Import multiple cars via API
     */
    public function importBatch(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cars' => 'required|array|min:1|max:100',
            'cars.*.name' => 'required|string|max:255',
            'cars.*.model' => 'required|string|max:255',
            'cars.*.category' => 'required|in:' . implode(',', array_keys(Car::CATEGORIES)),
            'cars.*.type' => 'required|in:' . implode(',', array_keys(Car::TYPES)),
            'cars.*.price' => 'required|numeric|min:0',
            'cars.*.currency' => 'nullable|string|max:10',
            'cars.*.description' => 'nullable|string',
            'cars.*.featured' => 'nullable|boolean',
            'cars.*.active' => 'nullable|boolean',
            'cars.*.specifications' => 'nullable|array',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $importedCars = [];
            $errors = [];

            foreach ($request->cars as $index => $carData) {
                try {
                    // Set defaults
                    $carData['currency'] = $carData['currency'] ?? 'HUF';
                    $carData['featured'] = $carData['featured'] ?? false;
                    $carData['active'] = $carData['active'] ?? true;

                    $car = Car::create($carData);
                    $importedCars[] = $car;
                } catch (\Exception $e) {
                    $errors[] = [
                        'index' => $index,
                        'data' => $carData,
                        'error' => $e->getMessage()
                    ];
                }
            }

            return response()->json([
                'success' => true,
                'message' => 'Batch import completed',
                'imported_count' => count($importedCars),
                'error_count' => count($errors),
                'imported_cars' => $importedCars,
                'errors' => $errors
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to import cars: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Import cars from CSV file
     */
    public function importCsv(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'csv_file' => 'required|file|mimes:csv,txt|max:10240', // 10MB max
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $file = $request->file('csv_file');
            $csvData = array_map('str_getcsv', file($file->path()));
            
            // Remove header row
            $header = array_shift($csvData);
            
            $importedCars = [];
            $errors = [];

            foreach ($csvData as $index => $row) {
                try {
                    // Map CSV columns to car attributes
                    $carData = [
                        'name' => $row[0] ?? '',
                        'model' => $row[1] ?? '',
                        'category' => $row[2] ?? '',
                        'type' => $row[3] ?? '',
                        'price' => floatval($row[4] ?? 0),
                        'currency' => $row[5] ?? 'HUF',
                        'description' => $row[6] ?? '',
                        'featured' => filter_var($row[7] ?? false, FILTER_VALIDATE_BOOLEAN),
                        'active' => filter_var($row[8] ?? true, FILTER_VALIDATE_BOOLEAN),
                    ];

                    // Validate car data
                    $carValidator = Validator::make($carData, [
                        'name' => 'required|string|max:255',
                        'model' => 'required|string|max:255',
                        'category' => 'required|in:' . implode(',', array_keys(Car::CATEGORIES)),
                        'type' => 'required|in:' . implode(',', array_keys(Car::TYPES)),
                        'price' => 'required|numeric|min:0',
                    ]);

                    if ($carValidator->fails()) {
                        $errors[] = [
                            'row' => $index + 2, // +2 because of header and 0-indexing
                            'data' => $carData,
                            'error' => $carValidator->errors()->first()
                        ];
                        continue;
                    }

                    $car = Car::create($carData);
                    $importedCars[] = $car;
                    
                } catch (\Exception $e) {
                    $errors[] = [
                        'row' => $index + 2,
                        'data' => $row,
                        'error' => $e->getMessage()
                    ];
                }
            }

            return response()->json([
                'success' => true,
                'message' => 'CSV import completed',
                'imported_count' => count($importedCars),
                'error_count' => count($errors),
                'imported_cars' => $importedCars,
                'errors' => $errors
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to process CSV: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get import template for CSV
     */
    public function getTemplate()
    {
        $headers = [
            'name',
            'model', 
            'category',
            'type',
            'price',
            'currency',
            'description',
            'featured',
            'active'
        ];

        $sampleData = [
            'Mercedes-Benz C 300',
            'C-Osztály',
            'limuzin',
            'benzines',
            '15990000',
            'HUF',
            'Elegáns és sportos limuzin',
            'false',
            'true'
        ];

        $csv = implode(',', $headers) . "\n" . implode(',', $sampleData);

        return response($csv, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="car_import_template.csv"'
        ]);
    }

    /**
     * Get available categories and types for reference
     */
    public function getReference()
    {
        return response()->json([
            'success' => true,
            'data' => [
                'categories' => Car::CATEGORIES,
                'types' => Car::TYPES,
                'currencies' => ['HUF', 'EUR', 'USD']
            ]
        ]);
    }
}
