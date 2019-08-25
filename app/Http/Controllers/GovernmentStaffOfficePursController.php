<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\GovernmentStaffOfficePur;

use DB;

class GovernmentStaffOfficePursController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
    {
        return view('government_staff_office_purs.index', []);
    }

    public function create(Request $request)
    {
        return view('government_staff_office_purs.add', [
            []
        ]);
    }

    public function edit(Request $request, $id)
    {
        $government_staff_office_pur = GovernmentStaffOfficePur::findOrFail($id);
        return view('government_staff_office_purs.add', [
            'model' => $government_staff_office_pur]);
    }

    public function show(Request $request, $id)
    {
        $government_staff_office_pur = GovernmentStaffOfficePur::findOrFail($id);
        return view('government_staff_office_purs.show', [
            'model' => $government_staff_office_pur]);
    }


    public function update(Request $request)
    {
        //
        /*$this->validate($request, [
        'name' => 'required|max:255',
      ]);*/
        $government_staff_office_pur = null;
        if ($request->id > 0) {
            $government_staff_office_pur = GovernmentStaffOfficePur::findOrFail($request->id);
        } else {
            $government_staff_office_pur = new GovernmentStaffOfficePur;
        }


        $government_staff_office_pur->id = $request->id ?: 0;


        $government_staff_office_pur->pur_user_id = $request->pur_user_id;


        $government_staff_office_pur->rating_id = $request->rating_id;


        $government_staff_office_pur->remark = $request->remark;


        $government_staff_office_pur->government_staff_office_id = $request->government_staff_office_id;


        $government_staff_office_pur->created_at = $request->created_at;


        $government_staff_office_pur->updated_at = $request->updated_at;


        $government_staff_office_pur->deleted_at = $request->deleted_at;

        //$government_staff_office_pur->user_id = $request->user()->id;
        $government_staff_office_pur->save();

        return redirect('/government_staff_office_purs');

    }

    public function store(Request $request)
    {
        return $this->update($request);
    }

    public function destroy(Request $request, $id)
    {

        $government_staff_office_pur = GovernmentStaffOfficePur::findOrFail($id);

        $government_staff_office_pur->delete();
        return "OK";

    }


}
