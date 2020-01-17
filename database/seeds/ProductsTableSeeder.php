<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([

            [
                'name' => 'Iron Man',
                'category_id' => '1',
                'description' => 'Iron man heeft een krachtig pak en is het brein achter stark industries.',
                'image' => 'iron-man.jpg',
                'price' => '15',
                'created_at' => now()
            ],
            [
                'name' => 'Hulk',
                'category_id' => '1',
                'description' => 'De hulk is onverwoestbaar als hij boos wordt.',
                'image' => 'hulk.jpg',
                'price' => '15',
                'created_at' => now()
            ],
            [
                'name' => 'Thor',
                'category_id' => '1',
                'description' => 'Thor heeft een legendarische hamer.',
                'image' => 'thor.jpg',
                'price' => '15',
                'created_at' => now()
            ],



            [
                'name' => 'Superman',
                'category_id' => '2',
                'description' => 'Superman is afkomstig van krypton.',
                'image' => 'superman.jpg',
                'price' => '45',
                'created_at' => now()
            ],
            [
                'name' => 'Batman',
                'category_id' => '2',
                'description' => 'Batman bestrijd het kwaad in Arkham City.',
                'image' => 'batman.jpg',
                'price' => '45',
                'created_at' => now()
            ],
            [
                'name' => 'Wonder Woman',
                'category_id' => '2',
                'description' => 'Wonder Woman is een van de beschermers van de Amazone.',
                'image' => 'wonder-woman.jpg',
                'price' => '50',
                'created_at' => now()
            ],
            [
                'name' => 'Aquaman',
                'category_id' => '2',
                'description' => 'Aquaman kan onderwater leven en is de beschermer van atlantis',
                'image' => 'aquaman.jpg',
                'price' => '50',
                'created_at' => now()
            ],
            [
                'name' => 'Flash',
                'category_id' => '2',
                'description' => 'De flash is een superheld die zijn krachten gekregen heeft via een ontploffing van een deeltjesversneller.',
                'image' => 'flash.jpg',
                'price' => '50',
                'created_at' => now()
            ],
            
            
            
            [
                'name' => 'Mickey Mouse',
                'category_id' => '3',
                'description' => 'Mickey Mouse is het iconische beeld van Disney.',
                'image' => 'mickey.jpg',
                'price' => '15',
                'created_at' => now()
            ],
            [
                'name' => 'Pluto',
                'category_id' => '3',
                'description' => 'Pluto de hond van Mickey Mouse.',
                'image' => 'pluto.jpg',
                'price' => '15',
                'created_at' => now()
            ],
            [
                'name' => 'Oswald',
                'category_id' => '3',
                'description' => 'Oswald is het volijke muisje die bekend geworden is in de zwart wit tijd.',
                'image' => 'oswald.jpg',
                'price' => '15',
                'created_at' => now()
            ],
            [
                'name' => 'Dagobert Duck',
                'category_id' => '3',
                'description' => 'Dagobert Duck is de opa van Donald uit de bekende stripfiguren serie Donald Duck.',
                'image' => 'dagobert-duck.jpg',
                'price' => '15',
                'created_at' => now()
            ],
            [
                'name' => 'Simba',
                'category_id' => '3',
                'description' => 'Simba is de kleine leeuw uit de bekende films van de Lion King.',
                'image' => 'simba.jpg',
                'price' => '15',
                'created_at' => now()
            ],



            [
                'name' => 'Genji',
                'category_id' => '4',
                'description' => 'Genji is een ninja die vecht met voornamelijk zijn zwaart.',
                'image' => 'genji.jpg',
                'price' => '15',
                'created_at' => now()
            ],
            [
                'name' => 'Hanzo',
                'category_id' => '4',
                'description' => 'Hanzo is de broer van Genji en zal je herkennen aan zijn pijl en boog.',
                'image' => 'hanzo.jpg',
                'price' => '15',
                'created_at' => now()
            ],
            [
                'name' => 'Lucio',
                'category_id' => '4',
                'description' => 'Lucio focused zich vooral op het genezen van zijn team genoten.',
                'image' => 'lucio.jpg',
                'price' => '15',
                'created_at' => now()
            ],
            [
                'name' => 'Tracer',
                'category_id' => '4',
                'description' => 'Tracer kan zich heel snel verplaatsen en heeft als wapens twee handgeweren.',
                'image' => 'tracer.jpg',
                'price' => '15',
                'created_at' => now()
            ],
            [
                'name' => 'Diva',
                'category_id' => '4',
                'description' => 'Diva zorgt voor het beschermen van haar teamgenoten met haar robot.',
                'image' => 'diva.jpg',
                'price' => '15',
                'created_at' => now()
            ],



            [
                'name' => 'Miss Fortune',
                'category_id' => '5',
                'description' => 'Miss Fortune is een karakter dat vecht met handgeweren.',
                'image' => 'miss-fortune.jpg',
                'price' => '15',
                'created_at' => now()
            ],
            [
                'name' => 'Ashe',
                'category_id' => '5',
                'description' => 'Ashe is een karakter dat vecht met een pijl en boog.',
                'image' => 'ashe.jpg',
                'price' => '15',
                'created_at' => now()
            ],
            [
                'name' => 'Jinx',
                'category_id' => '5',
                'description' => 'Jinx is een karakter dat vecht met een minigun.',
                'image' => 'jinx.jpg',
                'price' => '15',
                'created_at' => now()
            ],
            [
                'name' => 'VI',
                'category_id' => '5',
                'description' => 'VI is een karakter dat vecht met haar vuisten.',
                'image' => 'vi.jpg',
                'price' => '15',
                'created_at' => now()
            ],
            [
                'name' => 'Thresh',
                'category_id' => '5',
                'description' => 'Thresh is een karakter dat gebazeerd is op de natuur.',
                'image' => 'thresh.jpg',
                'price' => '15',
                'created_at' => now()
            ],
        ]);
    }
}
