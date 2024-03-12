<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Event;
use App\Models\Categorie;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $selectedEvent = null;
        $searchQuery = $request->input('search');
        $categoryId = $request->input('category');
        $eventsQuery = Event::query();

        if ($searchQuery) {
            $eventsQuery->where('titre', 'like', '%' . $searchQuery . '%');
        }
        if ($categoryId) {
            $eventsQuery->where('id_categorie', $categoryId);
        }

        $eventsQuery->where('status', '1')->with('user')->orderBy('date', 'desc');

        $events = $eventsQuery->paginate(4);

        foreach ($events as $event) {
            if (Carbon::parse($event->date)->lte(Carbon::now())) {
                $event->status = '3';
                $event->save();
            }
        }
        $countReservation = Reservation::where('status', '1')->where('user_id', auth::id())->count();


        $categories = Categorie::where('status', '1')->get();

        return view('client.client', compact('events', 'categories', 'selectedEvent', 'countReservation'));
    }
    public function ReserveEvent($eventId, $userId)
    {
        $userId = auth::id();
        try {
            $event = event::where('id', $eventId)->first();
            if ($event->nbPlacesRester > '0') {
                if ($event->acceptation === 'manuelle') {
                    reservation::create(
                        [
                            'status' => '0',
                            'event_id' => $eventId,
                            'user_id' => $userId,
                        ]
                    );

                    return redirect()->back()->with('success', 'Request Sent successfully');
                } else {
                    reservation::create(
                        [
                            'status' => '1',
                            'event_id' => $eventId,
                            'user_id' => $userId,
                        ]

                    );
                    event::where('id', $eventId)->update([
                        'nbPlacesRester' => (int)$event->nbPlacesRester - 1,
                    ]);
                    return redirect()->back()->with('success', 'Reserved');
                }
            } else {
                return redirect()->back()->with('error', 'Out Of Stock');
            }
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->view('errors.404', [], 404);
        }
    }

    public function Reservations()
    {
        $reservations = Reservation::where('status', '1')->where('user_id', auth::id())->get();
        $countReservation = Reservation::where('status', '1')->where('user_id', auth::id())->count();

        return view('client.Reservations', compact('reservations', 'countReservation'));
    }

    
    public function tickets($idResevation)
    {
        $reservation = Reservation::findOrFail($idResevation);
        $countReservation = Reservation::where('status', '1')->where('user_id', auth::id())->count();
        return view('client.tickets', compact('reservation', 'countReservation'));
    }
}
