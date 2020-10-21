<?php

use App\Shop\Categories\Category;
use App\Shop\Products\Product;
use Illuminate\Database\Seeder;

class CategoryProductsTableSeeder extends Seeder
{
    public function run()
    {
        factory(Category::class, 2)->create()->each(function (Category $category) {
            factory(Product::class, 6)->make()->each(function(Product $product) use ($category) {
                $category->products()->save($product);
            });
        });

        \DB::table('categories')->insert(array (
            0 =>
                array (
                    'name' => 'Laptops',
                    'slug' => 'laptops',
                    'description' => 'best and latest laptops',
                    'cover' => 'categories/laptops.jpg',
                    'status' => 1,
                    '_lft' => 9,
                    '_rgt' => 10,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')

                ),
            1 =>
                array (
                    'name' => 'Smart Home',
                    'slug' => 'smart home',
                    'description' => 'best equipments for smart home',
                    'cover' => 'categories/smart-home.jpg',
                    'status' => 1,
                    '_lft' => 11,
                    '_rgt' => 12,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ),
            2 =>
                array (
                    'name' => 'Furnitures',
                    'slug' => 'furnitures',
                    'description' => 'best furniture equipments',
                    'cover' => 'categories/furniture.jpg',
                    'status' => 1,
                    '_lft' => 13,
                    '_rgt' => 14,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')

                ),
            3 =>
                array (
                    'name' => 'Phones & Accessories',
                    'slug' => 'Phones & Accessories',
                    'description' => 'Best Phones & Accessories',
                    'cover' => 'categories/cell-phone-accessories.png',
                    'status' => 1,
                    '_lft' => 15,
                    '_rgt' => 16,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ),
        ));
    }
}