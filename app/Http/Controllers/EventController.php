<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $query = Event::query();

        // Filter by date if provided
        if ($request->has('year-min') && $request->has('year-max') && !empty($request->input('year-min')) && !empty($request->input('year-max'))) {
            $query->whereYear('event_date', '>=', $request->input('year-min'))->whereYear('event_date', '<=', $request->input('year-max'));
        }

        // Sort by date
        if ($request->has('sort') && $request->input('sort') == 'asc') {
            $query->orderBy('event_date', 'asc');
        } else {
            $query->orderBy('event_date', 'desc');
        }

        $events = $query->get();

        return view('index', compact('events'));
    }
}
