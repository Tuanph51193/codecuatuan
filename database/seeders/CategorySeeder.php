<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // //tạo 1 bản ghi
        // DB::table('categories')->insert([
        //     // 'name'=>'ngocnb',//nhap thang noi dung truc tiep
        //     'name' => fake()->name(), // fake 1 du lieu ngau nhien
        //     'status' => fake()->numberBetween(0, 1),

        // ]);
        // //tạo nhiều bản ghi
        //tao bang rong
        $cateSeed = [];
        for ($i = 0; $i < 10; $i++) {
            $cateSeed[] = [
                'name' => fake()->name(),
                'status' => fake()->numberBetween(0, 1),
            ];
        }
        DB::table('categories')->insert($cateSeed);
    }
}
