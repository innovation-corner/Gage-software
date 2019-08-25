<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\GovernmentProjectCategory;

use DB;

class GovernmentProjectCategoriesController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
    {
        return view('government_project_categories.index', []);
    }

    public function create(Request $request)
    {
        return view('government_project_categories.add', [
            []
        ]);
    }

    public function edit(Request $request, $id)
    {
        $government_project_category = GovernmentProjectCategory::findOrFail($id);
        return view('government_project_categories.add', [
            'model' => $government_project_category]);
    }

    public function show(Request $request, $id)
    {
        $government_project_category = GovernmentProjectCategory::findOrFail($id);
        return view('government_project_categories.show', [
            'model' => $government_project_category]);
    }

    public function update(Request $request)
    {
        //
        /*$this->validate($request, [
        'name' => 'required|max:255',
      ]);*/
        $government_project_category = null;
        if ($request->id > 0) {
            $government_project_category = GovernmentProjectCategory::findOrFail($request->id);
        } else {
            $government_project_category = new GovernmentProjectCategory;
        }


        $government_project_category->id = $request->id ?: 0;


        $government_project_category->name = $request->name;


        $government_project_category->parent_category_id = $request->parent_category_id;


        $government_project_category->created_by = $request->created_by;


        $government_project_category->created_at = $request->created_at;


        $government_project_category->updated_at = $request->updated_at;


        $government_project_category->deleted_at = $request->deleted_at;

        //$government_project_category->user_id = $request->user()->id;
        $government_project_category->save();

        return redirect('/government_project_categories');

    }

    public function store(Request $request)
    {
        return $this->update($request);
    }

    public function destroy(Request $request, $id)
    {

        $government_project_category = GovernmentProjectCategory::findOrFail($id);

        $government_project_category->delete();
        return "OK";

    }


}
