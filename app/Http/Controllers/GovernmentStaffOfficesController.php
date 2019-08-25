<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\GovernmentStaffOffice;

use DB;

class GovernmentStaffOfficesController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
    {
        return view('government_staff_offices.index', []);
    }

    public function create(Request $request)
    {
        return view('government_staff_offices.add', [
            []
        ]);
    }

    public function edit(Request $request, $id)
    {
        $government_staff_office = GovernmentStaffOffice::findOrFail($id);
        return view('government_staff_offices.add', [
            'model' => $government_staff_office]);
    }

    public function show(Request $request, $id)
    {
        $government_staff_office = GovernmentStaffOffice::findOrFail($id);
        return view('government_staff_offices.show', [
            'model' => $government_staff_office]);
    }

    public function update(Request $request)
    {
        //
        /*$this->validate($request, [
        'name' => 'required|max:255',
      ]);*/
        $government_staff_office = null;
        if ($request->id > 0) {
            $government_staff_office = GovernmentStaffOffice::findOrFail($request->id);
        } else {
            $government_staff_office = new GovernmentStaffOffice;
        }


        $government_staff_office->id = $request->id ?: 0;


        $government_staff_office->government_staff_id = $request->government_staff_id;


        $government_staff_office->government_position_id = $request->government_position_id;


        $government_staff_office->year = $request->year;


        $government_staff_office->created_by = $request->created_by;


        $government_staff_office->created_at = $request->created_at;


        $government_staff_office->updated_at = $request->updated_at;


        $government_staff_office->deleted_at = $request->deleted_at;

        //$government_staff_office->user_id = $request->user()->id;
        $government_staff_office->save();

        return redirect('/government_staff_offices');

    }

    public function store(Request $request)
    {
        return $this->update($request);
    }

    public function destroy(Request $request, $id)
    {

        $government_staff_office = GovernmentStaffOffice::findOrFail($id);

        $government_staff_office->delete();
        return "OK";

    }


}
