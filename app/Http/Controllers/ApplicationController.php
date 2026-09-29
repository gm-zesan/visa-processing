<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\ApplicationDocument;
use App\Models\CountryDetails;
use App\Models\VisaType;
use App\Enums\ApplicationStatus;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;
use DataTables;

class ApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:application-list|application-view|application-edit|application-delete', ['only' => ['index', 'adminCreate', 'adminStore']]);
        $this->middleware('permission:application-view', ['only' => ['show']]);
        $this->middleware('permission:application-edit', ['only' => ['updateStatus']]);
        $this->middleware('permission:application-delete', ['only' => ['delete']]);
    }

    /**
     * Show admin back-office create application form (Walk-in Candidate)
     */
    public function adminCreate()
    {
        $countries = CountryDetails::with('country')->get();
        $visaTypes = VisaType::all();

        return view('admin.application.create', [
            'countries' => $countries,
            'visaTypes' => $visaTypes,
        ]);
    }

    /**
     * Store manual walk-in application from back office
     */
    public function adminStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'passport_number' => 'required|string|max:50',
            'phone' => 'required|string|max:30',
            'email' => 'nullable|email|max:100',
            'destination_country' => 'nullable|string|max:100',
        ], [
            'name.required' => 'Candidate Full Name (as per Passport) is required.',
            'passport_number.required' => 'Candidate Passport Number is required.',
            'phone.required' => 'Candidate Contact / WhatsApp number is mandatory.',
        ]);

        $passport = strtoupper(trim($request->passport_number));

        $application = Application::create([
            'name' => trim($request->name),
            'passport_number' => $passport,
            'phone' => $request->phone ? trim($request->phone) : null,
            'email' => $request->email ? trim($request->email) : null,
            'destination_country' => $request->destination_country ? trim($request->destination_country) : null,
            'status' => ApplicationStatus::PENDING,
        ]);

        return redirect()->route('applications.index')->with('success', 'Walk-in candidate application registered successfully!');
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
            $trackedApplication = Application::with('documents')->where('passport_number', $cleanPassport)->first();
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
        $application = Application::with('documents')->where('passport_number', $passport)->first();

        if ($request->ajax() || $request->wantsJson()) {
            if ($application) {
                $html = view('frontend.partials.tracking_result', compact('application'))->render();
                return response()->json(['success' => true, 'html' => $html]);
            }
            return response()->json([
                'success' => false, 
                'message' => 'No application record found for Passport Number: "' . $passport . '". Please verify your passport number.'
            ]);
        }

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
            'phone' => 'required|string|max:30',
            'email' => 'nullable|email|max:100',
            'destination_country' => 'nullable|string|max:100',
        ], [
            'name.required' => 'Full Name (as in Passport) is required.',
            'passport_number.required' => 'Valid Passport Number is required.',
            'phone.required' => 'Phone / WhatsApp number is required for visa application updates.',
        ]);

        $application = Application::create([
            'name' => trim($request->name),
            'passport_number' => strtoupper(trim($request->passport_number)),
            'phone' => $request->phone ? trim($request->phone) : null,
            'email' => $request->email ? trim($request->email) : null,
            'destination_country' => $request->destination_country ? trim($request->destination_country) : null,
            'status' => ApplicationStatus::PENDING->value,
        ]);

        return redirect()->route('apply', ['passport' => $application->passport_number])->with([
            'success' => 'Your application has been registered successfully!',
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
            'status' => ['required', new Enum(ApplicationStatus::class)],
            'name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:30',
            'email' => 'nullable|email|max:100',
            'destination_country' => 'nullable|string|max:100',
        ]);

        $application = Application::findOrFail($id);
        $application->status = $request->status;
        if ($request->has('name')) $application->name = $request->name;
        if ($request->has('phone')) $application->phone = $request->phone;
        if ($request->has('email')) $application->email = $request->email;
        if ($request->has('destination_country')) $application->destination_country = $request->destination_country;
        
        $application->save();

        $statusLabel = $application->status instanceof ApplicationStatus ? $application->status->shortLabel() : strtoupper($application->status);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Status for candidate ' . $application->name . ' updated to ' . $statusLabel,
                'data' => $application,
            ]);
        }

        return redirect()->back()->with('success', 'Application status updated successfully.');
    }

    /**
     * Admin delete application
     */
    public function edit($id) { 
        $application = Application::findOrFail($id); 
        $countries = CountryDetails::with('country')->get(); 
        return view('admin.application.edit', compact('application', 'countries')); 
    } 

    public function update(Request $request, $id) { 
        $request->validate(['name'=>'required', 'passport_number'=>'required', 'phone'=>'required']); 
        $application = Application::findOrFail($id); 
        $application->update($request->only('name','passport_number','phone','email','destination_country','status')); 
        return redirect()->back()->with('success', 'Application updated successfully'); 
    } 

    public function documents($id) {
        $application = Application::with('documents')->findOrFail($id);
        return view('admin.application.documents', compact('application'));
    }

    public function uploadDocuments(Request $request, $id) { 
        $request->validate([
            'documents' => 'required|array',
            'documents.*.title' => 'required|string|max:255',
            'documents.*.file' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120'
        ]); 
        
        $application = Application::findOrFail($id); 
        
        foreach ($request->documents as $doc) {
            $file = $doc['file']; 
            $filename = time() . '_' . uniqid() . '_' . $file->getClientOriginalName(); 
            $file->move(public_path('upload/documents'), $filename); 
            
            ApplicationDocument::create([
                'application_id' => $id, 
                'document_title' => $doc['title'], 
                'file_path' => 'upload/documents/' . $filename
            ]); 
        }

        if ($application->status === ApplicationStatus::PENDING) {
            $application->status = ApplicationStatus::PROCESSING;
            $application->save();
        }

        return redirect()->back()->with('success', 'Documents uploaded successfully'); 
    } 

    public function deleteDocument($id) { 
        $doc = ApplicationDocument::findOrFail($id); 
        if(file_exists(public_path($doc->file_path))) { 
            unlink(public_path($doc->file_path)); 
        } 
        $doc->delete(); 
        return redirect()->back()->with('success', 'Document deleted successfully'); 
    } 

    public function delete($id)
    {
        Application::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Application deleted successfully.');
    }

    public function viewDocument($id) {
        $doc = ApplicationDocument::findOrFail($id);
        $path = public_path($doc->file_path);
        if (!file_exists($path)) {
            abort(404);
        }
        
        $mime = mime_content_type($path);
        
        // Force correct mime types for common files
        $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
        if ($ext === 'pdf') {
            $mime = 'application/pdf';
        }
        
        $filename = preg_replace('/[^A-Za-z0-9_\-]/', '_', $doc->document_title) . '.' . $ext;
        
        return response()->make(file_get_contents($path), 200, [
            'Content-Type' => $mime,
            'Content-Disposition' => 'inline; filename="' . $filename . '"'
        ]);
    }
}
