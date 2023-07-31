<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search=request()->search ??"";

        $users=User::where('name','like',"%$search%")->paginate(5)->withQueryString();
        return view('user.index',compact('users'));

        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes=$request->validate([
            'name'=>"required|max:255",
            'email'=>'required|min:3|max:255|unique:users,email',
            'password'=>'required|min:7|max:255'
        ]);
        User::create($attributes);
        return redirect()->route('user.index')->with('success','User has been  created');

        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,User $user)
    {
        $attributes=$request->validate([
            'name'=>"required|max:255",
            'email'=>'required',
            'password'=>'required|min:7|max:255'

        ]);
        $user->fill($attributes)->save();
       return redirect()->route('user.index')->with('success','Data has been updated');

        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        return redirect()->route('user.index')->with('success','Data has been delete');
    }
}
