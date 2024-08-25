<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Review;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Generate average, good, and bad reviews randomly or by set
        Book::factory(33)->create()->each(function ($book) {
            $numReviews = random_int(5, 30); // how many review to generate

            Review::factory()->count($numReviews)
                ->good() // from good review method
                ->for($book) // create an associate with the book id column
                ->create(); // save to database
        });

        Book::factory(33)->create()->each(function ($book) {
            $numReviews = random_int(5, 30); // how many review to generate

            Review::factory()->count($numReviews)
                ->average() // from average review method
                ->for($book) // create an associate with the book id column
                ->create(); // save to database
        });

        Book::factory(33)->create()->each(function ($book) {
            $numReviews = random_int(5, 30); // how many review to generate

            Review::factory()->count($numReviews)
                ->bad() // from bad review method
                ->for($book) // create an associate with the book id column
                ->create(); // save to database
        });
    }
}
