<x-filament-panels::page>
    <div class="space-y-6">
        <x-filament::section>
            <x-slot name="heading">
                CSV Import
            </x-slot>
            
            <form wire:submit="import" class="space-y-4">
                <div>
                    <label for="csvFile" class="block text-sm font-medium text-gray-700 mb-2">
                        CSV Fájl kiválasztása
                    </label>
                    <input 
                        type="file" 
                        wire:model="csvFile" 
                        id="csvFile"
                        accept=".csv,text/csv"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                    >
                    @error('csvFile')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div wire:loading wire:target="csvFile" class="text-sm text-gray-600">
                    Fájl feltöltése...
                </div>

                <x-filament::button type="submit" wire:loading.attr="disabled">
                    <span wire:loading.remove wire:target="import">Import Autók</span>
                    <span wire:loading wire:target="import">Importálás...</span>
                </x-filament::button>
            </form>
        </x-filament::section>

        <x-filament::section>
            <x-slot name="heading">
                CSV Formátum
            </x-slot>
            
            <div class="text-sm text-gray-600">
                <p class="mb-2">A CSV fájlnak az alábbi oszlopokat kell tartalmaznia:</p>
                <ul class="list-disc list-inside space-y-1">
                    <li><strong>brand</strong> - Márka (pl: Mercedes-Benz)</li>
                    <li><strong>model</strong> - Modell (pl: GLC 300)</li>
                    <li><strong>year</strong> - Évjárat (pl: 2024)</li>
                    <li><strong>price</strong> - Ár Ft-ban (pl: 35000000)</li>
                    <li><strong>mileage</strong> - Kilométeróra állás (pl: 15000)</li>
                    <li><strong>engine</strong> - Motor (pl: 2.0 TDI)</li>
                    <li><strong>fuel_type</strong> - Üzemanyag típus (Benzin/Dízel/Elektromos/Hibrid)</li>
                    <li><strong>transmission</strong> - Váltó (Manuális/Automata/Félautomata)</li>
                    <li><strong>color</strong> - Szín (Fekete/Fehér/Szürke/Ezüst/Kék/Piros/Zöld/Sárga/Barna)</li>
                    <li><strong>description</strong> - Leírás</li>
                    <li><strong>image</strong> - Kép URL (opcionális)</li>
                </ul>
            </div>
        </x-filament::section>

        <x-filament::section>
            <x-slot name="heading">
                Példa CSV
            </x-slot>
            
            <div class="space-y-4">
                <div class="bg-gray-50 p-4 rounded-lg overflow-x-auto">
                    <pre class="text-xs">brand,model,year,price,mileage,engine,fuel_type,transmission,color,description,image
Mercedes-Benz,GLC 300,2024,35000000,5000,2.0 Turbo,Benzin,Automata,Fekete,Luxus SUV kiváló állapotban,
BMW,X5,2023,42000000,12000,3.0 TDI,Dízel,Automata,Fehér,Sport csomag teljes felszereltséggel,
Audi,Q7,2024,38000000,8000,3.0 TFSI,Benzin,Automata,Szürke,7 személyes családi SUV,</pre>
                </div>
                
                <div>
                    <a href="/sample-cars.csv" download="sample-cars.csv" 
                       class="inline-flex items-center px-4 py-2 bg-primary-600 text-white text-sm font-medium rounded-lg hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path>
                        </svg>
                        Példa CSV letöltése
                    </a>
                </div>
            </div>
        </x-filament::section>
    </div>
</x-filament-panels::page>