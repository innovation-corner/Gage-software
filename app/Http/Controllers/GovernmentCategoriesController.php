<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\GovernmentCategory;

use DB;

class GovernmentCategoriesController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
    {
        return view('government_categories.index', []);
    }

    public function create(Request $request)
    {
        return view('government_categories.add', [
            []
        ]);
    }

    public function edit(Request $request, $id)
    {
        $government_category = GovernmentCategory::findOrFail($id);
        return view('government_categories.add', [
            'model' => $government_category]);
    }

    public function show(Request $request, $id)
    {
        $government_category = GovernmentCategory::findOrFail($id);
        return view('government_categories.show', [
            'model' => $government_category]);
    }

    public function update(Request $request)
    {
        //
        /*$this->validate($request, [
        'name' => 'required|max:255',
      ]);*/
        $government_category = null;
        if ($request->id > 0) {
            $government_category = GovernmentCategory::findOrFail($request->id);
        } else {
            $government_category = new GovernmentCategory;
        }


        $government_category->id = $request->id ?: 0;


        $government_category->name = $request->name;


        $government_category->parent_category_id = $request->parent_category_id;


        $government_category->created_by = $request->created_by;


        $government_category->created_at = $request->created_at;


        $government_category->updated_at = $request->updated_at;


        $government_category->deleted_at = $request->deleted_at;

        //$government_category->user_id = $request->user()->id;
        $government_category->save();

        return redirect('/government_categories');

    }

    public function store(Request $request)
    {
        return $this->update($request);
    }

    public function destroy(Request $request, $id)
    {

        $government_category = GovernmentCategory::findOrFail($id);

        $government_category->delete();
        return "OK";

    }


}
