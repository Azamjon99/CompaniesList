<?php

namespace Database\Factories;

use App\Models\CompaniesList;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_id'=>function(){
                return CompaniesList::all()->random();
            },
            'first_name' => $this->faker->name,
            'last_name' => $this->faker->word,
           
            'email' => $this->faker->unique()->safeEmail,

            'phone' => $this->faker->randomDigit,
        ];
    }
}
