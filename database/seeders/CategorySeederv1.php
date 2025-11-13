<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeederv1 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table("t_categories")->insert([
            [
                "id" => "SMARTPHONE terbaru",
                "name" => "Iphone 16",
                "description" => "New Iphone 16 pro max",
                "created_at" => now(),
            ],
            [
                "id" => "LAPTOP terbaru",
                "name" => "Macbook Pro",
                "description" => "New Macbook Pro 2025",
                "created_at" => now(),
            ]
        ]);
    }
}
