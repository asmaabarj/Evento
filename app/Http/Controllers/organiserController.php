<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Event;
use App\Models\Categorie;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganiserController extends Controller
{

    // ----------------la fonction de ajouter un evenement---------------------
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
                'price' => 'required|string',
                'picture' => 'required|image',
                'description' => 'required|string',
            ]);

            $picturePath = $request->file('picture')->store('images', 'public');
            $validatedData['nbPlacesRester'] = $validatedData['numberOfPlaces'];
            $event = new Event;
            $event->titre = $validatedData['titre'];
            $event->date = $validatedData['date'];
            $event->lieu = $validatedData['location'];
            $event->nbPlaces = $validatedData['numberOfPlaces'];
            $event->nbPlacesRester = $validatedData['nbPlacesRester'];
            $event->id_categorie = $validatedData['category'];
            $event->acceptation = $validatedData['reservation_method'];
            $event->price = $validatedData['price'];
            $event->photo = $picturePath;
            $event->description = $validatedData['description'];
            $event->user_id = Auth::id();
            $event->save();

            return redirect()->back()->with('success', 'Event successfully added! Please await confirmation from the administrator!');
        } else {

            $event = Event::where('id', $request->event_id)->with('categorie')->first();
            $categories = Categorie::where('status', '1')->get();
            return view('organisateur.addEvent', compact('categories', 'event'));
        }
    }




    // ----------------la fonction de modifier un evenement---------------------

    public function updateEvent($event_id, Request $request)
    {
        $validatedData = $request->validate([
            'titre' => 'required|string',
            'date' => 'required|date|after_or_equal:' . Carbon::today()->toDateString(),
            'location' => 'required|string',
            'numberOfPlaces' => 'required|integer',
            'category' => 'required|exists:categories,id',
            'reservation_method' => 'required|in:manuelle,automatique',
            'price' => 'required|string',
            'picture' => 'required|image',
            'description' => 'required|string',
        ]);

        $picturePath = $request->file('picture')->store('images', 'public');
        $validatedData['nbPlacesRester'] = $validatedData['numberOfPlaces'];

        $event = Event::findOrFail($event_id);

        $event->titre = $validatedData['titre'];
        $event->date = $validatedData['date'];
        $event->lieu = $validatedData['location'];
        $event->nbPlaces = $validatedData['numberOfPlaces'];
        $event->nbPlacesRester = $validatedData['nbPlacesRester'];
        $event->id_categorie = $validatedData['category'];
        $event->acceptation = $validatedData['reservation_method'];
        $event->price = $validatedData['price'];
        $event->photo = $picturePath;
        $event->description = $validatedData['description'];
        $event->save();

        return redirect('manageEvent')->with('success', 'Event successfully Updated! Please await confirmation from the administrator!');
    }




    // ----------------la fonction de supprimer un evenement---------------------

    public function deletEvent($event_id)
    {


        Event::where('id', $event_id)->delete();
        return redirect()->back()->with('success', 'Event successfully deleted! ');
    }



    // ----------------la fonction d'ffichage  des evenements pour l'organisateur---------------------

    public function index()
    {
        $organiserId = auth::id();
        $events = Event::where('status', '!=', '3')->where('user_id', $organiserId)->with('categorie')->get();
        return view('organisateur.manageEvent', compact('events'));
    }



    // ----------------la fonction de afficher les reservations manuelles---------------------
    public function CheckReservation()
    {
        $organizer = Event::where('user_id', Auth::id())->get();
        $eventIds = [];
        foreach ($organizer as $event) {
            $eventIds[] = $event->id;
        }
        $reservations = Reservation::where('status', '0')
            ->whereIn('event_id', $eventIds)
            ->with('event')
            ->get();
        return view('organisateur.manageReservation', [
            'reservations' => $reservations,
        ]);
    }



    // ----------------la fonction d'accepter les reservations manuelles---------------------

    public function acceptReservation(Request $request, $reservationId)
    {
        $reservation = Reservation::findOrFail($reservationId);

        $reservation->status = '1';
        $reservation->save();

        return redirect()->back();
    }


    
    // ----------------la fonction des reservations automatique---------------------

    public function showEvents()
    {
        $automaticEvents = Event::where('acceptation', 'automatique')->where('user_id', Auth::id())->get();

        foreach ($automaticEvents as $event) {
            $event->reservationCount = Reservation::where('event_id', $event->id)->where('status', '1')->count();
            $event->totalEarnings = Reservation::join('events', 'reservations.event_id', '=', 'events.id')
                ->where('reservations.event_id', $event->id)
                ->where('reservations.status', '1')
                ->sum('events.price');
        }

        $manualEvents = Event::where('acceptation', 'manuelle')->where('user_id', Auth::id())->get();

        foreach ($manualEvents as $event) {
            $event->acceptedReservationsCount = Reservation::where('event_id', $event->id)->where('status', '1')->count();
            $event->notAcceptedReservationsCount = Reservation::where('event_id', $event->id)->where('status', '0')->count();
            $event->totalEarnings = Reservation::join('events', 'reservations.event_id', '=', 'events.id')
                ->where('reservations.event_id', $event->id)
                ->where('reservations.status', '1')
                ->sum('events.price');
        }

        return view('organisateur.organisateur', compact('automaticEvents', 'manualEvents'));
    }
}
