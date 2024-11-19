<?php

namespace App\Http\Controllers;

use App\Models\Commandes;
use App\Models\Restaurants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class CommandesController extends Controller
{
    
    public function store(Request $request, Restaurants $restaurant)
    {
        $request->validate([
            'id_produit' => 'required|exists:produits,id',
        ]);
        
        try {
            $commande = new Commandes();
            $commande->id_produit = $request['id_produit'];
            $commande->id_utilisateur = Auth::id();
            $commande->id_restaurant = $restaurant->id;
            $commande->id_livreur = rand(1,2);
            $commande->prix = $request['prix'];
            $commande->save();

            return redirect()->route('restaurant.showProducts', $restaurant)
                             ->with('success', 'Commande created successfully!');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('restaurant.showProducts', $restaurant)
                             ->with('error', 'Failed to create the commande.');
        }
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id_user = Auth::id(); // Get the authenticated user
        $commandes = Commandes::where('id_utilisateur', $id_user)
                            ->orderByDesc('created_at')
                            ->paginate(10); // Adjust pagination as needed
        Log::info($commandes);

        return view('commandes', compact('commandes'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Commandes $commandes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commandes $commandes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Commandes $commandes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Commandes $commande)
    {   
        try {
            $id_user = Auth::id(); 
            if($request['id_utilisateur'] == $id_user)
            $commande = Commandes::findOrFail($commande->id); // Ensure the record exists
            $commande->delete();
    
            return redirect()->route('commandes.index')
                             ->with('success', 'Commande deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Failed to delete command:', ['error' => $e->getMessage()]);
            return redirect()->route('commandes.index')
                             ->with('error', 'Failed to delete the commande.');
        }
    }
}
