<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            ['name' => 'São Paulo', 'state' => 'SP'],
            ['name' => 'Rio de Janeiro', 'state' => 'RJ'],
            ['name' => 'Salvador', 'state' => 'BA'],
            ['name' => 'Brasília', 'state' => 'DF'],
            ['name' => 'Fortaleza', 'state' => 'CE'],
            ['name' => 'Belo Horizonte', 'state' => 'MG'],
            ['name' => 'Manaus', 'state' => 'AM'],
            ['name' => 'Curitiba', 'state' => 'PR'],
            ['name' => 'Recife', 'state' => 'PE'],
            ['name' => 'Porto Alegre', 'state' => 'RS'],
            ['name' => 'Belém', 'state' => 'PA'],
            ['name' => 'Goiânia', 'state' => 'GO'],
            ['name' => 'Guarulhos', 'state' => 'SP'],
            ['name' => 'Campinas', 'state' => 'SP'],
            ['name' => 'São Luís', 'state' => 'MA'],
            ['name' => 'São Gonçalo', 'state' => 'RJ'],
            ['name' => 'Maceió', 'state' => 'AL'],
            ['name' => 'Duque de Caxias', 'state' => 'RJ'],
            ['name' => 'Nova Iguaçu', 'state' => 'RJ'],
            ['name' => 'Natal', 'state' => 'RN'],
        ];

        foreach ($cities as $city) {
            City::create($city);
        }
    }
}
