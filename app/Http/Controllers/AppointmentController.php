<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use DataTables;
class AppointmentController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            $appointments = Appointment::get()->all();
            return DataTables::of($appointments)
                ->addIndexColumn()
                ->addColumn('visa_type', function($row){
                    return $row->visa_type->name;
                })
                ->addColumn('action-btn', function($row){
                    return $row->id;
                })
                ->rawColumns(['action-btn'])
                ->make(true);
        }
        return view('admin.appointment.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'visa_type_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required | numeric',
            'message' => 'required',
        ], [
            'visa_type_id.required' => 'Visa type is required',
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'phone.required' => 'Phone Number is required',
            'phone.numeric' => 'Phone Number must be numeric',
            'message.required' => 'Message is required',
        ]);

        Appointment::create($request->all());
        return redirect()->back()->with('success', 'Appointment request sent successfully');
    }

    public function delete($id)
    {
        Appointment::find($id)->delete();
        return redirect()->back()->with('success', 'Appointment deleted successfully');
    }
}
