<x-filament-panels::page>
    <div class="space-y-6">
        <!-- API Documentation Section -->
        <x-filament::section>
            <x-slot name="heading">
                API Dokumentáció
            </x-slot>
            
            <x-slot name="description">
                Használja az alábbi API végpontokat autók programozott importálásához
            </x-slot>
            
            <div class="space-y-4">
                <div class="bg-gray-50 rounded-lg p-4">
                    <h3 class="font-semibold text-lg mb-3">Elérhető API végpontok:</h3>
                    
                    <div class="space-y-3">
                        <div class="border-l-4 border-blue-500 pl-4">
                            <div class="font-mono text-sm font-semibold text-blue-700">GET /api/cars/reference</div>
                            <p class="text-sm text-gray-600">Elérhető kategóriák, típusok és valuták lekérése</p>
                        </div>
                        
                        <div class="border-l-4 border-green-500 pl-4">
                            <div class="font-mono text-sm font-semibold text-green-700">POST /api/cars/import/single</div>
                            <p class="text-sm text-gray-600">Egy autó importálása JSON formátumban</p>
                        </div>
                        
                        <div class="border-l-4 border-purple-500 pl-4">
                            <div class="font-mono text-sm font-semibold text-purple-700">POST /api/cars/import/batch</div>
                            <p class="text-sm text-gray-600">Több autó importálása egyszerre (max 100)</p>
                        </div>
                        
                        <div class="border-l-4 border-orange-500 pl-4">
                            <div class="font-mono text-sm font-semibold text-orange-700">POST /api/cars/import/csv</div>
                            <p class="text-sm text-gray-600">CSV fájl feltöltése és importálása</p>
                        </div>
                        
                        <div class="border-l-4 border-gray-500 pl-4">
                            <div class="font-mono text-sm font-semibold text-gray-700">GET /api/cars/import/template</div>
                            <p class="text-sm text-gray-600">CSV sablon fájl letöltése</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-blue-50 rounded-lg p-4">
                    <h4 class="font-semibold text-blue-800 mb-2">Példa API hívás (egy autó):</h4>
                    <pre class="text-xs bg-blue-100 p-3 rounded overflow-x-auto"><code>curl -X POST {{ url('/api/cars/import/single') }} \
  -H "Content-Type: application/json" \
  -d '{
    "name": "Mercedes-Benz C 300",
    "model": "C-Osztály",
    "category": "limuzin",
    "type": "benzines",
    "price": 15990000,
    "currency": "HUF",
    "description": "Elegáns és sportos limuzin",
    "featured": false,
    "active": true
  }'</code></pre>
                </div>
                
                <div class="bg-green-50 rounded-lg p-4">
                    <h4 class="font-semibold text-green-800 mb-2">Példa batch import:</h4>
                    <pre class="text-xs bg-green-100 p-3 rounded overflow-x-auto"><code>curl -X POST {{ url('/api/cars/import/batch') }} \
  -H "Content-Type: application/json" \
  -d '{
    "cars": [
      {
        "name": "Mercedes-Benz C 300",
        "model": "C-Osztály",
        "category": "limuzin",
        "type": "benzines",
        "price": 15990000
      },
      {
        "name": "Mercedes-Benz GLE 350",
        "model": "GLE-Osztály",
        "category": "suv",
        "type": "benzines",
        "price": 28990000
      }
    ]
  }'</code></pre>
                </div>
            </div>
        </x-filament::section>
        
        <!-- Import Actions -->
        <x-filament::section>
            <x-slot name="heading">
                Import műveletek
            </x-slot>
            
            <x-slot name="description">
                Használja a fejléc gombokat az import műveletekhez
            </x-slot>
            
            <div class="bg-gray-50 rounded-lg p-4">
                <p class="text-sm text-gray-600">
                    • <strong>CSV Sablon letöltése:</strong> Töltse le a CSV sablon fájlt<br>
                    • <strong>CSV Import:</strong> Töltsön fel egy CSV fájlt autók importálásához<br>
                    • <strong>Autó hozzáadása:</strong> Adjon hozzá egy autót manuálisan
                </p>
            </div>
        </x-filament::section>
        
        <!-- CSV Format Guide -->
        <x-filament::section>
            <x-slot name="heading">
                CSV Formátum útmutató
            </x-slot>
            
            <div class="space-y-4">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Oszlop</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mező</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Típus</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Példa</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">A</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">name *</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">string</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Mercedes-Benz C 300</td>
                            </tr>
                            <tr class="bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">B</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">model *</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">string</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">C-Osztály</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">C</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">category *</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">enum</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">limuzin, suv, hatchback, kombi</td>
                            </tr>
                            <tr class="bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">D</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">type *</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">enum</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">benzines, dizel, hibrid, elektromos</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">E</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">price *</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">number</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">15990000</td>
                            </tr>
                            <tr class="bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">F</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">currency</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">string</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">HUF, EUR, USD</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">G</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">description</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">text</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Elegáns és sportos limuzin</td>
                            </tr>
                            <tr class="bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">H</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">featured</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">boolean</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">true, false</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">I</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">active</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">boolean</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">true, false</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                    <h4 class="font-semibold text-yellow-800 mb-2">Fontos megjegyzések:</h4>
                    <ul class="text-sm text-yellow-700 space-y-1">
                        <li>• A * jelölt mezők kötelezőek</li>
                        <li>• Az első sor tartalmaznia kell a fejléceket</li>
                        <li>• A kategória és típus értékeknek pontosan egyezniük kell a megengedett értékekkel</li>
                        <li>• Az árat számként, tizedesjel nélkül adja meg (15990000 = 15,990,000 Ft)</li>
                        <li>• A boolean értékeket "true" vagy "false" szövegként adja meg</li>
                    </ul>
                </div>
            </div>
        </x-filament::section>
    </div>
</x-filament-panels::page>