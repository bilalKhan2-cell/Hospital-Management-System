<?php

namespace App\Http\Controllers;

use App\Models\Block;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BlockController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(Block::query())
                ->addIndexColumn()
                ->addColumn("action", function (Block $block) {
                    $btn = '<a href="' . route('blocks.edit', $block->id) . '" class="edit btn btn-info btn-sm"><i class="md md-edit"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.blocks.index');
    }

    public function create()
    {
        return view('admin.blocks.create');
    }

    public function store(Request $request)
    {
        $request->validate(Block::$rules,Block::$messages);

        Block::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => 1
        ]);

        return redirect()->route('blocks.index')->with('success', 'Block Registered Successfully..');
    }

    public function edit(Block $block)
    {
        return view('admin.blocks.edit', [
            'block' => $block
        ]);
    }


    public function update(Request $request, Block $block)
    {
        $update_block = Block::where('id', $block->id)
            ->update(['name' => $request->name,
        'description' => $request->description]);

        if($update_block){
            return redirect()->route('blocks.index')->with('success',"Block's Details Updated Successfully..");
        }
    }
}
