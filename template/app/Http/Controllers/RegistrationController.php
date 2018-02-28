<?php

namespace App\Http\Controllers;

// use Mail; 

// use App\User;

// use App\Mail\Welcome;

use App\Http\Requests\RegistrationForm;

class RegistrationController extends Controller
{
    public function create()
    {
    	return view('registration.create');
    }

    public function store(RegistrationForm $form)
    {
    	// Validate the form

    	// $this->validate
     //    (
     //        request(),
     //        [
     //    		'name' => 'required',
     //    		'email' => 'required|email',
     //    		'password' => 'required|confirmed'
     //        ]
     //    );

    	// Create and save the user

    	// $user = User::create(request(['name', 'email', 'password']));

        // $user = User::create(
        //     [ 
        //         'name' => request('name'),
        //         'email' => request('email'),
        //         'password' => bcrypt(request('password'))
        //     ]
        // );

    	// Sign them in

    	// auth()->login($user);

        // Mail::to($user)->send(new Welcome($user));

        $form->persist();

        //Redirect to home page

        flash('Thank you for signing up!')->success();

        return redirect()->home();
    }
}
