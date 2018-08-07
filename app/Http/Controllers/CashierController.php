<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class CashierController extends Controller
{
    public function index()
    {

        $items = Item::orderBy('name')
            ->pluck('name', 'id');

        return view('cashier.index')
            ->with('items', $items);
    }

    public function itemInfo($id)
    {
    	$item = Item::find($id);

    	return response()->json($item);

    }


}
