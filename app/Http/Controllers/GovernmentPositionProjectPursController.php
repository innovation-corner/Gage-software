<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\GovernmentPositionProjectPur;

use DB;

class GovernmentPositionProjectPursController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
    {
        return view('government_position_project_purs.index', []);
    }

    public function create(Request $request)
    {
        return view('government_position_project_purs.add', [
            []
        ]);
    }

    public function edit(Request $request, $id)
    {
        $government_position_project_pur = GovernmentPositionProjectPur::findOrFail($id);
        return view('government_position_project_purs.add', [
            'model' => $government_position_project_pur]);
    }

    public function show(Request $request, $id)
    {
        $government_position_project_pur = GovernmentPositionProjectPur::findOrFail($id);
        return view('government_position_project_purs.show', [
            'model' => $government_position_project_pur]);
    }


    public function update(Request $request)
    {
        //
        /*$this->validate($request, [
        'name' => 'required|max:255',
      ]);*/
        $government_position_project_pur = null;
        if ($request->id > 0) {
            $government_position_project_pur = GovernmentPositionProjectPur::findOrFail($request->id);
        } else {
            $government_position_project_pur = new GovernmentPositionProjectPur;
        }


        $government_position_project_pur->id = $request->id ?: 0;


        $government_position_project_pur->pur_user_id = $request->pur_user_id;


        $government_position_project_pur->rating_id = $request->rating_id;


        $government_position_project_pur->remark = $request->remark;


        $government_position_project_pur->government_position_project_id = $request->government_position_project_id;


        $government_position_project_pur->created_at = $request->created_at;


        $government_position_project_pur->updated_at = $request->updated_at;


        $government_position_project_pur->deleted_at = $request->deleted_at;

        //$government_position_project_pur->user_id = $request->user()->id;
        $government_position_project_pur->save();

        return redirect('/government_position_project_purs');

    }

    public function store(Request $request)
    {
        return $this->update($request);
    }

    public function destroy(Request $request, $id)
    {

        $government_position_project_pur = GovernmentPositionProjectPur::findOrFail($id);

        $government_position_project_pur->delete();
        return "OK";

    }


}
