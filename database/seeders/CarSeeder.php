<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Car;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cars = [
            [
                'name' => 'Mercedes-Benz EQA',
                'model' => 'EQA 250',
                'category' => 'suv',
                'type' => 'electric',
                'price' => 17490000,
                'description' => 'Kompakt elektromos SUV városi környezethez',
                'featured' => true,
                'specifications' => [
                    'Motor' => 'Elektromos',
                    'Teljesítmény' => '190 LE',
                    'Hatótáv' => '426 km',
                    '0-100 km/h' => '8,9 s',
                ]
            ],
            [
                'name' => 'Mercedes-Benz EQB',
                'model' => 'EQB 350',
                'category' => 'suv',
                'type' => 'electric',
                'price' => 21490000,
                'description' => '7 személyes elektromos SUV családoknak',
                'featured' => true,
                'specifications' => [
                    'Motor' => 'Elektromos',
                    'Teljesítmény' => '292 LE',
                    'Hatótáv' => '419 km',
                    '0-100 km/h' => '6,2 s',
                ]
            ],
            [
                'name' => 'Mercedes-Benz EQC',
                'model' => 'EQC 400',
                'category' => 'suv',
                'type' => 'electric',
                'price' => 28890000,
                'description' => 'Luxus elektromos SUV prémium felszereltséggel',
                'featured' => true,
                'specifications' => [
                    'Motor' => 'Kettős elektromos',
                    'Teljesítmény' => '408 LE',
                    'Hatótáv' => '417 km',
                    '0-100 km/h' => '5,1 s',
                ]
            ],
            [
                'name' => 'Mercedes-Benz EQS',
                'model' => 'EQS 450',
                'category' => 'limousine',
                'type' => 'electric',
                'price' => 37990000,
                'description' => 'Elektromos luxus limuzin a jövőből',
                'featured' => true,
                'specifications' => [
                    'Motor' => 'Elektromos',
                    'Teljesítmény' => '333 LE',
                    'Hatótáv' => '770 km',
                    '0-100 km/h' => '6,2 s',
                ]
            ],
            [
                'name' => 'Mercedes-Benz EQV',
                'model' => 'EQV 300',
                'category' => 'van',
                'type' => 'electric',
                'price' => 26890000,
                'description' => 'Elektromos luxus van nagy családoknak',
                'featured' => true,
                'specifications' => [
                    'Motor' => 'Elektromos',
                    'Teljesítmény' => '204 LE',
                    'Hatótáv' => '351 km',
                    'Személyek' => '8 fő',
                ]
            ],
            [
                'name' => 'Mercedes-AMG EQS',
                'model' => 'AMG EQS 53',
                'category' => 'limousine',
                'type' => 'amg',
                'price' => 55990000,
                'description' => 'A leggyorsabb elektromos Mercedes sportlimuzin',
                'featured' => true,
                'specifications' => [
                    'Motor' => 'AMG elektromos',
                    'Teljesítmény' => '658 LE',
                    'Hatótáv' => '516 km',
                    '0-100 km/h' => '3,4 s',
                ]
            ],
            [
                'name' => 'Mercedes-Benz C-Class',
                'model' => 'C 200',
                'category' => 'limousine',
                'type' => 'petrol',
                'price' => 16990000,
                'description' => 'Elegáns és hatékony üzleti limuzin',
                'featured' => false,
                'specifications' => [
                    'Motor' => '2.0L Turbo',
                    'Teljesítmény' => '204 LE',
                    'Fogyasztás' => '6,8 L/100km',
                    '0-100 km/h' => '7,3 s',
                ]
            ],
            [
                'name' => 'Mercedes-Benz GLC',
                'model' => 'GLC 300',
                'category' => 'suv',
                'type' => 'petrol',
                'price' => 18990000,
                'description' => 'Kompakt SUV minden alkalomra',
                'featured' => false,
                'specifications' => [
                    'Motor' => '2.0L Turbo',
                    'Teljesítmény' => '258 LE',
                    'Fogyasztás' => '7,4 L/100km',
                    '0-100 km/h' => '6,2 s',
                ]
            ]
        ];

        foreach ($cars as $carData) {
            Car::create($carData);
        }
    }
}
