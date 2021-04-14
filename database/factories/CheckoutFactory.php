<?php

namespace Database\Factories;

use App\Models\Checkout;
use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class CheckoutFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Checkout::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
//             'user_id' => User::all()->random()->id,
//             'book_id' => Book::inRandomOrder()->limit(11)->get(),
//             'checked_out' => Carbon::now(),
//             'due_date' => Carbon::createFromTime(96),
//             'returned_date' => null,
//             'checked_out_condition' => $this->faker->numberBetween(0, 5),
//             'checked_in_condition' => null,
        ];
    }
}