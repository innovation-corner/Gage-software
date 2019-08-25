<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\GovernmentStaff;

use DB;

class GovernmentStaffsController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
    {
        return view('government_staffs.index', []);
    }

    public function create(Request $request)
    {
        return view('government_staffs.add', [
            []
        ]);
    }

    public function edit(Request $request, $id)
    {
        $government_staff = GovernmentStaff::findOrFail($id);
        return view('government_staffs.add', [
            'model' => $government_staff]);
    }

    public function show(Request $request, $id)
    {
        $government_staff = GovernmentStaff::findOrFail($id);
        return view('government_staffs.show', [
            'model' => $government_staff]);
    }


    public function update(Request $request)
    {
        //
        /*$this->validate($request, [
        'name' => 'required|max:255',
      ]);*/
        $government_staff = null;
        if ($request->id > 0) {
            $government_staff = GovernmentStaff::findOrFail($request->id);
        } else {
            $government_staff = new GovernmentStaff;
        }


        $government_staff->id = $request->id ?: 0;


        $government_staff->name = $request->name;


        $government_staff->created_by = $request->created_by;


        $government_staff->government_id = $request->government_id;


        $government_staff->email = $request->email;


        $government_staff->phone = $request->phone;


        $government_staff->gender = $request->gender;


        $government_staff->created_at = $request->created_at;


        $government_staff->updated_at = $request->updated_at;


        $government_staff->deleted_at = $request->deleted_at;

        //$government_staff->user_id = $request->user()->id;
        $government_staff->save();

        return redirect('/government_staffs');

    }

    public function store(Request $request)
    {
        return $this->update($request);
    }

    public function destroy(Request $request, $id)
    {

        $government_staff = GovernmentStaff::findOrFail($id);

        $government_staff->delete();
        return "OK";

    }


}
