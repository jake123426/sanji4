<?php

namespace Database\Seeders;

use App\Models\Perfil;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = new User();
        $user1->name = "Jose Fernando Oña Carrasco";
        $user1->email = "Fer@correo.com";
        $user1->email_verified_at = now();
        $user1->password = bcrypt('1234');
        $user1->remember_token = Str::random(10);
        $user1->status = true;
        $user1->save();
        $user1->assignRole('admin');

        $perfil1 = new Perfil();
        $perfil1->user_id = $user1->id;
        $perfil1->save();



        $user2 = new User();
        $user2->name = "Marta Manrrique Ortiz";
        $user2->email = "marta@correo.com";
        $user2->email_verified_at = now();
        $user2->password = bcrypt('1212');
        $user2->remember_token = Str::random(10);
        $user2->status = true;
        $user2->save();
        $user2->assignRole('premium');

        $perfil2 = new Perfil();
        $perfil2->user_id = $user2->id;
        $perfil2->save();


        $user3 = new User();
        $user3->name = "Jorge Ortiz Chavez";
        $user3->email = "jorge@correo.com";
        $user3->email_verified_at = now();
        $user3->password = bcrypt('3434');
        $user3->remember_token = Str::random(10);
        $user3->status = true;
        $user3->save();
        $user3->assignRole('basico');

        $perfil3 = new Perfil();
        $perfil3->user_id = $user3->id;
        $perfil3->save();


        $user4 = new User();
        $user4->name = "Madeley Gutierrez Velazco";
        $user4->email = "madeley@correo.com";
        $user4->email_verified_at = now();
        $user4->password = bcrypt('1122');
        $user4->remember_token = Str::random(10);
        $user4->status = true;
        $user4->save();
        $user4->assignRole('basico');

        $perfil4 = new Perfil();
        $perfil4->user_id = $user4->id;
        $perfil4->save();

        $user5 = new User();
        $user5->name = "Luz Vania Pacay Ortega";
        $user5->email = "luz@correo.com";
        $user5->email_verified_at = now();
        $user5->password = bcrypt('2211');
        $user5->remember_token = Str::random(10);
        $user5->status = true;
        $user5->save();
        $user5->assignRole('basico');

        $perfil5 = new Perfil();
        $perfil5->user_id = $user5->id;
        $perfil5->save();

        $user6 = new User();
        $user6->name = "Juan Manuel Leon Pereira";
        $user6->email = "juan@correo.com";
        $user6->email_verified_at = now();
        $user6->password = bcrypt('3344');
        $user6->remember_token = Str::random(10);
        $user6->status = true;
        $user6->save();
        $user6->assignRole('basico');

        $perfil6 = new Perfil();
        $perfil6->user_id = $user6->id;
        $perfil6->save();

        $user7 = new User();
        $user7->name = "Franklin Melendres Uribe";
        $user7->email = "Frank@correo.com";
        $user7->email_verified_at = now();
        $user7->password = bcrypt('4433');
        $user7->remember_token = Str::random(10);
        $user7->status = true;
        $user7->save();
        $user7->assignRole('basico');

        $perfil7 = new Perfil();
        $perfil7->user_id = $user7->id;
        $perfil7->save();


        $user8 = new User();
        $user8->name = "Amanda Poncel Escobar";
        $user8->email = "amanda@correo.com";
        $user8->email_verified_at = now();
        $user8->password = bcrypt('4455');
        $user8->remember_token = Str::random(10);
        $user8->status = true;
        $user8->save();
        $user8->assignRole('basico');

        $perfil8 = new Perfil();
        $perfil8->user_id = $user8->id;
        $perfil8->save();


        $user9 = new User();
        $user9->name = "Maribel Sanchez Perez";
        $user9->email = "mari@correo.com";
        $user9->email_verified_at = now();
        $user9->password = bcrypt('5566');
        $user9->remember_token = Str::random(10);
        $user9->status = true;
        $user9->save();
        $user9->assignRole('basico');

        $perfil9 = new Perfil();
        $perfil9->user_id = $user9->id;
        $perfil9->save();


        $user10 = new User();
        $user10->name = "Juan Gabriel Ferrufino Vasquez";
        $user10->email = "juann@correo.com";
        $user10->email_verified_at = now();
        $user10->password = bcrypt('6655');
        $user10->remember_token = Str::random(10);
        $user10->status = true;
        $user10->save();
        $user10->assignRole('basico');

        $perfil10 = new Perfil();
        $perfil10->user_id = $user10->id;
        $perfil10->save();
    }
}
