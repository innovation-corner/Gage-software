<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\GovernmentPositionPolicyPur;

use DB;

class GovernmentPositionPolicyPursController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
    {
        return view('government_position_policy_purs.index', []);
    }

    public function create(Request $request)
    {
        return view('government_position_policy_purs.add', [
            []
        ]);
    }

    public function edit(Request $request, $id)
    {
        $government_position_policy_pur = GovernmentPositionPolicyPur::findOrFail($id);
        return view('government_position_policy_purs.add', [
            'model' => $government_position_policy_pur]);
    }

    public function show(Request $request, $id)
    {
        $government_position_policy_pur = GovernmentPositionPolicyPur::findOrFail($id);
        return view('government_position_policy_purs.show', [
            'model' => $government_position_policy_pur]);
    }


    public function update(Request $request)
    {
        //
        /*$this->validate($request, [
        'name' => 'required|max:255',
      ]);*/
        $government_position_policy_pur = null;
        if ($request->id > 0) {
            $government_position_policy_pur = GovernmentPositionPolicyPur::findOrFail($request->id);
        } else {
            $government_position_policy_pur = new GovernmentPositionPolicyPur;
        }


        $government_position_policy_pur->id = $request->id ?: 0;


        $government_position_policy_pur->pur_user_id = $request->pur_user_id;


        $government_position_policy_pur->rating_id = $request->rating_id;


        $government_position_policy_pur->remark = $request->remark;


        $government_position_policy_pur->government_position_policy_id = $request->government_position_policy_id;


        $government_position_policy_pur->created_at = $request->created_at;


        $government_position_policy_pur->updated_at = $request->updated_at;


        $government_position_policy_pur->deleted_at = $request->deleted_at;

        //$government_position_policy_pur->user_id = $request->user()->id;
        $government_position_policy_pur->save();

        return redirect('/government_position_policy_purs');

    }

    public function store(Request $request)
    {
        return $this->update($request);
    }

    public function destroy(Request $request, $id)
    {

        $government_position_policy_pur = GovernmentPositionPolicyPur::findOrFail($id);

        $government_position_policy_pur->delete();
        return "OK";

    }


}
