<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Mail\ReplyContactMail;
use App\Models\ContactForm;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Mail;
class ContactFormController extends Controller
{

    
    function __construct()
    {
        $this->middleware('permission:contact-list|contact-delete', ['only' => ['index']]);
        $this->middleware('permission:contact-delete', ['only' => ['delete']]);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $contactForms = ContactForm::query()->latest('id');
            return DataTables::of($contactForms)
                ->addIndexColumn()
                ->addColumn('action-btn', function ($row) {
                    return $row->id;
                })
                ->rawColumns(['action-btn'])
                ->make(true);
        }
        return view('admin.contact-messages.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'nullable|string|max:50',
            'subject' => 'nullable|string|max:150',
            'message' => 'required|string|max:2000',
        ], [
            'name.required' => 'Please enter your name.',
            'name.max' => 'Your name should be less than 100 characters.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'message.required' => 'Please enter your message.',
            'message.max' => 'Your message should be less than 2000 characters.',
        ]);

        ContactForm::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'subject' => $validated['subject'] ?? null,
            'message' => $validated['message'],
        ]);

        return redirect()->back()->with('success', 'Your message has been sent successfully. We will get back to you soon!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $contactForm = ContactForm::find($id);
        if ($contactForm) {
            $contactForm->delete();
            return redirect()->back()->with('success', 'Message deleted successfully');
        }
        return redirect()->back()->with('error', 'Message not found');
    }

}
