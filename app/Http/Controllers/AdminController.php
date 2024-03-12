<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\client;
use App\Models\Categorie;
use App\Models\Reservation;
use App\Models\organisateur;
use Illuminate\Http\Request;

class AdminController extends Controller
{
      //    --------------la fonction d'afficher les categories------------------- 
    public function index(Request $request)
    {
        $categories = Categorie::where('status', '1')->get();
        $categorieEdit = null;
        if ($request->categorieId) {
            $categorieEdit = Categorie::find($request->categorieId);
        }
        return view('admin.manageCategory', [
            'categories' => $categories,
            'categorieEdit' => $categorieEdit,

        ]);
    }



    // ------------------les statistiques administrateur---------------------------------
    public function adminPage()
    {
        $categories = Categorie::where('status', '1')->get();
        $eventCounts = [];
        foreach ($categories as $category) {
            $eventCounts[$category->id] = Event::where('id_categorie', $category->id)
                                                ->whereIn('status', ['1', '3'])
                                                ->count();
        }
        $organizersCount = organisateur::count();
        $clientsCount = client::count();
        $eventCount = Event::where('status', '!=', '2')->count('id');
        $categoriesCount = count($categories);
        $events = Event::whereIn('status', ['1', '3'])->with('categorie')->get();
        
        return view('admin.admin', compact('categoriesCount', 'categories', 'organizersCount', 'clientsCount', 'eventCount', 'events', 'eventCounts'));
    }



// ------------------------ la fonction de ajouter une categorie--------------------------------
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);
        Categorie::create([
            'titre' => $request->category_name,
        ]);
        return redirect()->back()->with('success', 'Category added successfully!');
    }




// ----------------la fonction de supprimer une categorie-------------
    public function destroy($id)
    {
        $category = Categorie::findOrFail($id);
        $category->update(['status' => '0']);
        return redirect()->back()->with('success', 'Category deleted successfully!');
    }



    // ----------------la fonction de modifier une categorie-------------

    public function updateCategorie(Request $requets)
    {
        Categorie::where('id' , $requets->categorieId)->update([
            'titre' => $requets->name
        ]);
        return redirect('/manageCategory');
    }


    // ----------la fonction de d'afficher les evenements creer par organisateur pour l'admin-------------

    public function manageEvents()
    {     
        $events = Event::where('status', '0')->with('user','categorie')->get();
        return view('admin.manageEvents', compact('events'));
    }


   
    // ------------------la fonction d'accepter un evenement--------------------
public function acceptEvent($id)
{
    $event = Event::findOrFail($id);
    $event->update(['status' => '1']);
    return redirect()->back()->with('success', 'Event accepted successfully!');
}



    // ------------------la fonction de refuser un evenement-------------------
public function refuseEvent($id)
{
    $event = Event::findOrFail($id);
    $event->update(['status' => '2']);
    return redirect()->back()->with('success', 'Event refused');
}


    // ----------la fonction  d'afficher les clients---------------------
public function banClient(){
    $clients=client::all();
    return view('admin.manageClient',compact('clients'));
}

    // ----------la fonction d'afficher les organisateurs---------------------

public function banOrganizer(){
    $organizers=organisateur::all();
    return view('admin.manageOrganizer',compact('organizers'));
}
    // ----------la fonction de banner un utilisateur---------------------

public function archiveUser($id)
    {
        $organizer =  organisateur::where('user_id', $id)->value('id');
        $events = event::where('user_id', $id)->get();
        $client =  client::where('user_id', $id)->value('id');
        $user = User::find($id);

        if ($organizer) {
            $user->delete();
            organisateur::where('user_id', $id)->delete();
            event::where('user_id', $id)->delete();
            foreach ($events as $event) {

                Reservation::where('event_id', $event->id)->delete();
            }
            return redirect()->back()->with('success', 'User Banned successfully');
        }
        if ($client) {
            $user->delete();
            client::where('user_id', $id)->delete();
            Reservation::where('user_id', $id)->delete();
            return redirect()->back()->with('success', 'User Banned successfully');
        }



        return redirect()->back()->with('error', 'User not found');
    }

}
