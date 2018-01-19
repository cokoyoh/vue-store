<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function index()
    {
        $items = Item::orderBy('id', 'desc')->paginate(10);

        if (request()->expectsJson())
        {
            return response()->json($items,200);
        }
    }

    public function store()
    {
//        dd(request()->all());
        request()->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'number' => 'required'
        ]);

        $exploded = explode(',', request('image'));
        $decoded = base64_decode($exploded[1]);
        if (str_contains($exploded[0], 'jpeg'))
        {
            $extension = 'jpg';
        } else
            $extension = 'png';
        $file_name = time() . '.' . $extension;

        $path = public_path('/images/items/' . $file_name);
        file_put_contents($path, $decoded);

        Item::create([
            'image' => $file_name,
            'name' => request('name'),
            'description' => request('description'),
            'price' => request('price'),
            'number' => request('number')
        ]);

        if(\request()->wantsJson())
        {
            return response()->json(['message', 'Item added successfully'], 200);
        }
    }

    public function destroy($id)
    {
        $item = Item::findOrFail($id);

        $item->delete();

        if(request()->wantsJson())
        {
            return response()->json(['message' => 'Item deleted'], 200);
        }
    }
}
