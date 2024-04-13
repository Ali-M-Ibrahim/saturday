<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $obj = new Category();
        $obj->name= "Category 1";
        $obj->description= "This category is created by Seeder";
        $obj->save();

        Category::create([
            'name'=>"Category 2",
            "description"=>"This category is created by Seeder"
        ]);

        Category::factory(50)->create();

    }
}
