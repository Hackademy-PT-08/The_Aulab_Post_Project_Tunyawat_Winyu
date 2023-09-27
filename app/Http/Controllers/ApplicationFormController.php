<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\RequestRoleMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class ApplicationFormController extends Controller
{
    public function rolesRequest(Request $request){

        $user = Auth::user();
        $role = $request->input('roles');
        $email = $request->input('email');
        $presentation = $request->input('presentation');
        $requestMail = new RequestRoleMail(compact('role', 'email', 'presentation'));
        Mail::to('wtunyawat@gmail.com')->send($requestMail);

        switch($role){
            case 'admin';

                $user->is_admin = NULL;
                break;

            case 'revisor';

                $user->is_revisor = NULL;
                break;

            case 'writer';

                $user->is_writer = NULL;
                break;
        }

        $user->update();

        Alert::success('Application sent', 'Thank you for sending your application');

        return redirect()->route('homepage');
    }
}
