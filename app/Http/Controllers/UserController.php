<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{

    /**
    * Stores a new user
    *
    * @return Response
    */
    public function store(Request $request) {
        try{

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->country = $request->country;
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect(route('login'))
                ->with('success', 'User created successfully.');

        } catch(\Exception $exception){
            return redirect(route('register'))
                ->with('exception', 'Your registration could not be completed.');
        }
    }

    /**
    * Login the user
    *
    * @param  Request  $request
    * @return Response
    */
    public function login(Request $request) {
        try{

            $user = User::where('email', '=', $request->email)->first();

            if(Hash::check($request->password, $user->password)) {

                $this->setUserSession($user);

                return redirect(route('home'))
                    ->with('success', 'Login succefully.');
            } else {
                return redirect(route('login'))
                    ->with('warning', 'Password is incorrect.');
            }

        } catch(\Exception $exception){
            return redirect(route('login'))
                ->with('exception', 'An error occurred while trying to login.');
        }
    }

    /**
    * Logout the user
    *
    * @return Response
    */
    public function logout() {
        try{

            $this->forgetUser();

            return redirect(route('home'))
                ->with('success', 'Logout succefully.');

        } catch(\Exception $exception){
            return redirect(route('login'))
                ->with('exception', 'An error occurred while trying to logout.');
        }
    }

    /**
    * Set the user in session.
    *
    * @param  User  $user
    * @return void
    */
    public function setUserSession(User $user) {
        \Session::put([
            'inSession' => true,
            'email' => $user->email,
            'name' => $user->name,
            'id' => $user->id
        ]);
    }

    /**
    * Remove the specified user from session.
    *
    * @return void
    */
    public function forgetUser() {
        \Session::forget('inSession');
        \Session::forget('email');
        \Session::forget('name');
    }
}
