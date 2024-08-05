<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
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
    public function definition(): array
    {
        $product_name=$this->faker->unique()->words($nb=2,$asText = True);
        $slug=Str::slug($product_name);
        return [
            'name'=>Str::title($product_name),
            'slug'=>$slug, 
            'description'=>$this->faker->text(100),
            'price'=>$this->faker->numberBetween(100,500),
            'discount'=>$this->faker->numberBetween(5,10),
            'price_after_discounting'=>$this->faker->numberBetween(100,500),
            'image'=>$this->faker->numberBetween(4,6).'png',
            'stock_status'=>'instock',
            'quantity'=>$this->faker->numberBetween(100,200),
            'category_id'=>$this->faker->numberBetween(4,6),
        ];
    }
}
