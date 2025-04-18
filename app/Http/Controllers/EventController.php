<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Exception;
use Illuminate\Http\Request;

class EventController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->validate([
            'search'   => 'nullable|string',
            'type'     => 'nullable|string',
            'start_at' => 'nullable|string',
            'end_at'   => 'nullable|string',
        ]);

        try {
            $events = Event::query()
                ->when($request->type, function ($query, $type) {
                    $query->where('type', $type);
                })
                ->when($request->search, function ($query, $search) {
                    $query->where('name', 'like', '%' . $search . '%');
                })
                ->when($request->start_at, function ($query, $startAt) {
                    $query->whereDate('start_at', '>=', $startAt);
                })
                ->when($request->end_at, function ($query, $endAt) {
                    $query->whereDate('end_at', '<=', $endAt);
                })
                ->paginate(10);

            return response()->json([
                'success' => true,
                'message' => 'Events retrieved successfully',
                'data'    => $events
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage() ?: 'Failed to retrieve events'
            ], 400);
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'string|required',
            'district' => 'string|required',
            'province' => 'string|required',
            'venue' => 'string|required',
            'description' => 'string|nullable',
            'start_at' => 'date|required',
            'end_at' => 'date|nullable|after_or_equal:start_at',
        ]);

        try {
            Event::create([
                'name' => $request->name,
                'district' => $request->district,
                'province' => $request->province,
                'venue' => $request->venue,
                'description' => $request->description,
                'start_at' => $request->start_at,
                'end_at' => $request->end_at,
            ]);
            return response()->json(['success' => true, 'message' => 'Event created successfully'], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage() ?: 'Failed to retrieve events'
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:events,id'
        ]);
        try {
            $event = Event::findOrFail($request->id);
            return response()->json(['success' => true, 'message' => 'Data retrived successfully'], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage() ?: 'Failed to retrieve events'
            ], 400);
        }
    }

    /**
     * Function  for edit event
     */
    public function edit(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:events,id',
            'name' => 'string|required',
            'district' => 'string|required',
            'province' => 'string|required',
            'venue' => 'string|required',
            'description' => 'string|nullable',
            'start_at' => 'date|required',
            'end_at' => 'date|nullable|after_or_equal:start_at',
        ]);
        try {
            $event = Event::findOrFail($request->id);
            $event->update([
                'name' => $request->name,
                'district' => $request->district,
                'province' => $request->province,
                'venue' => $request->venue,
                'description' => $request->description,
                'start_at' => $request->start_at,
                'end_at' => $request->end_at,
            ]);
            return response()->json(['success' => true, 'message' => 'Event updated successfully'], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage() ?: 'Failed to retrieve events'
            ], 400);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:events,id'
        ]);
        try {
            Event::findOrFail($request->id)->delete();
            return response()->json(['success' => true, 'message' => 'Event deleted successfully'], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage() ?: 'Failed to delete event'
            ], 400);
        }
    }
}
