<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Notifications\InboxMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\ContactFormRequest;
use App\Contact;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function store(Request $request)
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('site.pages.contact');
    }
    public function contactSaveData(Request $request)
    {
        $this->validate($request, [
            'name' => 'required', 
            'email' => 'required|email',
            'message' => 'required'
        ]);
        Contact::create($request->all());
        \Mail::send('site.pages.contactus', 
            array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'user_message' => $request->get('message')
            ), function($message) use ($request)
            {
                $message->from($request->get('email'));
                $message->to('sikilteam@gmail.com', 'Admin Keren');
            });
        return redirect()->back()->with('success', 'thanks for the message! we will get back to you soon \(^-^)/');
    }
    
    public function mailToAdmin(ContactFormRequest $message, Contact $contact)
    {
        //send admin an notication
        $contact->notify(new InboxMessage($message));
        //redirect user back
        
        return back()->with('success', 'Thanks for contacting us :)');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}