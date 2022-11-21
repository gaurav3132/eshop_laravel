<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Intervention\Image\Facades\Image;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $images=[];

        for($i=1;$i<=4;$i++){
            $img= Image::make('https://picsum.photos/1280/720');
            $filename = "img".date('YmdHis').rand(1000,9999).".jpg";
            $img->save(public_path("images/{$filename}"));
            $images[]=$filename;
        }

        return [
            'name' => fake()->name(),
            'summery' => fake()->realText(),
            'details' => fake()->realTextBetween(1000,2000),
            'category_id' => Category::inRandomOrder()->first()->id,
            'brand_id' => Brand::inRandomOrder()->first()->id,
            'status' => 'Active',
            'featured' => 'NO',
            'images' => $images,
            'price' => rand(500,50000),



        ];
    }
}
