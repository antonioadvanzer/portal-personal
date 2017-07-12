<?php

use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //Hash::make

        // Users
        /*User::create([
            'id' => 1,
            'name' => "MAURICIO",
            'apellido_paterno' => "CRUZ",
            'apellido_materno' => "VELÁZQUEZ DE LEÓN",
            'photo' => "1.jpg",
            'email' => "mauricio.cruz@advanzer.com",
            'password' => bcrypt("password"),
            'status' => 1,
            'nomina' => 1,
            'plaza' => "MTY",
            'area' => 1,
            'posicion_track' => 54,
            'company' => 1,
            'fecha_ingreso' => "2006-02-14",
            'fecha_baja' => null,
            'tipo_baja' => null,
            'motivo' => null
        ]);*/
    }
}
