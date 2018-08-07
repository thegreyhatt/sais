<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category, Validator, Input, App\Item, DB;

class ItemController extends Controller
{
    public function ShowItems()
    {

    	$categories = Category::pluck('name', 'id');

    	return view('admin.items')
    		->with('categories', $categories);
    }

    public function AddNewItem(Request $request)
    {
    	$rules = [
            'name' => 'required',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
        ];

        $msgs = [
        	'name.required' => 'Category name is required.'
        ];

        $validator = Validator::make(Input::all(), $rules, $msgs);

        if($validator->fails()){
            return redirect()->back()
                ->withInput(Input::all())
                ->with('err', 'Error')
                ->withErrors($validator);
        }else{

        	Item::Create($request->all());

        return redirect()->back()
            ->with('msg','New Item Added.');
        }
    }

    public function ItemsList()
    {
    	$items = Item::join('categories', 'items.category_id', '=', 'categories.id')
    		->get(['items.id as id', 'items.name as item_name', 'items.description', 'categories.name as category_name', 'quantity', 'price']);

    	// return $items;	

        $return_array = [];
        foreach($items as $item) {
            $return_array[] = [
                'id' => $item->id,
                'name' => $item->item_name,
                'category' => $item->category_name,
                'description' => $item->description,
                'quantity' => $item->quantity,
                'price' => 'P'.number_format($item->price,2),
            ];
        }
        return response()->json(['data' => $return_array]);
    }
}
