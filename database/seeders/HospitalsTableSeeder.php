<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use DB;

class HospitalsTableSeeder extends Seeder {
    public function run(){
        DB::table('hospitals')->insert([
            ['name'=>'RS Harapan Kita','address'=>'Jl. Sudirman 1','email'=>'rs1@example.com','phone'=>'081234567890'],
            ['name'=>'RS Sehat Sentosa','address'=>'Jl. Merdeka 2','email'=>'rs2@example.com','phone'=>'081298765432'],
        ]);
    }
}
