<?php

namespace App\Http\Controllers;

use App\Models\Produits;
use Illuminate\View\View;
use App\Models\Restaurants;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class RestaurantsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // sanitize the search query input
        $validated = $request->validate([
            'q' => 'nullable|string|max:255',
        ]);

        $query = Restaurants::query();

        if (!empty($validated['q'])) {
            $search = $validated['q'];
            $query->where(function ($q) use ($search) {
                $q->where('nom', 'LIKE', "%{$search}%")
                  ->orWhere('note', 'LIKE', "%{$search}%")
                  ->orWhere('type', 'LIKE', "%{$search}%")
                  ->orWhere('region', 'LIKE', "%{$search}%");
            });
        }
        
        $restaurants = $query->paginate(10);
        // if no records found
        if ($restaurants->isEmpty()) {
            return redirect()->route('restaurants.index')
                             ->with('error', 'No records found for the given search query.');
        }
    
        return view('restaurants', compact('restaurants'));
    }

    /**
     * Display a listing of the products for a specific restaurant.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurants  $restaurant
     * @return View|RedirectResponse
     */
    public function showProducts(Request $request, Restaurants $restaurant): View|RedirectResponse
    {
        // Define your static products (replace with actual product IDs and names)
    $products = [
        ['id' => 1, 'nom' => 'Produit 1', 'prix' => '2000'],
        ['id' => 2, 'nom' => 'Produit 2', 'prix' => '3000'],
        ['id' => 3, 'nom' => 'Produit 3', 'prix' => '4000'],
    ];

    // Define a static price (since all products have the same price)
    $price = 2000;

    return view('restaurants.products', compact('products', 'restaurant'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Restaurants $restaurants)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Restaurants $restaurants)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Restaurants $restaurants)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurants $restaurants)
    {
        //
    }
}
