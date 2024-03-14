<?php

namespace App\Http\Controllers;

use App\Models\Medicines;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class MedicinesController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(Medicines::with('created_by')->get())
                ->addIndexColumn()
                ->addColumn("action", function (Medicines $medicine) {
                    $btn = '<a href="' . route('medicines.edit', $medicine->id) . '" class="edit btn btn-info btn-sm"><i class="md md-edit"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.medicines.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.medicines.create', ['dosages' => (Medicines::$dosage_forms)]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(Medicines::$rules, Medicines::$messages);

        $medicine_data = [
            'name' => $request->name,
            'strength' => $request->strength,
            'description' => $request->description,
            'user_id' => Auth::user()->id,
            'unit_price' => $request->unit_price,
            'dosage_form' => $request->dosage_form
        ];

        Medicines::create($medicine_data);
        return redirect()->route('medicines.index')->with('success', 'Medicine Added Successfully..');
    }

    public function edit(string $id)
    {
        return view('admin.medicines.edit', [
            'medicine' => Medicines::find($id),
            'dosages' => (Medicines::$dosage_forms)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $medicine_data = [
            'name' => $request->name,
            'strength' => $request->strength,
            'description' => $request->description,
            'user_id' => Auth::user()->id,
            'unit_price' => $request->unit_price,
            'dosage_form' => $request->dosage_form
        ];

        Medicines::where('id', $id)->update($medicine_data);
        return redirect()->route('medicines.index')->with('success', 'Medicine Detail Updated Successfully..');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
