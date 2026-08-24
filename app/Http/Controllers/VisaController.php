<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Client;
use App\Models\User;
use App\Models\Visa;
use Illuminate\Http\Request;
use DataTables;
class VisaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $visas = Visa::get()->all();
            return DataTables::of($visas)
                ->addIndexColumn()
                ->addColumn('client_id', function($row){
                    return $row->client->name;
                })
                ->addColumn('sales_by', function($row){
                    return $row->salesBy->name;
                })
                ->addColumn('agent_id', function($row){
                    return $row->agent->name;
                })
                ->addColumn('action-btn', function($row){
                    return $row->id;
                })
                ->rawColumns(['action-btn'])
                ->make(true);
        }
        return view('admin.visas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::get()->all();
        $users = User::get()->all();
        $agents = Agent::get()->all();
        return view('admin.visas.create', [
            'clients' => $clients,
            'users' => $users,
            'agents' => $agents,
        
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'client_id' => 'required',
            'sales_by' => 'required',
            'invoice_no' => 'required',
            'sale_date' => 'required',
            'due_date' => 'required',
            'agent_id' => 'required',
            'passport_no' => 'required',
        ],[
            'client_id.required' => 'Please select a client',
            'sales_by.required' => 'Please select a user',
            'invoice_no.required' => 'Please enter invoice number',
            'sale_date.required' => 'Please select sale date',
            'due_date.required' => 'Please select due date',
            'agent_id.required' => 'Please select an agent',
            'passport_no.required' => 'Please enter passport number',
        ]);

        $data = $request->all();
        Visa::create($data);

        return redirect()->route('visa')->with('success', 'Visa created successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $visa = Visa::findOrFail($id);
        $clients = Client::get()->all();
        $users = User::get()->all();
        $agents = Agent::get()->all();
        return view('admin.visas.edit', [
            'visa' => $visa,
            'clients' => $clients,
            'users' => $users,
            'agents' => $agents,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'client_id' => 'required',
            'sales_by' => 'required',
            'invoice_no' => 'required',
            'sale_date' => 'required',
            'due_date' => 'required',
            'agent_id' => 'required',
            'passport_no' => 'required',
        ],[
            'client_id.required' => 'Please select a client',
            'sales_by.required' => 'Please select a user',
            'invoice_no.required' => 'Please enter invoice number',
            'sale_date.required' => 'Please select sale date',
            'due_date.required' => 'Please select due date',
            'agent_id.required' => 'Please select an agent',
            'passport_no.required' => 'Please enter passport number',
        ]);

        $data = $request->all();
        $visa = Visa::findOrFail($id);
        $visa->update($data);

        return redirect()->route('visa')->with('success', 'Visa updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $visa = Visa::findOrFail($id);
        $visa->delete();
        return redirect()->route('visa')->with('success', 'Visa deleted successfully');
    }
}
