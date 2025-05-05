<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SearchItem;


class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');

        // Ищем совпадения в полях "name" и "url"
        $results = SearchItem::query()
            ->where('name', 'like', "%{$query}%")
            ->orWhere('url', 'like', "%{$query}%")
            ->get(['name', 'url']);

        return response()->json($results);
    }
}
