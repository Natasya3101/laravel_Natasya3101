<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use DB;

class PatientsTableSeeder extends Seeder {
    public function run(){
        DB::table('patients')->insert([
            ['name'=>'Budi','address'=>'Jakarta','phone'=>'08210000001','hospital_id'=>1],
            ['name'=>'Siti','address'=>'Bandung','phone'=>'08210000002','hospital_id'=>2],
        ]);
    }
}
