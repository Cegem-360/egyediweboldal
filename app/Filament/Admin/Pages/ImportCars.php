<?php

namespace App\Filament\Admin\Pages;

use BackedEnum;
use Filament\Pages\Page;
use Filament\Notifications\Notification;
use App\Models\Car;
use Illuminate\Support\Facades\Storage;
use League\Csv\Reader;
use Livewire\WithFileUploads;
use Livewire\TemporaryUploadedFile;

class ImportCars extends Page
{
    use WithFileUploads;
    
    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-arrow-up-tray';
    
    protected static ?string $navigationLabel = 'Import Autók';
    
    protected static ?string $title = 'CSV Import Autók';
    
    protected static ?int $navigationSort = 5;

    protected string $view = 'filament.admin.pages.import-cars';

    public $csvFile;

    public function import(): void
    {
        $this->validate([
            'csvFile' => 'required|file|mimes:csv,txt|max:10240',
        ]);

        if (!$this->csvFile) {
            Notification::make()
                ->title('Hiba')
                ->body('Kérem válasszon ki egy CSV fájlt!')
                ->danger()
                ->send();
            return;
        }

        try {
            $filePath = $this->csvFile->getRealPath();
            
            $csv = Reader::createFromPath($filePath, 'r');
            $csv->setHeaderOffset(0);
            
            $valueMapping = [
                'fuel_type' => [
                    'Benzin' => 'petrol',
                    'Dízel' => 'diesel',
                    'Elektromos' => 'electric',
                    'Hibrid' => 'hybrid',
                ],
                'transmission' => [
                    'Manuális' => 'manual',
                    'Automata' => 'automatic',
                    'Félautomata' => 'semi-automatic',
                ],
                'color' => [
                    'Fekete' => 'black',
                    'Fehér' => 'white',
                    'Szürke' => 'gray',
                    'Ezüst' => 'silver',
                    'Kék' => 'blue',
                    'Piros' => 'red',
                    'Zöld' => 'green',
                    'Sárga' => 'yellow',
                    'Barna' => 'brown',
                ],
            ];
            
            $imported = 0;
            foreach ($csv as $record) {
                $carData = [
                    'brand' => $record['brand'] ?? '',
                    'model' => $record['model'] ?? '',
                    'year' => (int)($record['year'] ?? 0),
                    'price' => (int)($record['price'] ?? 0),
                    'mileage' => (int)($record['mileage'] ?? 0),
                    'engine' => $record['engine'] ?? '',
                    'fuel_type' => $valueMapping['fuel_type'][$record['fuel_type']] ?? $record['fuel_type'] ?? 'petrol',
                    'transmission' => $valueMapping['transmission'][$record['transmission']] ?? $record['transmission'] ?? 'manual',
                    'color' => $valueMapping['color'][$record['color']] ?? $record['color'] ?? 'black',
                    'description' => $record['description'] ?? '',
                    'image' => $record['image'] ?? 'https://via.placeholder.com/800x600',
                ];
                
                Car::create($carData);
                $imported++;
            }
            
            Notification::make()
                ->title('Sikeres import')
                ->body("Sikeresen importálva {$imported} autó.")
                ->success()
                ->send();
                
            $this->reset('csvFile');
            
        } catch (\Exception $e) {
            \Log::error('CSV Import error: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());
            
            Notification::make()
                ->title('Import hiba')
                ->body('Hiba történt az import során: ' . $e->getMessage())
                ->danger()
                ->send();
        }
    }

    // Only admin can access this page
    public static function canAccess(): bool
    {
        return auth()->user()?->isAdmin() ?? false;
    }
}