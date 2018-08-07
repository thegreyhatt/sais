<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Input, App\Category;

class CategoryController extends Controller
{
    public function ShowCategories()
    {
    	return view('admin.categories');
    }

    public function AddNewCategory(Request $request)
    {
    	$rules = [
            'name' => 'required',
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

        	Category::Create($request->all());

        return redirect()->back()
            ->with('msg','Category Added.');
        }
    }

    public function CategoryList()
    {
        $categories = Category::all();

        $return_array = [];

        foreach($categories as $category) {
            $return_array[] = [
                'id' => $category->id,
                'name' => $category->name,
                'description' => $category->description,
            ];
        }

        return response()->json(['data' => $return_array]);
    }

    public function Category($id)
    {
        $category = Category::find($id);
        return view('admin.category')
            ->with('category', $category);
    }

    public function UpdateCategory(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
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

            $category = Category::find($id);
            $category->name = $request->name;
            $category->description = $request->description;
            $category->save();

        return redirect()->back()
            ->with('msg','Category Updated.');
        }
    }

}
