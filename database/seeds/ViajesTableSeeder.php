<?php

use Illuminate\Database\Seeder;
use App\Viaje;

class ViajesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $fecha = date("d/m/Y");
        $hora = date("H:i");
        $nuevaHora1 = strtotime ( '+10 minute' , strtotime ( $hora ) ) ;
        $nuevaHora2 = strtotime ( '+20 minute' , strtotime ( $hora ) ) ;
        $nuevaHora3 = strtotime ( '+25 minute' , strtotime ( $hora ) ) ;
        $hora1 = date("H:i", $nuevaHora1);
        $hora2 = date("H:i", $nuevaHora2);
        $hora3 = date("H:i", $nuevaHora3);

        $viaje_1 = new Viaje();
        $viaje_1->empresa = 'andesmar';
        $viaje_1->origen = 'trelew';
        $viaje_1->destino = 'mendoza';
        $viaje_1->coche = 954;
        $viaje_1->plataforma = 12;
        $viaje_1->fecha = $fecha;
        $viaje_1->hora = $hora1;
        $viaje_1->demora = '5';
        $viaje_1->tipo_uso = 'salida';
        $viaje_1->save();

        $viaje_2 = new Viaje();
        $viaje_2->empresa = 'que buss';
        $viaje_2->origen = 'la plata';
        $viaje_2->destino = 'trelew';
        $viaje_2->coche = 154;
        $viaje_2->plataforma = 15;
        $viaje_2->fecha = $fecha;
        $viaje_2->hora = $hora2;
        $viaje_2->demora = '0';
        $viaje_2->tipo_uso = 'arribo';
        $viaje_2->save();

        $viaje_3 = new Viaje();
        $viaje_3->empresa = 'don otto';
        $viaje_3->origen = 'mendoza';
        $viaje_3->destino = 'caleta olivia';
        $viaje_3->coche = 1025;
        $viaje_3->plataforma = 18;
        $viaje_3->fecha = $fecha;
        $viaje_3->hora = $hora3;
        $viaje_3->demora = '10';
        $viaje_3->tipo_uso = 'arribo';
        $viaje_3->save();
    }
}
