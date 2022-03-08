<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new  \App\Models\Category([
            'name' => 'Grocery',
            'is_active' => '1'
        ]);
        $category -> save();     

        $category = new  \App\Models\Category([
            'name' => 'Electronics',
            'is_active' => '1'
        ]);
        $category -> save(); 

        $category = new  \App\Models\Category([
            'name' => 'Accessories',
            'is_active' => '1'
        ]);
        $category -> save();
    }
}
