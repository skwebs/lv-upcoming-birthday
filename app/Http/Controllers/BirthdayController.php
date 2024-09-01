<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// class BirthdayController extends Controller
// {
//     //
// }

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class BirthdayController extends Controller
{
    public function upcomingBirthdays()
    {
        // $currentDate = Carbon::create('25-08-2024');
        $currentDate = Carbon::now();

        // dd($currentDate->toDate());
        $endDate = $currentDate->copy()->addDays(7);

        if ($currentDate->format('m-d') <= $endDate->format('m-d')) {
            $users = User::whereRaw("
                DATE_FORMAT(birthdate, '%m-%d') BETWEEN ? AND ?
            ", [
                $currentDate->format('m-d'),
                $endDate->format('m-d')
            ])->orderByRaw("DATE_FORMAT(birthdate, '%m-%d')") // Sort by month and day
                ->get();
        } else {
            $users = User::where(function ($query) use ($currentDate, $endDate) {
                $query->whereRaw("
                    DATE_FORMAT(birthdate, '%m-%d') >= ?
                ", [$currentDate->format('m-d')])
                    ->orWhereRaw("
                    DATE_FORMAT(birthdate, '%m-%d') <= ?
                ", [$endDate->format('m-d')]);
            })->get();
        }

        return view('birthdays.upcoming', compact('users'));
    }
}
