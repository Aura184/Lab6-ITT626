<?php

namespace App\Http\Controllers;

use App\Models\Day;

class DayController extends Controller
{
    public function index()
    {
        $days = Day::all();
        return view('days.index', compact('days'));
    }
}