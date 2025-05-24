<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User; // Pastikan User model sudah ada
use App\Models\Task;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition()
    {
        return [
            // Mengasumsikan user sudah ada, kita buat random user_id
            'user_id' => $this->faker->randomElement([1, 2]),

            // Task berupa kalimat acak
            'task' => $this->faker->sentence(),

            // is_completed random true/false
            'is_completed' => $this->faker->boolean(20), // 20% chance selesai

            // timestamps otomatis terisi oleh Laravel saat create
        ];
    }
}
