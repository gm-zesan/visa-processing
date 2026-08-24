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
         $this->middleware('permission:contact-list|contact-delete', ['only' => ['index','store']]);
         $this->middleware('permission:contact-delete', ['only' => ['delete']]);
    }


    public function index(Request $request)
    {
        if($request->ajax()){
            $contactForms = ContactForm::get()->all();
            return DataTables::of($contactForms)
                ->addIndexColumn()
                ->addColumn('action-btn', function($row){
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
        $this->validate($request, [
            'name' => 'required|max:100',
            'email' => 'required|max:100',
            'message' => 'required|max:100',
        ], [
            'name.max' => 'your name should be less than 100 characters',
            'email.max' => 'your phone should be less than 100 characters',
            'message.max' => 'your message should be less than 100 characters',
        ]);

        // $mailData = [
        //     'name' => $request->name,
        //     'phone' => $request->phone,
        //     'content' => $request->message,
        // ];
        // $replymailData = [
        //     'name' => $request->name,
        //     'content' => 'Thank you for contacting us. We will get back to you soon.'
        // ];

        $data = $request->all();
        ContactForm::create($data);

        // Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactMail($mailData));
        // Mail::to('gmzesan7767@gmail.com')->send(new ReplyContactMail($replymailData));

        return redirect()->back()->with('success','Message sent successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $contactForm = ContactForm::find($id);
        $contactForm->delete();
        return redirect()->back()->with('success','Message deleted successfully');
    }

}
