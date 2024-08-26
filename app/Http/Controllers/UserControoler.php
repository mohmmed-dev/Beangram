<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserProfieRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserControoler extends Controller
{

    public function index(User $user) {
    return view("user.profile",compact('user'));
    }

    public function edit(User $user) {
    return view("user.edit",compact('user'));
    }
    
    public function update(UpdateUserProfieRequest $request ,User $user) {
    $data = $request->safe()->collect();
    if($data['password'] = '') {
        unset($data['password']);
    } else {
        $data['password'] = Hash::make($data['password']);
    }
    if($data->has("image")) {
        $path = $request->file('image')->store('users','public');
        $data['image'] = '/'.$path;
    }
    if($data->has("lang")) {
        $path = $request->file('image')->store('users','public');
        $data['image'] = '/'.$path;
    }
    $data['lang'] = $request->lang;
    $data['privavte_account'] = $request->has("privavte_account");
    $user->update($data->toArray());
    session()->flash("success",__("your Profile has been update?"));
    return redirect("/". $user->username);
    }

    public function follow(User $user) {
        auth()->user()->follow($user);
        return back();
    }
    public function unfollow(User $user) {
        auth()->user()->unfollow($user);
        return back();
    }
}
