<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\CountryDetails;
use App\Models\VisaType;
use Illuminate\Http\Request;
use DataTables;

class ApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:application-list|application-view|application-edit|application-delete', ['only' => ['index']]);
        $this->middleware('permission:application-view', ['only' => ['show']]);
        $this->middleware('permission:application-edit', ['only' => ['updateStatus']]);
        $this->middleware('permission:application-delete', ['only' => ['delete']]);
    }

    /**
     * Show frontend application & tracking page
     */
    public function create(Request $request)
    {
        $countries = CountryDetails::with('country')->get();
        $visaTypes = VisaType::all();
        
        $trackedApplication = null;
        $searchPassport = $request->query('passport');

        if ($searchPassport) {
            $cleanPassport = strtoupper(trim($searchPassport));
            $trackedApplication = Application::where('passport_number', $cleanPassport)
                ->orWhere('tracking_no', $cleanPassport)
                ->latest()
                ->first();
        }

        return view('frontend.apply', [
            'countries' => $countries,
            'visaTypes' => $visaTypes,
            'trackedApplication' => $trackedApplication,
            'searchPassport' => $searchPassport,
        ]);
    }

    /**
     * Handle candidate passport status search
     */
    public function track(Request $request)
    {
        $request->validate([
            'passport_number' => 'required|string|max:50',
        ], [
            'passport_number.required' => 'Please enter a valid Passport Number or Tracking ID to check status.',
        ]);

        $passport = strtoupper(trim($request->passport_number));
        $application = Application::where('passport_number', $passport)
            ->orWhere('tracking_no', $passport)
            ->latest()
            ->first();

        if ($application) {
            return redirect()->route('apply', ['passport' => $passport])
                ->with('status_check_success', 'Application file found. View your current recruitment and visa status below.');
        }

        return redirect()->route('apply', ['passport' => $passport])
            ->with('status_check_error', 'No application record found for Passport Number: "' . $passport . '". Please verify your passport number or submit a new application.');
    }

    /**
     * Store new candidate passport application
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'passport_number' => 'required|string|max:50',
            'phone' => 'nullable|string|max:30',
            'email' => 'nullable|email|max:100',
            'destination_country' => 'nullable|string|max:100',
            'notes' => 'nullable|string|max:1000',
        ], [
            'name.required' => 'Full Name (as in Passport) is required.',
            'passport_number.required' => 'Valid Passport Number is required.',
        ]);

        $application = Application::create([
            'name' => trim($request->name),
            'passport_number' => strtoupper(trim($request->passport_number)),
            'phone' => $request->phone ? trim($request->phone) : null,
            'email' => $request->email ? trim($request->email) : null,
            'destination_country' => $request->destination_country ? trim($request->destination_country) : null,
            'notes' => $request->notes ? trim($request->notes) : null,
            'status' => 'pending',
        ]);

        return redirect()->route('apply', ['passport' => $application->passport_number])->with([
            'success' => 'Your application has been registered successfully! Your tracking file is generated below.',
            'tracking_no' => $application->tracking_no,
            'applicant_name' => $application->name,
            'passport_number' => $application->passport_number,
        ]);
    }

    /**
     * Admin Dashboard list
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $applications = Application::latest()->get();
            return DataTables::of($applications)
                ->addIndexColumn()
                ->addColumn('action-btn', function ($row) {
                    return $row->id;
                })
                ->rawColumns(['action-btn'])
                ->make(true);
        }
        return view('admin.application.index');
    }

    /**
     * Admin view single application details (JSON for modal)
     */
    public function show($id)
    {
        $application = Application::findOrFail($id);
        return response()->json([
            'success' => true,
            'data' => $application,
        ]);
    }

    /**
     * Admin update application status and remarks
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,verified,in_progress,approved,rejected',
            'admin_remarks' => 'nullable|string|max:2000',
        ]);

        $application = Application::findOrFail($id);
        $application->status = $request->status;
        if ($request->has('admin_remarks')) {
            $application->admin_remarks = $request->admin_remarks;
        }
        $application->save();

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Status for candidate ' . $application->name . ' updated to ' . strtoupper(str_replace('_', ' ', $application->status)),
                'data' => $application,
            ]);
        }

        return redirect()->back()->with('success', 'Application status updated successfully.');
    }

    /**
     * Admin delete application
     */
    public function delete($id)
    {
        Application::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Application deleted successfully.');
    }
}
