<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\demos;
use App\Models\fruit;
use App\Models\Listing;
use App\Models\listings;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $user=User::factory()->create([
        //     'name'=>"peter",
        //     'email'=>'john@gmail.com'
        // ]);

        // listings::factory(10)->create([
        //     'user_id'=>$user->id
        // ]);
        
        // listings::create([
        //     'title'=>'laravel Senior Development',
        //     'tag'=>'laravel, javascript',
        //     'company'=>'Acme Corp',
        //     'location'=>'Malaysia',
        //     'email'=>'email@email.com',
        //     'website'=>'https://www.acme.com',
        //     'description'=>'hat first winter, it rains and rains as if we have moved to some foreign place, away from the desert; it rains and it rains, and the water comes up to the back step and I think it will enter the house'
        // ]);

        // listings::create([
        //     'title'=>'laravel Junior Development',
        //     'tag'=>'laravel, html',
        //     'company'=>'Acme Corp',
        //     'location'=>'England',
        //     'email'=>'email@email.com',
        //     'website'=>'https://www.acme.com',
        //     'description'=>'hat first winter, it rains and rains as if we have moved to some foreign place, away from the desert; it rains and it rains, and the water comes up to the back step and I think it will enter the house'
        // ]);

        // demos::create([
        //     'username'=>'peter123',
        //     'password'=>'pt123',
        //     'email'=>'pt123@gmail.com',
        // ]);
        // demos::create([
        //     'username'=>'jane123',
        //     'password'=>'jane123',
        //     'email'=>'jane123@gmail.com'
        // ]);
         
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        fruit::create([
            "v_name"=>"apple",
            "qty"=>100,
            "price"=>10,
            "category"=>"fruits"
        ]);

        // fruit::factory(100)->create();


    }
}
