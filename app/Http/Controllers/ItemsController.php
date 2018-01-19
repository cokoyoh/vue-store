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
