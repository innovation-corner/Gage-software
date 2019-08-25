<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use DB;

class UsersController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
    {
        return view('users.index', []);
    }

    public function create(Request $request)
    {
        return view('users.add', [
            []
        ]);
    }

    public function edit(Request $request, $id)
    {
        $user = User::findOrFail($id);
        return view('users.add', [
            'model' => $user]);
    }

    public function show(Request $request, $id)
    {
        $user = User::findOrFail($id);
        return view('users.show', [
            'model' => $user]);
    }

    public function update(Request $request)
    {
        //
        /*$this->validate($request, [
        'name' => 'required|max:255',
      ]);*/
        $user = null;
        if ($request->id > 0) {
            $user = User::findOrFail($request->id);
        } else {
            $user = new User;
        }


        $user->id = $request->id ?: 0;


        $user->name = $request->name;


        $user->email = $request->email;


        $user->user_type_id = $request->user_type_id;


        $user->email_verified_at = $request->email_verified_at;


        $user->password = $request->password;


        $user->remember_token = $request->remember_token;


        $user->created_at = $request->created_at;


        $user->updated_at = $request->updated_at;

        //$user->user_id = $request->user()->id;
        $user->save();

        return redirect('/users');

    }

    public function store(Request $request)
    {
        return $this->update($request);
    }

    public function destroy(Request $request, $id)
    {

        $user = User::findOrFail($id);

        $user->delete();
        return "OK";

    }


}
