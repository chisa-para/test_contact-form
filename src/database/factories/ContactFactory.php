<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\Contact;


class ContactFactory extends Factory
{
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categoryIds = Category::pluck('id')->toArray();

        return [
            'last_name'  => $this->faker->lastName,
            'first_name' => $this->faker->firstName,
            'gender'     => $this->faker->randomElement([1, 2, 3]),
            'email'      => $this->faker->unique()->safeEmail, 
            'tel'        => $this->faker->phoneNumber,
            'address'    => $this->faker->address,
            'building'   => $this->faker->secondaryAddress, 
            'category_id' => $this->faker->randomElement($categoryIds),
            'detail'     => $this->faker->realText(60),
        ];
    }
}
