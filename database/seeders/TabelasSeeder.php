<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TabelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produtos')->insert([
            "nome"=>"TESTE blusa",
            "valor"=>'59',
            "sku"=>'0087265',
	        "cor"=>"preta",
            "genero"=>"m",
        ]);

        DB::table('produtos')->insert([
            "nome"=>"TESTE croped",
            "valor"=>'49',
            "sku"=>'0968796',
	        "cor"=>"verde",
            "genero"=>"f",
        ]);       
        
            DB::table('estoque')->insert([
            "produtos_id"=>'2',
            "p"=>'4',
            "pp"=>'5',
	        "m"=>'6',
            "g"=>'5',
            "gg"=>'4'
        ]);


        DB::table('produtos')->insert([
            "nome"=>"TESTE camiseta",
            "valor"=>'69',
            "sku"=>'0075371',
	        "cor"=>"branco",
            "genero"=>"m",
        ]);    

        DB::table('estoque')->insert([
            "produtos_id"=>'3',
            "p"=>'4',
            "pp"=>'5',
	        "m"=>'6',
            "g"=>'5',
            "gg"=>'4'
        ]);

            DB::table('produtos')->insert([
            "nome"=>"TESTE casaco",
            "valor"=>'200',
            "sku"=>'0086830',
	        "cor"=>"azul",
            "genero"=>"f",
            ]);

        DB::table('estoque')->insert([
            "produtos_id"=>'4',
            "p"=>'4',
            "pp"=>'5',
	        "m"=>'6',
            "g"=>'5',
            "gg"=>'4'
        ]);

        DB::table('users')->insert([
            "nome"=>"ClienteAdmin",
            "email"=>'ClienteAdmin@teste.com',
            "cliente"=>'1',
            "admin"=>'1',
	        "password"=>Hash::make("123456Ab"),
        ]);

        DB::table('users')->insert([
            "nome"=>"Cliente",
            "email"=>'Cliente@teste.com',
            "cliente"=>'1',
            "admin"=>'0',
	        "password"=>Hash::make("123456Ab"),
        ]);

        DB::table('users')->insert([
            "nome"=>"Admin",
            "email"=>'Admin@teste.com',
            "cliente"=>'0',
            "admin"=>'1',
	        "password"=>Hash::make("123456Ab"),
        ]);

        DB::table('users')->insert([
            "nome"=>"NemClienteNemAdmin",
            "email"=>'NemClienteNemAdmin@teste.com',
            "cliente"=>'0',
            "admin"=>'0',
	        "password"=>Hash::make("123456Ab"),
        ]);

    }
}
