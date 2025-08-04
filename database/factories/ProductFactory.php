<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

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

        $vendor = User::role('vendor')->inRandomOrder()->first() ?? User::inRandomOrder()->first();

        $name = $this->faker->unique()->words(mt_rand(2, 4), true);
        $price = $this->faker->numberBetween(5, 500);
        $stock = $this->faker->numberBetween(0, 200);

        $dir = public_path('products');

        $files = collect(File::files($dir))
            ->map(fn($f) => $f->getFilename());

        $filename = $files->random();

        return [
            'vendor_id' => $vendor->id,
            'name' => $name,
            'description' => $this->faker->paragraphs(mt_rand(2, 4), true),
            'price' => $price,
            'stock' => $stock,
            'image' => '/products/' . $filename
        ];
    }
}
