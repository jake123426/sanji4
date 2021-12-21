<?php

namespace Database\Seeders;

use App\Models\Subcategoria;
use Illuminate\Database\Seeder;

class SubcategoriaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //1
        $subcategoria=new Subcategoria();
        $subcategoria->nombre="nuevos";
        $subcategoria->categoria_id=1;
        $subcategoria->save();

        $subcategoria=new Subcategoria();
        $subcategoria->nombre="usados";
        $subcategoria->categoria_id=1;
        $subcategoria->save();


       //1

           //1
        $subcategoria=new Subcategoria();
        $subcategoria->nombre="nuevos";
        $subcategoria->categoria_id=2;
        $subcategoria->save();

        $subcategoria=new Subcategoria();
        $subcategoria->nombre="usados";
        $subcategoria->categoria_id=2;
        $subcategoria->save();

        $subcategoria=new Subcategoria();
        $subcategoria->nombre="sin papeles";
        $subcategoria->categoria_id=2;
        $subcategoria->save();
            //2

       //3

       $subcategoria=new Subcategoria();
       $subcategoria->nombre="Nuevos";
       $subcategoria->categoria_id=3;
       $subcategoria->save();

       $subcategoria=new Subcategoria();
       $subcategoria->nombre="usados";
       $subcategoria->categoria_id=3;
       $subcategoria->save();

       $subcategoria=new Subcategoria();
       $subcategoria->nombre="De Fabricas";
       $subcategoria->categoria_id=3;
       $subcategoria->save();

       //3
       //4

       $subcategoria=new Subcategoria();
       $subcategoria->nombre="Ropa Deportiva";
       $subcategoria->categoria_id=4;
       $subcategoria->save();

       $subcategoria=new Subcategoria();
       $subcategoria->nombre="Accesorio Deportivo";
       $subcategoria->categoria_id=4;
       $subcategoria->save();

       $subcategoria=new Subcategoria();
       $subcategoria->nombre="Otras Cosas Deportivas";
       $subcategoria->categoria_id=4;
       $subcategoria->save();


       //4
       //5

       $subcategoria=new Subcategoria();
       $subcategoria->nombre="casa a estrenar";
       $subcategoria->categoria_id=5;
       $subcategoria->save();

       $subcategoria=new Subcategoria();
       $subcategoria->nombre="casas en alquiler";
       $subcategoria->categoria_id=5;
       $subcategoria->save();

       $subcategoria=new Subcategoria();
       $subcategoria->nombre="casas en ventas";
       $subcategoria->categoria_id=5;
       $subcategoria->save();

       $subcategoria=new Subcategoria();
       $subcategoria->nombre="otros";
       $subcategoria->categoria_id=5;
       $subcategoria->save();
       //5
       //6

       $subcategoria=new Subcategoria();
       $subcategoria->nombre="nuevos";
       $subcategoria->categoria_id=6;
       $subcategoria->save();

       $subcategoria=new Subcategoria();
       $subcategoria->nombre="usados";
       $subcategoria->categoria_id=6;
       $subcategoria->save();

       $subcategoria=new Subcategoria();
       $subcategoria->nombre="piezas de celular";
       $subcategoria->categoria_id=6;
       $subcategoria->save();

       $subcategoria=new Subcategoria();
       $subcategoria->nombre="otros";
       $subcategoria->categoria_id=6;
       $subcategoria->save();
       //6
       //7
       $subcategoria=new Subcategoria();
       $subcategoria->nombre="ama de casa";
       $subcategoria->categoria_id=7;
       $subcategoria->save();

       $subcategoria=new Subcategoria();
       $subcategoria->nombre="niñera";
       $subcategoria->categoria_id=7;
       $subcategoria->save();

       $subcategoria=new Subcategoria();
       $subcategoria->nombre="otros";
       $subcategoria->categoria_id=7;
       $subcategoria->save();

       $subcategoria=new Subcategoria();
       $subcategoria->nombre="otros";
       $subcategoria->categoria_id=8;
       $subcategoria->save();



        }
}
