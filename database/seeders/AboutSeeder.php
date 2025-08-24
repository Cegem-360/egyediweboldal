<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\About;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        About::create([
            'hero_title' => 'A Mercedes-Benz története',
            'hero_subtitle' => 'Több mint 130 év innováció és kiválóság',
            'hero_description' => 'A Mercedes-Benz márka története a gépkocsi feltalálásával kezdődött 1886-ban. Azóta folyamatosan formáljuk a mobilitás jövőjét innovatív technológiáinkkal, luxus termékeinkkel és fenntartható megoldásainkkal.',
            'hero_image' => null,
            
            'timeline_items' => [
                [
                    'year' => 1886,
                    'title' => 'A gépkocsi megszületése',
                    'description' => 'Karl Benz megalkotta a Benz Patent-Motorwagen-t, amely a világ első gépkocsijának tekinthető. Ez a forradalmi találmány alapozta meg a modern mobilitást és a Mercedes-Benz örökségét.',
                    'image' => null
                ],
                [
                    'year' => 1926,
                    'title' => 'A Mercedes-Benz márka születése',
                    'description' => 'A Daimler-Motoren-Gesellschaft és a Benz & Cie egyesülésével megszületett a Mercedes-Benz. Az új márka egyesítette a két úttörő cég tudását és tapasztalatát, megteremtve a luxus autógyártás alapjait.',
                    'image' => null
                ],
                [
                    'year' => 1954,
                    'title' => '300 SL Gullwing legenda',
                    'description' => 'A Mercedes-Benz 300 SL ikonikus sirályajtós kivitelben mutatkozott be. Ez a sportautó mérföldkő volt a design és a technológia terén, és máig az egyik legkeresettebb klasszikus Mercedes modell.',
                    'image' => null
                ],
                [
                    'year' => 1979,
                    'title' => 'G-osztály: Terepjáró ikon',
                    'description' => 'A Mercedes-Benz G-osztály bemutatkozása forradalmasította a terepjárók világát. Az eredetileg katonai célokra tervezett jármű máig az egyik legkeresettebb luxus terepjáró és státuszszimbólum.',
                    'image' => null
                ],
                [
                    'year' => 2021,
                    'title' => 'EQS: Az elektromos jövő',
                    'description' => 'A Mercedes-EQS luxus elektromos limuzin új korszakot nyitott a márka történetében. A fenntartható mobilitás és a csúcstechnológia egyesítésével a Mercedes-Benz bizonyította elkötelezettségét a CO₂-semleges jövő iránt.',
                    'image' => null
                ]
            ],
            
            'gallery_items' => [
                [
                    'title' => 'Gyártás és innováció',
                    'description' => 'Modern gyártósoraink ahol a precizitás találkozik a technológiával',
                    'image' => null
                ],
                [
                    'title' => 'Tesztelés és fejlesztés',
                    'description' => 'Szigorú tesztelési folyamatok biztosítják a Mercedes-Benz minőséget',
                    'image' => null
                ],
                [
                    'title' => 'Fenntarthatóság',
                    'description' => 'Elkötelezettségünk a környezettudatos mobilitás iránt',
                    'image' => null
                ],
                [
                    'title' => 'Oktatás és képzés',
                    'description' => 'Befektetünk az emberi tudásba és szakértelembe',
                    'image' => null
                ]
            ],
            
            'statistics' => [
                [
                    'number' => '137',
                    'label' => 'Év tapasztalat'
                ],
                [
                    'number' => '2.3M',
                    'label' => 'Járműgyártás évente'
                ],
                [
                    'number' => '170',
                    'label' => 'Ország világszerte'
                ],
                [
                    'number' => '100+',
                    'label' => 'Elektromos modell'
                ]
            ],
            
            'cta_title' => 'Tapasztalja meg a Mercedes-Benz különlegességét',
            'cta_description' => 'Fedezze fel modellkínálatunkat és válassza ki az Önnek leginkább megfelelő Mercedes-Benz-t.',
            'cta_button_text' => 'Modellek megtekintése',
            'cta_button_link' => '/modellek',
            
            'is_active' => true
        ]);
    }
}
