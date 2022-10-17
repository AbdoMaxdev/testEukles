<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;
use App\Models\Materiel;
use App\Models\Lien;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Client::insert([
            ['name' => 'martin','adress' => 'paris'],
            ['name' => 'alex','adress' => 'lille'],
            ['name' => 'thomas','adress' => 'nice'],
            ['name' => 'amandine','adress' => 'antibes'],
        ]);
        Materiel::insert([
            ['name' => 'clavier','prix' => '3000'],
            ['name' => 'monitor','prix' => '10000'],
            ['name' => 'souris','prix' => '4000'],
            ['name' => 'chargeur','prix' => '5000'],
            ['name' => 'chargeur','prix' => '9000'],
            ['name' => 'oridnateur','prix' => '60000'],
            ['name' => 'bureau','prix' => '13000'],
            ['name' => 'Usb','prix' => '567'],
            ['name' => 'hard disk','prix' => '2000'],
            ['name' => 'casque','prix' => '7000'],
            ['name' => 'clavier','prix' => '9000'],
            ['name' => 'monitor','prix' => '2000'],
            ['name' => 'oridnateur','prix' => '4000'],
            ['name' => 'casque','prix' => '5000'],
            ['name' => 'chargeur','prix' => '8000'],
            ['name' => 'clavier','prix' => '7900'],
        ]);
        Lien::insert([
            ['id_client' => 1,'id_materiel' => 1],
            ['id_client' => 1,'id_materiel' => 2],
            ['id_client' => 1,'id_materiel' => 3],
            ['id_client' => 1,'id_materiel' => 4],
            ['id_client' => 1,'id_materiel' => 5],
            ['id_client' => 1,'id_materiel' => 6],
            ['id_client' => 1,'id_materiel' => 7],
            ['id_client' => 2,'id_materiel' => 8],
            ['id_client' => 2,'id_materiel' => 9],
            ['id_client' => 2,'id_materiel' => 10],
            ['id_client' => 2,'id_materiel' => 11],
            ['id_client' => 3,'id_materiel' => 12],
            ['id_client' => 3,'id_materiel' => 13],
            ['id_client' => 4,'id_materiel' => 14],
            ['id_client' => 4,'id_materiel' => 15],
            ['id_client' => 4,'id_materiel' => 16],
        ]);
    }
}
