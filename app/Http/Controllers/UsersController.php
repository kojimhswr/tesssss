<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function editProfile() {
        return view('site\pages\account\profile')->with('user', auth()->user());
    }

    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'name_first'=> 'required|string|max:255,'.auth()->id(),
            'name_last' => 'required|string|max:255,'.auth()->id(),
            'password' => 'sometimes|nullable|string|min:8|confirmed'
        ]);

        $user=\App\Models\User::findOrFail($id);

        $input = $request->except('password','confirmation_password');

        if(! $request->filled('password')) {
            $user->first_name = $request->name_first;
            $user->last_name = $request->name_last;
            $user->save();
            return redirect()->route('profile.edit')->with('status','Success Update You Profile');
        }else{

        $user->password = bcrypt($request->password);
        $user->fill($input)->save();
        $user->first_name = $request->name_first;
        $user->last_name = $request->name_last;
        $user->save();
        return redirect()->route('profile.edit')->with('status','Success Update Your Profile and Password');
        }
    }
}
