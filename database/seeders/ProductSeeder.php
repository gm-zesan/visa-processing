<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = array(
            array('id' => '1','name' => 'Product 1','category_id' => '1','thumbnail' => 'upload/products/20240314064130.jpg','price' => '100.00','description' => '<p>Product 1In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.</p>','created_at' => '2024-03-14 06:24:13','updated_at' => '2024-03-14 06:41:30'),
            array('id' => '2','name' => 'Product 2','category_id' => '1','thumbnail' => 'upload/products/20240314064148.jpg','price' => '200.00','description' => '<p>Product 2In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.</p>','created_at' => '2024-03-14 06:24:13','updated_at' => '2024-03-14 06:41:48'),
            array('id' => '3','name' => 'Product 3','category_id' => '1','thumbnail' => 'upload/products/20240314064158.jpg','price' => '300.00','description' => '<p>Product 3In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.</p>','created_at' => '2024-03-14 06:24:13','updated_at' => '2024-03-14 06:41:58'),
            array('id' => '4','name' => 'Product 4','category_id' => '2','thumbnail' => 'upload/products/20240314063554.jpg','price' => '400.00','description' => '<p>Product 4In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.</p>','created_at' => '2024-03-14 06:24:13','updated_at' => '2024-03-14 06:35:54'),
            array('id' => '5','name' => 'Product 5','category_id' => '2','thumbnail' => 'upload/products/20240314063608.jpg','price' => '500.00','description' => '<p>Product 5In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.</p>','created_at' => '2024-03-14 06:24:13','updated_at' => '2024-03-14 06:36:08'),
            array('id' => '6','name' => 'Product 6','category_id' => '2','thumbnail' => 'upload/products/20240314063623.jpg','price' => '600.00','description' => '<p>Product 6In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.</p>','created_at' => '2024-03-14 06:24:13','updated_at' => '2024-03-14 06:36:23'),
            array('id' => '7','name' => 'Product 7','category_id' => '2','thumbnail' => 'upload/products/20240314064338.jpg','price' => '800.00','description' => '<p>Product 7In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.</p>','created_at' => '2024-03-14 06:24:13','updated_at' => '2024-03-14 06:43:38'),
            array('id' => '8','name' => 'Product 8','category_id' => '3','thumbnail' => 'upload/products/20240314063803.jpg','price' => '900.00','description' => '<p>Product 8In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.</p>','created_at' => '2024-03-14 06:24:13','updated_at' => '2024-03-14 06:38:03'),
            array('id' => '9','name' => 'Product 9','category_id' => '3','thumbnail' => 'upload/products/20240314064439.jpg','price' => '900.00','description' => '<p>Product 9In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.</p>','created_at' => '2024-03-14 06:24:13','updated_at' => '2024-03-14 06:44:39'),
            array('id' => '10','name' => 'Product 10','category_id' => '3','thumbnail' => 'upload/products/20240314063845.jpg','price' => '1000.00','description' => '<p>Product 10In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.</p>','created_at' => '2024-03-14 06:24:13','updated_at' => '2024-03-14 06:38:45'),
            array('id' => '11','name' => 'Product 11','category_id' => '4','thumbnail' => 'upload/products/20240314063926.jpg','price' => '1100.00','description' => '<p>Product 11In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.</p>','created_at' => '2024-03-14 06:24:13','updated_at' => '2024-03-14 06:39:26'),
            array('id' => '12','name' => 'product 12','category_id' => '4','thumbnail' => 'upload/products/20240314064230.jpg','price' => '1200.00','description' => '<p>product 12In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.</p>','created_at' => '2024-03-14 06:40:41','updated_at' => '2024-03-14 06:42:30')
        );

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
