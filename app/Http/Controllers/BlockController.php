<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Http\Requests\StoreBlockRequest;
use App\Http\Requests\UpdateBlockRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BlockController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(Block::all())
                ->addColumn('action', function (Block $block) {
                    return "<a href='" . route('block.edit', $block->id) . "' class='btn btn-outline-info border-0 btn-sm rounded-circle'><i class='fa fa-edit'></i></a>";
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.block.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.block.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlockRequest $request)
    {
        Block::create($request->only('title', 'comments'));
        return redirect()->route('block.index')->with('success', 'Block Registered Successfully..');
    }

    public function edit(Block $block)
    {
        return view('admin.block.edit',compact('block'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlockRequest $request, Block $block)
    {
        $block->update($request->only('title','comments'));
        return redirect()->route('block.index')->with('success','Block Detail\'s Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Block $block)
    {
        //
    }
}
