<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Role;

use DB;

class RolesController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
    {
        return view('roles.index', []);
    }

    public function create(Request $request)
    {
        return view('roles.add', [
            []
        ]);
    }

    public function edit(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        return view('roles.add', [
            'model' => $role]);
    }

    public function show(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        return view('roles.show', [
            'model' => $role]);
    }

    public function update(Request $request)
    {
        //
        /*$this->validate($request, [
        'name' => 'required|max:255',
      ]);*/
        $role = null;
        if ($request->id > 0) {
            $role = Role::findOrFail($request->id);
        } else {
            $role = new Role;
        }


        $role->id = $request->id ?: 0;


        $role->name = $request->name;


        $role->display_name = $request->display_name;


        $role->description = $request->description;


        $role->created_at = $request->created_at;


        $role->updated_at = $request->updated_at;

        //$role->user_id = $request->user()->id;
        $role->save();

        return redirect('/roles');

    }

    public function store(Request $request)
    {
        return $this->update($request);
    }

    public function destroy(Request $request, $id)
    {

        $role = Role::findOrFail($id);

        $role->delete();
        return "OK";

    }


}
