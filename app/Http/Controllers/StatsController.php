<?php

namespace App\Http\Controllers;

use App\Models\Commandes;
use App\Models\Livreurs;
use App\Models\Restaurants;
use Illuminate\Foundation\Auth\User;

class StatsController extends Controller
{
    public function index()
    {
        $stats = [
            'utilisateurs' => User::count(),
            'comptesActifs' => User::where('status', 'active')->count(),
            'commandes' => Commandes::count(),
            'restaurants' => Restaurants::count(),
            'livreurs' => Livreurs::count(),
        ];

        return view('dashboard', compact('stats'));
    }
}
