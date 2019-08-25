<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\MOdels\GovernmentPolicyCategory;

use DB;

class GovernmentPolicyCategoriesController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
    {
        return view('government_policy_categories.index', []);
    }

    public function create(Request $request)
    {
        return view('government_policy_categories.add', [
            []
        ]);
    }

    public function edit(Request $request, $id)
    {
        $government_policy_category = GovernmentPolicyCategory::findOrFail($id);
        return view('government_policy_categories.add', [
            'model' => $government_policy_category]);
    }

    public function show(Request $request, $id)
    {
        $government_policy_category = GovernmentPolicyCategory::findOrFail($id);
        return view('government_policy_categories.show', [
            'model' => $government_policy_category]);
    }

    public function update(Request $request)
    {
        //
        /*$this->validate($request, [
        'name' => 'required|max:255',
      ]);*/
        $government_policy_category = null;
        if ($request->id > 0) {
            $government_policy_category = GovernmentPolicyCategory::findOrFail($request->id);
        } else {
            $government_policy_category = new GovernmentPolicyCategory;
        }


        $government_policy_category->id = $request->id ?: 0;


        $government_policy_category->name = $request->name;


        $government_policy_category->parent_category_id = $request->parent_category_id;


        $government_policy_category->created_by = $request->created_by;


        $government_policy_category->created_at = $request->created_at;


        $government_policy_category->updated_at = $request->updated_at;


        $government_policy_category->deleted_at = $request->deleted_at;

        //$government_policy_category->user_id = $request->user()->id;
        $government_policy_category->save();

        return redirect('/government_policy_categories');

    }

    public function store(Request $request)
    {
        return $this->update($request);
    }

    public function destroy(Request $request, $id)
    {

        $government_policy_category = GovernmentPolicyCategory::findOrFail($id);

        $government_policy_category->delete();
        return "OK";

    }


}
