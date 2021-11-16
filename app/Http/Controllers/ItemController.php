<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Item::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Item();
        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->is_instock = $request->is_instock;
        $item->img_url = $request->file('img_url')->store('products');
        $item->save();

        return response()->json([
            'message' => 'Item created!',
            'item' => $item
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Item::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->is_instock = $request->is_instock;
        $item->img_url = $request->file('img_url')->store('products');
        $item->save();

        return response()->json([
            'message' => 'Item updated!',
            'item' => $item
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $isDelete = Item::destroy($id);
        if($isDelete) 
        {
            return response()->json(['message' => "Item deleted successfully"], 200);
        }else {
            return response()->json(['message' => "No id found for item"], 404);
        }
    }

    /**
     * Search 
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
      return Item::where('name', 'like', '%'.$name.'%')->get();
    }
}
