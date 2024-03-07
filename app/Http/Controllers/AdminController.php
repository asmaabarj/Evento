<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\client;
use App\Models\Categorie;
use App\Models\organisateur;
use Illuminate\Http\Request;

class AdminController extends Controller
{
  
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

    public function adminPage()
    {
        $organizersCount = organisateur::count();
        $clientsCount = client::count();
        $eventCount= Event::count();
        $categories = Categorie::where('status', '1')->get();
        $categoriesCount = $categories->count();
        return view('admin.admin', compact('categoriesCount', 'categories', 'organizersCount', 'clientsCount','eventCount'));
    }

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


    public function destroy($id)
    {
        $category = Categorie::findOrFail($id);
        $category->update(['status' => '0']);

        return redirect()->back()->with('success', 'Category deleted successfully!');
    }
    public function updateCategorie(Request $requets)

    {
        Categorie::where('id' , $requets->categorieId)->update([
            'titre' => $requets->name
        ]);
        return redirect('/manageCategory');
    }
    
    public function manageEvents()
    {
       
        $events = Event::where('status', '0')->with('user','categorie')->get();
        return view('admin.manageEvents', compact('events'));
    }
   
public function acceptEvent($id)
{
    $event = Event::findOrFail($id);
    $event->update(['status' => '1']);

    return redirect()->back()->with('success', 'Event accepted successfully!');
}

public function refuseEvent($id)
{
    $event = Event::findOrFail($id);
    $event->update(['status' => '2']);
    return redirect()->back()->with('success', 'Event refused');
}
}
