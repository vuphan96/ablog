<?php

namespace App\Http\Controllers\Ablog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\Ablog\AblogContactRequest;

class AblogContactController extends Controller
{
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }
    public function contact(){
        return view('Ablog.contact.contact');
    }
    public function postcontact(AblogContactRequest $request){
        $name = $request->name;
        $email = $request->email;
        $topic = $request->topic;
        $description = $request->description;

        $arrContact = array(
            'fullname' => $name,
            'email' => $email,
            'subject'=> $topic,
            'description'=> $description
        );
        // dd($arrContact);
        $result = $this->contact->getAdd($arrContact);
        if ($result == true) {
            return redirect()->Route('Ablog.contact.contact')->with('msg','Gửi liên hệ thành công');
        }
    }
}
