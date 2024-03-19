<?php

namespace App\Http\Controllers;

use App\Models\Medicines;
use App\Models\StockRequestsMaster;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\StockRequest;
use App\Models\Supplier;

class StockRequestController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(StockRequestsMaster::with('approver')->where('initiated_by', Auth::user()->id)->orderBy('id', 'desc'))
                ->addIndexColumn()
                ->addColumn('action', function (StockRequestsMaster $stockRequestsMaster) {
                    $buttons = "<a href='" . route('stocks.show', $stockRequestsMaster->id) . "' class='btn btn-sm small btn-primary'>View</a>";
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

    public function show($id)
    {
        $supplier_id = StockRequestsMaster::with('supplier')->where('id', $id)->first(['supplier_ID']);
        return view('admin.stocks.show', [
            'supplier' => Supplier::find($supplier_id),
            'notes' => StockRequestsMaster::find($id)->notes,
            'medicines' => StockRequest::with('medicine')->where('stock_requests_master_id', $id)->where('initiated_by', Auth::user()->id)->get()
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
                ->addColumn('action', function (StockRequestsMaster $stockRequestsMaster) {
                    return '<a class="btn btn-sm btn-primary" href="' . route('stocks.process_unapproved', ['id' => $stockRequestsMaster->id]) . '"><i class="md md-done"></i></a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.stocks.show_unapproved');
    }

    public function process_unapproved($stock_request_master_id)
    {
        if (!StockRequestsMaster::where('id', $stock_request_master_id)->where('is_approved', 0)) {
            return "This Request Is Already Approved";
        }

        return view('admin.stocks.edit', [
            'suppliers' => Supplier::pluck('name', 'id'),
            'stock_master' => $stock_request_master_id,
            'data' => StockRequest::with('medicine')->where('stock_requests_master_id', $stock_request_master_id)->get()
        ]);
    }

    public function approve_medicine(Request $request)
    {
        $stock_request_data = StockRequest::find($request->request_id);
        if ($request->approving_quantity > $stock_request_data->quantity) {
            return 0;
        } else {
            $stock_request_data->update(['approved_quantity' => $request->approving_quantity]);
            return 1;
        }
    }

    public function approve_request(Request $request)
    {
        StockRequestsMaster::where('id', $request->id)->update(['approved_by' => Auth::user()->id, 'is_approved' => 1, 'supplier_id' => $request->supplier, 'notes' => $request->notes]);
        return redirect()->route('stocks.show_unapproved')->with('success', 'Stock Request Processed Successfully..');
    }
}
