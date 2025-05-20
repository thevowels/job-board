<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\EmployerFactory;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory(100)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $users = User::all();
        Employer::factory(User::all()->count())
            ->state( new Sequence(
                fn (Sequence $sequence) => ['user_id' => $users->random()->id],
            ))
            ->create();
        $employers = Employer::all();
        Job::factory(600)
            ->recycle($employers)
            ->create();
        $jobs = Job::all();
        foreach ($users as $user) {
            JobApplication::factory(4)
                ->recycle($jobs)
                ->for($user)
                ->create();
        }
    }
}
