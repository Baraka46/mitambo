<?php

namespace App\Http\Controllers;

use App\Models\CustomerPackageDetail;
use App\Models\Godown_package;
use Illuminate\Http\Request;

class CustomerPackageDetailController extends Controller
{
    // 
    public function index(){
        $details=CustomerPackageDetail::all();
        return view('officer.index', compact('details'));
    }
    public function search(){
        $godownPackages=Godown_package::all();
        return view('officer.search', compact('godownPackages'));
    }

    public function ajaxSearch(Request $request)
    {
        $query = Godown_package::query();
    
        if ($request->filled('tracking_id')) {
            $query->where('tracking_id', 'like', '%' . $request->tracking_id . '%');
        }
    
        if ($request->filled('godown')) {
            $query->where('godown', 'like', '%' . $request->godown . '%');
        }

        if ($request->filled('row')) {
            $query->where('row', 'like', '%' . $request->row . '%');
        }

        if ($request->filled('tracking_id')) {
            $query->where('tracking_id', 'like', '%' . $request->tracking_id . '%');
        }
    
        $godownPackages = $query->get();
    
        return response()->json($godownPackages);
    }


    public function create()
    {
        return view('officer.create');
    }

    public function show(CustomerPackageDetail $package)
    {
        return view('officer.show', compact('package'));
    }

    public function store(Request $request){
       // Validate the request
       $validated = $request->validate([
        'customer_name' => 'required|string|max:255',
        'shipping_number' => 'required|string|max:255',
        's' => 'string|max:255',
        'm' => 'string|max:255',
        'contact' => 'required|string|max:255',
    ]);

    // Create and save the order
    CustomerPackageDetail::create($validated);

    // Redirect to index with a success message
    return redirect()->route('officer.index')->with('success', 'Added successfully.');
    }


    public function edit(CustomerPackageDetail $package)
    {
        return view('officer.edit', compact('package'));
    }

    public function update(Request $request, CustomerPackageDetail $package)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'shipping_number' => 'required|string|max:255',
            's' => 'required|string|max:255',
            'm' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
        ]);

        $package->update($request->all());
        return redirect()->route('officer.index')->with('success', 'Package updated successfully.');
    }

    public function destroy(CustomerPackageDetail $package)
    {
        $package->delete();
        return redirect()->route('officer.index')->with('success', 'Package deleted successfully.');
    }

}
