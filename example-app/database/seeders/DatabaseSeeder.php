<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     
Seed the application's database.*/
  public function run(): void{// تشغيل UserSeeder$this->call([UserSeeder::class,]);

        // يمكنك إضافة Seeders أخرى هنا
        // $this->call([
        //     AnotherSeeder::class,
        // ]);
    }
}