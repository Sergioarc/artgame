<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;

use App\Http\Controllers\Controller;
use App\Collection;
use App\ModelItem;
use App\Color;
use App\Size;
use App\Stock;

class StockController extends Controller
{

    public function index()
    {
    	Log::info("");
        return view('admin.stock.index');
    }

    public function store(Request $request)
    {
      
    }
}