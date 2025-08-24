<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use BackedEnum;
use App\Models\Car;
use Illuminate\Support\Facades\Storage;

class CarImport extends Page
{
    
    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-arrow-up-tray';
    
    protected static ?string $navigationLabel = 'Autók importálása';
    
    protected string $view = 'filament.pages.car-import';
    
    protected static ?int $navigationSort = 2;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('downloadTemplate')
                ->label('CSV Sablon letöltése')
                ->icon('heroicon-o-document-arrow-down')
                ->action(function () {
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
                    
                    return response()->streamDownload(
                        function () use ($csv) {
                            echo $csv;
                        },
                        'car_import_template.csv',
                        ['Content-Type' => 'text/csv']
                    );
                }),
                
            Action::make('importCsv')
                ->label('CSV Import')
                ->icon('heroicon-o-arrow-up-tray')
                ->form([
                    Section::make('CSV Import')
                        ->description('Töltsön fel egy CSV fájlt autók importálásához')
                        ->schema([
                            FileUpload::make('csv_file')
                                ->label('CSV Fájl')
                                ->acceptedFileTypes(['text/csv', 'text/plain'])
                                ->maxSize(10240) // 10MB
                                ->helperText('Maximum 10MB méretű CSV fájl')
                                ->required(),
                        ]),
                ])
                ->action(function (array $data) {
                    if (empty($data['csv_file'])) {
                        Notification::make()
                            ->title('Hiba')
                            ->body('Kérem válasszon ki egy CSV fájlt!')
                            ->danger()
                            ->send();
                        return;
                    }

                    try {
                        // Get the file path using Storage facade
                        $csvFile = $data['csv_file'];
                        
                        // Check if the file exists in storage
                        if (!Storage::disk('public')->exists($csvFile)) {
                            // Try without 'public' disk
                            if (!Storage::exists($csvFile)) {
                                Notification::make()
                                    ->title('Hiba')
                                    ->body('A feltöltött fájl nem található: ' . $csvFile)
                                    ->danger()
                                    ->send();
                                return;
                            }
                            $fileContent = Storage::get($csvFile);
                        } else {
                            $fileContent = Storage::disk('public')->get($csvFile);
                        }
                        
                        // Parse CSV content
                        $lines = explode("\n", trim($fileContent));
                        $csvData = array_map('str_getcsv', $lines);
                        
                        // Remove header row
                        $header = array_shift($csvData);
                        
                        $importedCount = 0;
                        $errorCount = 0;
                        
                        foreach ($csvData as $index => $row) {
                            try {
                                // Skip empty rows
                                if (empty($row) || count($row) < 5) {
                                    continue;
                                }
                                
                                // Map CSV values to model keys
                                $categoryMapping = [
                                    'SUV' => 'suv',
                                    'Sedan' => 'limousine', 
                                    'Hatchback' => 'estate',
                                    'Coupe' => 'coupe',
                                    'Cabriolet' => 'cabriolet',
                                    'Van' => 'van'
                                ];
                                
                                $typeMapping = [
                                    'Elektromos' => 'electric',
                                    'Benzin' => 'petrol',
                                    'Hibrid' => 'hybrid',
                                    'AMG' => 'amg'
                                ];
                                
                                $category = $categoryMapping[$row[2] ?? ''] ?? strtolower($row[2] ?? '');
                                $type = $typeMapping[$row[3] ?? ''] ?? strtolower($row[3] ?? '');
                                
                                $carData = [
                                    'name' => $row[0] ?? '',
                                    'model' => $row[1] ?? '',
                                    'category' => $category,
                                    'type' => $type,
                                    'price' => floatval($row[4] ?? 0),
                                    'currency' => $row[5] ?? 'HUF',
                                    'description' => $row[6] ?? '',
                                    'featured' => filter_var($row[7] ?? false, FILTER_VALIDATE_BOOLEAN),
                                    'active' => filter_var($row[8] ?? true, FILTER_VALIDATE_BOOLEAN),
                                ];

                                // Validate required fields and mapped values
                                if (empty($carData['name']) || empty($carData['model']) || 
                                    empty($carData['category']) || empty($carData['type']) || 
                                    $carData['price'] <= 0 ||
                                    !array_key_exists($carData['category'], Car::CATEGORIES) ||
                                    !array_key_exists($carData['type'], Car::TYPES)) {
                                    $errorCount++;
                                    continue;
                                }

                                Car::create($carData);
                                $importedCount++;
                                
                            } catch (\Exception $e) {
                                $errorCount++;
                            }
                        }

                        Notification::make()
                            ->title('Import befejezve')
                            ->body("$importedCount autó sikeresen importálva. $errorCount hiba.")
                            ->success()
                            ->send();

                    } catch (\Exception $e) {
                        Notification::make()
                            ->title('Import hiba')
                            ->body('Hiba történt a CSV feldolgozása során: ' . $e->getMessage())
                            ->danger()
                            ->send();
                    }
                }),
                
            Action::make('addCar')
                ->label('Autó hozzáadása')
                ->icon('heroicon-o-plus')
                ->form([
                    Section::make('Egyedi autó hozzáadása')
                        ->description('Adjon hozzá egy autót manuálisan')
                        ->schema([
                            TextInput::make('name')
                                ->label('Név')
                                ->required()
                                ->maxLength(255),
                                
                            TextInput::make('model')
                                ->label('Modell')
                                ->required()
                                ->maxLength(255),
                                
                            Select::make('category')
                                ->label('Kategória')
                                ->options(Car::CATEGORIES)
                                ->required(),
                                
                            Select::make('type')
                                ->label('Típus')
                                ->options(Car::TYPES)
                                ->required(),
                                
                            TextInput::make('price')
                                ->label('Ár')
                                ->numeric()
                                ->required()
                                ->prefix('Ft'),
                                
                            TextInput::make('currency')
                                ->label('Valuta')
                                ->default('HUF')
                                ->maxLength(10),
                                
                            Textarea::make('description')
                                ->label('Leírás')
                                ->rows(3),
                                
                            FileUpload::make('image')
                                ->label('Kép')
                                ->image()
                                ->disk('public')
                                ->directory('cars'),
                                
                            Toggle::make('featured')
                                ->label('Kiemelt'),
                                
                            Toggle::make('active')
                                ->label('Aktív')
                                ->default(true),
                        ])
                        ->columns(2),
                ])
                ->action(function (array $data) {
                    try {
                        // Filter out empty values
                        $data = array_filter($data, function($value) {
                            return $value !== null && $value !== '';
                        });
                        
                        if (empty($data['name']) || empty($data['model']) || 
                            empty($data['category']) || empty($data['type']) || 
                            empty($data['price'])) {
                            Notification::make()
                                ->title('Hiba')
                                ->body('Kérem töltse ki a kötelező mezőket!')
                                ->danger()
                                ->send();
                            return;
                        }

                        Car::create($data);
                        
                        Notification::make()
                            ->title('Siker')
                            ->body('Az autó sikeresen hozzáadva!')
                            ->success()
                            ->send();

                    } catch (\Exception $e) {
                        Notification::make()
                            ->title('Hiba')
                            ->body('Hiba történt az autó hozzáadása során: ' . $e->getMessage())
                            ->danger()
                            ->send();
                    }
                }),
        ];
    }
}