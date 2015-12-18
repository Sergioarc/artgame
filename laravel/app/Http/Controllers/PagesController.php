<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Collection;

class PagesController extends Controller{

  public function getHome()
  {
    $collections = Collection::with('subcollections')->get();
    return view('home', [
      'collections' => $collections
    ]);
  }

  public function getStatic($static)
  {
    return view("pages.$static");
  }
}