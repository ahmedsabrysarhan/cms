<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use App\User;
class UsersController extends Controller
{
    
    public function index()
    {
        return view('users.index')->with('users' , User::all());
    }

    // Make Admin 
    public function makeAdmin(User $user){
        $user->role = "admin";
        $user->save();
        return redirect(route('users.index')); 
    }
    
    // Remove Admin 
    public function removeAdmin(User $user){
        $user->role = "writer";
        $user->save();
        return redirect(route('users.index'));
    }

    // Edit Profile 
    public function editProfile(User $user){
        $profile = $user->profile;
        return view('users.editProfile', ['user' => $user , 'profile'=> $profile]);
    }

    // Update Profile 
    public function updateProfile(Request $request, User $user){
        $profile = $user->profile;
        $data = $request->all();
        if($request->hasFile('picture')){
            $picture = $request->picture->store('profilesImages' , 'public');
        }
        $data['picture'] = $picture;
        $profile->update($data);
        return redirect(route('home'));
    }
}
