<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Event;
use App\Models\Categorie;
use Illuminate\Http\Request;

class OrganiserController extends Controller
{
    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $validatedData = $request->validate([
                'titre' => 'required|string',
                'date' => 'required|date|after_or_equal:' . Carbon::today()->toDateString(),
                'location' => 'required|string',
                'numberOfPlaces' => 'required|integer',
                'category' => 'required|exists:categories,id',
                'reservation_method' => 'required|in:manuelle,automatique',
                'picture' => 'required|image',
                'description' => 'required|string',
            ]);

            $picturePath = $request->file('picture')->store('event_pictures');

            $event = new Event;
            $event->titre = $validatedData['titre'];
            $event->date = $validatedData['date'];
            $event->lieu = $validatedData['location'];
            $event->nbPlaces = $validatedData['numberOfPlaces'];
            $event->id_categorie = $validatedData['category'];
            $event->acceptation = $validatedData['reservation_method'];
            $event->photo = $picturePath;
            $event->description = $validatedData['description'];
            $event->save();

            return redirect()->back()->with('success', 'Event successfully added! Please await confirmation from the administrator!');
        } else {
            $categories = Categorie::where('status', '1')->get();
            return view('organisateur.addEvent', compact('categories'));
        }
    }
}