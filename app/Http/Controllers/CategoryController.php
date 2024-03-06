<?php

namespace App\Http\Controllers;

use App\Models\client;
use App\Models\Categorie;
use App\Models\organisateur;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  
    public function index(Request $request)
    {
        $categories = Categorie::all();
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
        $categories = Categorie::all();
        $categoriesCount = $categories->count();
        return view('admin.admin', compact('categoriesCount', 'categories', 'organizersCount', 'clientsCount'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'category_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = time() . '.' . $request->category_image->extension();
        $request->category_image->move(public_path('images'), $imageName);

        Categorie::create([
            'titre' => $request->category_name,
            'photo' => $imageName,
        ]);

        return redirect()->back()->with('success', 'Category added successfully!');
    }


    public function destroy($id)
    {
        $category = Categorie::findOrFail($id);
        $category->delete();

        return redirect()->back()->with('success', 'Category deleted successfully!');
    }
    public function updateCategorie(Request $requets)

    {
        Categorie::where('id' , $requets->categorieId)->update([
            'titre' => $requets->name
        ]);
        return redirect('/manageCategory');
    }
}
