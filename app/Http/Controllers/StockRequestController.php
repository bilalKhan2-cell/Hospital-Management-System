<?php

namespace App\Http\Controllers;

use App\Models\Medicines;
use App\Models\StockRequestsMaster;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\StockRequest;

class StockRequestController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(StockRequestsMaster::where('initiated_by', Auth::user()->id)->where('is_approved', 0)->get())
                ->addIndexColumn()
                ->addColumn('action', function () {
                    $buttons = "<a href='" . route('stocks.show') . "' class='btn btn-sm small btn-primary'>View</a>";
                    return $buttons;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.stocks.index');
    }

    public function create()
    {
        return view('admin.stocks.create', [
            'medicines' => Medicines::pluck('name', 'id'),
            'medicines_items' => StockRequest::with('medicine')->where('initiated_by', Auth::user()->id)
                ->where('is_created', 0)
                ->get()
        ]);
    }

    public function show()
    {
        return view('admin.stocks.show', [
            'medicines' => StockRequest::with('medicine')->where('initiated_by', Auth::user()->id)->get()
        ]);
    }

    public function add_item(Request $request)
    {
        $request->validate([
            'quantity' => 'required|numeric'
        ], [
            'quantity.required' => "Please Enter Quantity",
            "quantity.numeric" => "Please Enter Quantity In Numbers"
        ]);

        $stockRequest = new StockRequest();

        $check_existance = $stockRequest->where('initiated_by', Auth::user()->id)
            ->where('medicine_id', $request->medicine_id)
            ->where('is_created', 0)
            ->exists();

        if ($check_existance) {
            return redirect()->back()->with('error', 'Item Already Added');
        }

        $stockRequest->create([
            'quantity' => $request->quantity,
            'medicine_id' => $request->medicine_id,
            'initiated_by' => Auth::user()->id,
            'is_created' => 0
        ]);

        return redirect()->back()->with('success', 'Item Added Successfully..');
    }

    public function delete_item(Request $request)
    {
        $stockRequest = new StockRequest();
        $stockRequest->find($request->id)->delete();

        return redirect()->back()->with('error', 'Selected Item Deleted Successfully..');
    }

    public function store()
    {
        $stock_request_master = new StockRequestsMaster();

        $stock_request = $stock_request_master->create([
            'initiated_by' => Auth::user()->id,
            'is_approved' => 0
        ]);

        StockRequest::where('is_created', 0)->where('initiated_by', Auth::user()->id)->update([
            'is_created' => 1,
            'stock_requests_master_id' => $stock_request->id
        ]);

        return redirect()->back()->with('success', 'Your Stock Request Have Succesfully Created and Submitted To The Approver..');
    }

    public function show_unapproved(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(StockRequestsMaster::with('initiator')->where('is_approved', 0)->get())
                ->addIndexColumn()
                ->addColumn('action', function () {
                    return 'Click Here';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.stocks.show_unapproved');
    }
}
