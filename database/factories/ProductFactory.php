<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = $this->faker;
        return [
            'title' =>  $faker->randomElement([
                'موبایل سامسونگ',
                'لپ تاپ سونی',
                'لپ تاپ فوجیتسو',
                'پاور بانک',
                'دوربین',
                'کابل صدا',
                'کتابخوان',
            ]),
            'description' => 'این یک متن سفارشی برای محصولات امین پنل است که برای بهتر دیده شدن المنت ها طراحی شده است.',
            'image' => 'https://via.placeholder.com/286*180?text=Image',
            'price' => $faker->randomElement([
               150000, 450000, 252000 , 25000, 150000, 850000, 650000, 450000
            ]),
            'stock' => $faker->randomDigitNotNull
        ];
    }
}
