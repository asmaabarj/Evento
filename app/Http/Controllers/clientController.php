<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\Categorie; 
use Illuminate\Support\Facades\DB;
class ClientController extends Controller
{
    public function index(Request $request)
    {
        $searchQuery = $request->input('search');
        $categoryId = $request->input('category');

        $eventsQuery = Event::query();

        if ($searchQuery) {
            $eventsQuery->where('titre', 'like', '%' . $searchQuery . '%');
        }

        if ($categoryId) {
            $eventsQuery->where('id_categorie', $categoryId);
        }

        $eventsQuery->where('status', '1')->orderBy('date', 'desc');

        $events = $eventsQuery->paginate(4);

        foreach ($events as $event) {
            if (Carbon::parse($event->date)->lte(Carbon::now())) {
                $event->status = '3';
                $event->save();
            }
        }

        $categories = Categorie::where('status', '1')->get();

        return view('client.client', compact('events', 'categories'));
    }
}
