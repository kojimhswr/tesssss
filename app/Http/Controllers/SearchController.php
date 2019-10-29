<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class SearchController extends Controller{

  public function search(Request $request){

    $request->validate([
      'query' => 'required|min:3',
    ]);

    $query = $request->input('query');

    $packages = Package::where('name', 'like', "%$query%")->paginate(10);

    return view('site.pages.search-result')->with('packages', $packages);

  }
}
