<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('hoteis')->truncate();
        DB::table('quartos')->truncate();
        DB::table('clientes')->truncate();
        DB::table('reservas')->truncate();

        $hotelId = DB::table('hoteis')->insertGetId([
            'nome' => 'Beack Park',
            'endereco' => 'Fortaleza - CE',
            'telefone' => '94949494949',
            'email' => 'beachpark@email.com',
            'descricao' => 'Hotel com Parque Aquático',
            'created_at' => Carbon::today(),
            'updated_at' => Carbon::today()
        ]);

        DB::table('clientes')->insert([
            'nome' => 'Guilherme',
            'cpf' => '5454545454',
            'email' => 'gui@email.com',
            'telefone' => '443343434',
            'senha_hash' => Hash::make("123"),
            'created_at' => Carbon::today(),
            'updated_at' => Carbon::today()
        ]);

        for ($i = 1; $i <= 20; $i++) {
            DB::table('quartos')->insert([
                'hotel_id' => $hotelId,
                'numero' => $i,
                'tipo' => Str::random(10),
                'preco_diaria' => 22.00,
                'capacidade' => 4,
                'descricao' => 'Quarto do hotel',
                'created_at' => Carbon::today(),
                'updated_at' => Carbon::today()
            ]);
        }
    }
}
