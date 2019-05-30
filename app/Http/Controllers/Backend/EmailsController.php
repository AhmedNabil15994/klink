<?php

namespace App\Http\Controllers\Backend;

use App\Models\Backend\Emails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use App\Mail\MailSender;
use App\Models\Backend\LanguageFiles;

class EmailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emails = Emails::all();
        $languages = LanguageFiles::orderBy('is_main', 'DESC')->get();
        return view('backend.adminlte.emails.email', compact('emails', 'languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function testParseContent()
    {
        for ($i=0;$i<2;$i++) {
            // $template = new Emails;
            // $template->content = "Hi {{firstname}}  {{lastname}}";
            $template = Emails::first();
            

            $data = [
            'firstname' => 'John',
            'lastname'  => 'Doe',
            // 'email'=>'ahmed@yahoo.com'
        ];

            $parsed = $template->parse($data);
            
            \Mail::to('ahmed@ahmed.com', 'ahmed')->send(new MailSender($parsed, [0=>['address'=>'ahmed@ahmed.com','name'=>'ahmed']]));
        }
        return $parsed;
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $rules = [
            'title'=>'required',
            'layout'=>'required',
            'subject'=>'required'
        ];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json([
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }
        // return request()->all();
        // Emails::create(request()->all());
        $languages = LanguageFiles::orderBy('is_main', 'DESC')->pluck('name', 'shortcut')->toArray();
        $subject = $languages;

        foreach ($subject as $shortcut=>$subjectLanguage) {
            $subject[$shortcut] = request()->subject;
        }
        $layout = $languages;
        foreach ($layout as $shortcut=>$layoutLanguage) {
            $layout[$shortcut] = request()->layout;
        }
        $subject = json_encode($subject);
        $layout = json_encode($layout);
        Emails::create([
            'title'=>request()->title,
            'subject'=>$subject,
            'layout'=>$layout
        ]);
        return 1;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Emails  $emails
     * @return \Illuminate\Http\Response
     */
    public function show(Emails $emails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Emails  $emails
     * @return \Illuminate\Http\Response
     */
    public function edit(Emails $emails)
    {
        //
        $rules = [
            'title'=>'required',
            'layout'=>'required',
            'subject'=>'required'
        ];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json([
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }
        if (request()->title!=$emails->title) {
            return Response::json([
                'errors' => ['mainEmail'=>'main email title can\'t be changed']
            ]);
        }
        $emails->update(request()->all());
        return 1;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Emails  $emails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Emails $emails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Emails  $emails
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
        $emails = Emails::where('id', request()->id)->delete();
        return 1;
    }
}
