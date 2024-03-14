<?php

namespace App\Http\Controllers;

use App\Models\Medicines;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\StockRequest;

class StockRequestController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            
        }

        return view('admin.stocks.index');
    }

    public function create()
    {
        return view('admin.stocks.create',[
            'medicines' => Medicines::pluck('name','id')
        ]);   
    }

    public function store(Request $request)
    {
    }
}
