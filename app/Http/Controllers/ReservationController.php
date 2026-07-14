<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::select('date', 'time')->get();

        $bookedSlots = [];
        foreach($reservations as $res) {
            $bookedSlots[$res->date][] = $res->time;
        }

        return view('appointment', compact('bookedSlots'));
    }

    public function getBookedSlots(Request $request) {

        $request->validate(['date' => 'required|date_format:Y-m-d']);
        // echo $request->date;
        $bookedTime = Reservation::where('date', $request->date)->pluck('time')->toArray();
        return response()->json($bookedTime);
        // echo $request;
        // $bookedTimes = Reservation::where('date', $request->date)
        //     ->pluck('time')
        //     ->toArray();

        // return response()->json($bookedTimes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|string|max:64',
            'time' => 'required|string|max:64',
            'services' => 'required'
        ]);

        Reservation::create([
            'date' => $validated['date'],
            'time' => $validated['time'],
            'services' => $validated['services']
        ]);

        return redirect('/')->with('success', 'Reservation was made!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
