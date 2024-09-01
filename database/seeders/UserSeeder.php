<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::truncate(); // Clear existing records

        User::create([
            'name' => 'Alice',
            'email' => 'alice@example.com',
            'password' => Hash::make('password'),
            'birthdate' => Carbon::createFromDate(1990, 12, 29), // Change the year as needed
        ]);

        User::create([
            'name' => 'Bob',
            'email' => 'bob@example.com',
            'password' => Hash::make('password'),
            'birthdate' => Carbon::createFromDate(1992, 12, 31), // Change the year as needed
        ]);

        User::create([
            'name' => 'Charlie',
            'email' => 'charlie@example.com',
            'password' => Hash::make('password'),
            'birthdate' => Carbon::createFromDate(1988, 01, 02), // Change the year as needed
        ]);
    }
}


// namespace Database\Seeders;

// use App\Models\User;
// use Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use Illuminate\Database\Seeder;

// class UserSeeder extends Seeder
// {
//     /**
//      * Run the database seeds.
//      */
//     public function run(): void
//     {
//         User::truncate(); // Clear existing records

//         User::create([
//             'name' => 'Alice',
//             'email' => 'alice@example.com',
//             'password' => Hash::make('password'),
//             'birthdate' => Carbon::createFromDate(1990, 12, 29), // Change the year as needed
//         ]);

//         User::create([
//             'name' => 'Bob',
//             'email' => 'bob@example.com',
//             'password' => Hash::make('password'),
//             'birthdate' => Carbon::createFromDate(1992, 12, 31), // Change the year as needed
//         ]);

//         User::create([
//             'name' => 'Charlie',
//             'email' => 'charlie@example.com',
//             'password' => Hash::make('password'),
//             'birthdate' => Carbon::createFromDate(1988, 01, 02), // Change the year as needed
//         ]);
//     }
// }
