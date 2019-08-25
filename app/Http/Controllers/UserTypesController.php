<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UserType;

use DB;

class UserTypesController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
    {
        return view('user_types.index', []);
    }

    public function create(Request $request)
    {
        return view('user_types.add', [
            []
        ]);
    }

    public function edit(Request $request, $id)
    {
        $user_type = UserType::findOrFail($id);
        return view('user_types.add', [
            'model' => $user_type]);
    }

    public function show(Request $request, $id)
    {
        $user_type = UserType::findOrFail($id);
        return view('user_types.show', [
            'model' => $user_type]);
    }


    public function update(Request $request)
    {
        //
        /*$this->validate($request, [
        'name' => 'required|max:255',
      ]);*/
        $user_type = null;
        if ($request->id > 0) {
            $user_type = UserType::findOrFail($request->id);
        } else {
            $user_type = new UserType;
        }


        $user_type->id = $request->id ?: 0;


        $user_type->name = $request->name;

        //$user_type->user_id = $request->user()->id;
        $user_type->save();

        return redirect('/user_types');

    }

    public function store(Request $request)
    {
        return $this->update($request);
    }

    public function destroy(Request $request, $id)
    {

        $user_type = UserType::findOrFail($id);

        $user_type->delete();
        return "OK";

    }


}
