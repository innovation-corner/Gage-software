<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\GovernmentPositionPolicy;

use DB;

class GovernmentPositionPoliciesController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
    {
        return view('government_position_policies.index', []);
    }

    public function create(Request $request)
    {
        return view('government_position_policies.add', [
            []
        ]);
    }

    public function edit(Request $request, $id)
    {
        $government_position_policy = GovernmentPositionPolicy::findOrFail($id);
        return view('government_position_policies.add', [
            'model' => $government_position_policy]);
    }

    public function show(Request $request, $id)
    {
        $government_position_policy = GovernmentPositionPolicy::findOrFail($id);
        return view('government_position_policies.show', [
            'model' => $government_position_policy]);
    }


    public function update(Request $request)
    {
        //
        /*$this->validate($request, [
        'name' => 'required|max:255',
      ]);*/
        $government_position_policy = null;
        if ($request->id > 0) {
            $government_position_policy = GovernmentPositionPolicy::findOrFail($request->id);
        } else {
            $government_position_policy = new GovernmentPositionPolicy;
        }


        $government_position_policy->id = $request->id ?: 0;


        $government_position_policy->government_position_id = $request->government_position_id;


        $government_position_policy->policy_name = $request->policy_name;


        $government_position_policy->government_policy_category_id = $request->government_policy_category_id;


        $government_position_policy->year = $request->year;


        $government_position_policy->policy_header = $request->policy_header;


        $government_position_policy->policy_description_content = $request->policy_description_content;


        $government_position_policy->image_urls = $request->image_urls;


        $government_position_policy->inserted_by = $request->inserted_by;


        $government_position_policy->created_at = $request->created_at;


        $government_position_policy->updated_at = $request->updated_at;


        $government_position_policy->deleted_at = $request->deleted_at;

        //$government_position_policy->user_id = $request->user()->id;
        $government_position_policy->save();

        return redirect('/government_position_policies');

    }

    public function store(Request $request)
    {
        return $this->update($request);
    }

    public function destroy(Request $request, $id)
    {

        $government_position_policy = GovernmentPositionPolicy::findOrFail($id);

        $government_position_policy->delete();
        return "OK";

    }


}
