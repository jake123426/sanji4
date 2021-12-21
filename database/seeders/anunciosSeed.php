<?php

namespace Database\Seeders;

use App\Models\Anuncio;
use Illuminate\Database\Seeder;
use App\Models\imagen;
use App\Models\Tag;

class anunciosSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


            $anuncio=Anuncio::create(['nombre' =>'Autos Casi Nuevo', 'precio'=>15000,'vista'=>0,'status'=>1,'descripcion'=>'Auto Casi Nuevo poco kilometraje','moneda'=>'$', 'ubicacion'=>'Calle 16','puntuacion'=>0,'estado'=>'Casi Nuevo','categoria_id'=>1,'user_id'=>1]);
            imagen::create(['url'=>'auto1.jpg','anuncio_id'=>$anuncio->id,]);
            imagen::create(['url'=>'auto2.jpg','anuncio_id'=>$anuncio->id,]);
            imagen::create(['url'=>'auto3.jpg','anuncio_id'=>$anuncio->id,]);

            Tag::create(['nombre'=>'AUTO Nuevo','anuncio_id'=>$anuncio->id,]);
            Tag::create(['nombre'=>'AUTO CERO KILOMETROS','anuncio_id'=>$anuncio->id,]);
            Tag::create(['nombre'=>'AUTO CON PAPELES AL DIA','anuncio_id'=>$anuncio->id,]);


            $anuncio1=Anuncio::create(['nombre' => 'Moto Casi Nuevo', 'precio'=>2000,'vista'=>0,'status'=>1,'descripcion'=>'Moto Casi Nuevo poco kilometraje','moneda'=>'$', 'ubicacion'=>'Calle 14','puntuacion'=>0,'estado'=>'Casi Nuevo','categoria_id'=>2,'user_id'=>1]);
            imagen::create(['url'=>'moto1.jpg','anuncio_id'=>$anuncio1->id,]);
            imagen::create(['url'=>'moto2.jpg','anuncio_id'=>$anuncio1->id,]);
            imagen::create(['url'=>'moto3.jpg','anuncio_id'=>$anuncio1->id,]);

            Tag::create(['nombre'=>'MOTO SIN PROBLEMAS','anuncio_id'=>$anuncio1->id,]);
            Tag::create(['nombre'=>'MOTO Nuevo','anuncio_id'=>$anuncio1->id,]);
            Tag::create(['nombre'=>'MOTO NINJA','anuncio_id'=>$anuncio1->id,]);

            $anuncio2=Anuncio::create( ['nombre' => 'Heladera', 'precio'=>4000,'vista'=>0,'status'=>1,'descripcion'=>'Heladera nueva','moneda'=>'Bs', 'ubicacion'=>'Calle 16','puntuacion'=>0,'estado'=>'Casi Nuevo','categoria_id'=>8,'user_id'=>2]);
            imagen::create(['url'=>'heladera1.jpg','anuncio_id'=>$anuncio2->id,]);
            imagen::create(['url'=>'heladera2.jpg','anuncio_id'=>$anuncio2->id,]);

            Tag::create(['nombre'=>'HELADERA GRANDE','anuncio_id'=>$anuncio2->id,]);
            Tag::create(['nombre'=>'HELADERA NUEVA','anuncio_id'=>$anuncio2->id,]);
            Tag::create(['nombre'=>'HELADERA BAJO PRECIO','anuncio_id'=>$anuncio2->id,]);


            $anuncio3=Anuncio::create( ['nombre' => 'Cocina', 'precio'=>1500,'vista'=>0,'status'=>1,'descripcion'=>'Cocina de 4 hormillas','moneda'=>'Bs', 'ubicacion'=>'Calle 16','puntuacion'=>0,'estado'=>'Casi Nuevo','categoria_id'=>8,'user_id'=>2]);
            imagen::create(['url'=>'cocina1.jpg','anuncio_id'=>$anuncio3->id,]);
            imagen::create(['url'=>'cocina2.jpg','anuncio_id'=>$anuncio3->id,]);

            Tag::create(['nombre'=>'COCINA 4 HORNILLAS','anuncio_id'=>$anuncio3->id,]);
            Tag::create(['nombre'=>'COCINA NUEVA','anuncio_id'=>$anuncio3->id,]);
            Tag::create(['nombre'=>'COCINA BAJO PRECIO','anuncio_id'=>$anuncio3->id,]);


            $anuncio4=Anuncio::create( ['nombre' => 'Lavadora', 'precio'=>1000,'vista'=>0,'status'=>1,'descripcion'=>'Lavadora de 10 kg','moneda'=>'Bs', 'ubicacion'=>'Calle 16','puntuacion'=>0,'estado'=>'Casi Nuevo','categoria_id'=>8,'user_id'=>3]);
            imagen::create(['url'=>'lavadora1.jpg','anuncio_id'=>$anuncio4->id,]);
            imagen::create(['url'=>'lavadora2.jpg','anuncio_id'=>$anuncio4->id,]);

            Tag::create(['nombre'=>'LAVADORA Y SECADORA','anuncio_id'=>$anuncio4->id,]);
            Tag::create(['nombre'=>'LAVADORA NUEVa','anuncio_id'=>$anuncio4->id,]);
            Tag::create(['nombre'=>'LAVADORA BAJO PRECIO','anuncio_id'=>$anuncio4->id,]);


            $anuncio5=Anuncio::create( ['nombre' => 'Celular', 'precio'=>900,'vista'=>0,'status'=>1,'descripcion'=>'Celular a 30 s Nuevo','moneda'=>'Bs', 'ubicacion'=>'Calle 16','puntuacion'=>0,'estado'=>'Nuevo','categoria_id'=>6,'user_id'=>3]);
            imagen::create(['url'=>'celular1.jpg','anuncio_id'=>$anuncio5->id,]);
            imagen::create(['url'=>'celular2.jpg','anuncio_id'=>$anuncio5->id,]);

            Tag::create(['nombre'=>'CELULAR A30S','anuncio_id'=>$anuncio5->id,]);
            Tag::create(['nombre'=>'CELULAR NUEVA','anuncio_id'=>$anuncio5->id,]);
            Tag::create(['nombre'=>'CELULAR BAJO PRECIO','anuncio_id'=>$anuncio5->id,]);


            $anuncio6=Anuncio::create( ['nombre' => 'Pistola', 'precio'=>300,'vista'=>0,'status'=>1,'descripcion'=>'Pistola de airtsolf nueva','moneda'=>'Bs', 'ubicacion'=>'Calle 16','puntuacion'=>0,'estado'=>'Nuevo','categoria_id'=>4,'user_id'=>4]);
            imagen::create(['url'=>'pistola1.jpg','anuncio_id'=>$anuncio6->id,]);
            imagen::create(['url'=>'pistola2.png','anuncio_id'=>$anuncio6->id,]);
            imagen::create(['url'=>'pistola3.jpg','anuncio_id'=>$anuncio6->id,]);


            Tag::create(['nombre'=>'PISTOLA DE AIRTSOL','anuncio_id'=>$anuncio6->id,]);
            Tag::create(['nombre'=>'PISTOLA NUEVA','anuncio_id'=>$anuncio6->id,]);
            Tag::create(['nombre'=>'PISTOLA A GAS','anuncio_id'=>$anuncio6->id,]);

            $anuncio7=Anuncio::create( ['nombre' => 'Arma ak-47', 'precio'=>500,'vista'=>0,'status'=>1,'descripcion'=>'Ak 47 de airtsolf nueva','moneda'=>'Bs', 'ubicacion'=>'Calle 16','puntuacion'=>0,'estado'=>'Nuevo','categoria_id'=>4,'user_id'=>5]);
            imagen::create(['url'=>'ak471.png','anuncio_id'=>$anuncio7->id,]);
            imagen::create(['url'=>'ak472.png','anuncio_id'=>$anuncio7->id,]);

            Tag::create(['nombre'=>'AK 47 DE AIRTSOL','anuncio_id'=>$anuncio7->id,]);
            Tag::create(['nombre'=>'AK 47 NUEVA','anuncio_id'=>$anuncio7->id,]);
            Tag::create(['nombre'=>'AK 47 A GAS','anuncio_id'=>$anuncio7->id,]);

            $anuncio8=Anuncio::create( ['nombre' => 'Casco de motocicleta','moneda'=>'Bs', 'precio'=>1200,'vista'=>0,'status'=>1,'descripcion'=>'Casco en forma de depredador totalmente nueva', 'ubicacion'=>'Calle 1','puntuacion'=>0,'estado'=>'Nuevo','categoria_id'=>2,'user_id'=>5]);
            imagen::create(['url'=>'casco1.jpg','anuncio_id'=>$anuncio8->id,]);
            imagen::create(['url'=>'casco2.jpg','anuncio_id'=>$anuncio8->id,]);
            imagen::create(['url'=>'casco3.jpg','anuncio_id'=>$anuncio8->id,]);
            imagen::create(['url'=>'casco4.jpg','anuncio_id'=>$anuncio8->id,]);

            Tag::create(['nombre'=>'CASCO DE MOTO','anuncio_id'=>$anuncio8->id,]);
            Tag::create(['nombre'=>'CASCO','anuncio_id'=>$anuncio8->id,]);
            Tag::create(['nombre'=>'DEPREDADOR','anuncio_id'=>$anuncio8->id,]);


            $anuncio9=Anuncio::create( ['nombre' => 'Cuenta de streming','moneda'=>'Bs', 'precio'=>50,'vista'=>0,'status'=>1,'descripcion'=>'Adquieres mirar nexflix , amazon video premiun ven y compra', 'ubicacion'=>'Calle 16','puntuacion'=>0,'estado'=>'Nuevo','categoria_id'=>8,'user_id'=>6]);
            imagen::create(['url'=>'cuenta1.png','anuncio_id'=>$anuncio9->id,]);
            imagen::create(['url'=>'cuenta2.jpg','anuncio_id'=>$anuncio9->id,]);
            imagen::create(['url'=>'cuenta3.jpg','anuncio_id'=>$anuncio9->id,]);

            Tag::create(['nombre'=>'NEXTFLIX','anuncio_id'=>$anuncio9->id,]);
            Tag::create(['nombre'=>'CUENTAS DE STREMING','anuncio_id'=>$anuncio9->id,]);
            Tag::create(['nombre'=>'AMAZON VIDEO PREMIUN','anuncio_id'=>$anuncio9->id,]);

            $anuncio10=Anuncio::create( ['nombre' => 'Venta de curso online', 'precio'=>800,'moneda'=>'Bs','vista'=>0,'status'=>1,'descripcion'=>'se da curso mediante zoom de cuarquier grado y materia de colegio consulta gratis', 'ubicacion'=>'Calle 16','puntuacion'=>0,'estado'=>'Nuevo','categoria_id'=>8,'user_id'=>6]);
            imagen::create(['url'=>'curso1.png','anuncio_id'=>$anuncio10->id,]);
            imagen::create(['url'=>'curso2.jpg','anuncio_id'=>$anuncio10->id,]);
            imagen::create(['url'=>'curso3.jpg','anuncio_id'=>$anuncio10->id,]);

            Tag::create(['nombre'=>'CURSO ONLINE','anuncio_id'=>$anuncio10->id,]);
            Tag::create(['nombre'=>'MAESTROS PRIVADOS','anuncio_id'=>$anuncio10->id,]);
            Tag::create(['nombre'=>'CURSOS','anuncio_id'=>$anuncio10->id,]);

            $anuncio11=Anuncio::create( ['nombre' => 'Venta de menbresia', 'precio'=>2500,'vista'=>0,'status'=>1,'descripcion'=>'Se vende menbresia de kalomai park','moneda'=>'$', 'ubicacion'=>'Calle 22','puntuacion'=>0,'estado'=>'Nuevo','categoria_id'=>5,'user_id'=>7]);
            imagen::create(['url'=>'kalomai1.png','anuncio_id'=>$anuncio11->id,]);
            imagen::create(['url'=>'kalomai2.jpg','anuncio_id'=>$anuncio11->id,]);
            imagen::create(['url'=>'kalomai3.jpg','anuncio_id'=>$anuncio11->id,]);

            Tag::create(['nombre'=>'KALOMAI PARK','anuncio_id'=>$anuncio11->id,]);
            Tag::create(['nombre'=>'MENBRESIA KALOMAI','anuncio_id'=>$anuncio11->id,]);
            Tag::create(['nombre'=>'GRUPO SION','anuncio_id'=>$anuncio11->id,]);

            $anuncio12=Anuncio::create( ['nombre' => 'Mesas', 'precio'=>500,'vista'=>0,'status'=>1,'descripcion'=>'Se realiza contruccion de mesa a media ','moneda'=>'Bs', 'ubicacion'=>'Calle 18','puntuacion'=>0,'estado'=>'Nuevo','categoria_id'=>8,'user_id'=>8]);
            imagen::create(['url'=>'mesa1.jpg','anuncio_id'=>$anuncio12->id,]);
            imagen::create(['url'=>'mesa2.jpg','anuncio_id'=>$anuncio12->id,]);
            imagen::create(['url'=>'mesa3.png','anuncio_id'=>$anuncio12->id,]);

            Tag::create(['nombre'=>'MESA DE 100% MADERA','anuncio_id'=>$anuncio12->id,]);
            Tag::create(['nombre'=>'MESA','anuncio_id'=>$anuncio12->id,]);
            Tag::create(['nombre'=>'MADERA','anuncio_id'=>$anuncio12->id,]);

            $anuncio13=Anuncio::create( ['nombre' => 'Pc gamer', 'precio'=>2500,'vista'=>0,'status'=>1,'descripcion'=>'Venta de pc gamer ' ,'moneda'=>'$', 'ubicacion'=>'Calle 36','puntuacion'=>0,'estado'=>'Nuevo','categoria_id'=>6,'user_id'=>9]);
            imagen::create(['url'=>'pc1.png','anuncio_id'=>$anuncio13->id,]);
            imagen::create(['url'=>'pc2.png','anuncio_id'=>$anuncio13->id,]);
            imagen::create(['url'=>'pc3.jpg','anuncio_id'=>$anuncio13->id,]);

            Tag::create(['nombre'=>'PC GAMER','anuncio_id'=>$anuncio13->id,]);
            Tag::create(['nombre'=>'PC INTEL','anuncio_id'=>$anuncio13->id,]);
            Tag::create(['nombre'=>'PC AMD','anuncio_id'=>$anuncio13->id,]);

            $anuncio14=Anuncio::create( ['nombre' => 'Puerta de madera', 'precio'=>2500,'vista'=>0,'status'=>1,'descripcion'=>'Se realiza puerta para casas,oficinas, etc.  ', 'ubicacion'=>'Calle 47','moneda'=>'Bs','puntuacion'=>0,'estado'=>'Nuevo','categoria_id'=>8,'user_id'=>10]);
            imagen::create(['url'=>'puerta1.jpg','anuncio_id'=>$anuncio14->id,]);
            imagen::create(['url'=>'puerta2.jpg','anuncio_id'=>$anuncio14->id,]);
            imagen::create(['url'=>'puerta3.jpg','anuncio_id'=>$anuncio14->id,]);
            imagen::create(['url'=>'puerta3.jpg','anuncio_id'=>$anuncio14->id,]);

            Tag::create(['nombre'=>'PUERTA','anuncio_id'=>$anuncio14->id,]);
            Tag::create(['nombre'=>'MADERA','anuncio_id'=>$anuncio14->id,]);
            Tag::create(['nombre'=>'PUERTA madera','anuncio_id'=>$anuncio14->id,]);

     }
    }
