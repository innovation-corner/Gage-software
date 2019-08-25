<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\GovernmentPositionProject;

use DB;

class GovernmentPositionProjectsController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
    {
        return view('government_position_projects.index', []);
    }

    public function create(Request $request)
    {
        return view('government_position_projects.add', [
            []
        ]);
    }

    public function edit(Request $request, $id)
    {
        $government_position_project = GovernmentPositionProject::findOrFail($id);
        return view('government_position_projects.add', [
            'model' => $government_position_project]);
    }

    public function show(Request $request, $id)
    {
        $government_position_project = GovernmentPositionProject::findOrFail($id);
        return view('government_position_projects.show', [
            'model' => $government_position_project]);
    }

    public function update(Request $request)
    {
        //
        /*$this->validate($request, [
        'name' => 'required|max:255',
      ]);*/
        $government_position_project = null;
        if ($request->id > 0) {
            $government_position_project = GovernmentPositionProject::findOrFail($request->id);
        } else {
            $government_position_project = new GovernmentPositionProject;
        }


        $government_position_project->id = $request->id ?: 0;


        $government_position_project->government_position_id = $request->government_position_id;


        $government_position_project->project_name = $request->project_name;


        $government_position_project->government_project_category_id = $request->government_project_category_id;


        $government_position_project->project_header = $request->project_header;


        $government_position_project->project_description_content = $request->project_description_content;


        $government_position_project->image_urls = $request->image_urls;


        $government_position_project->inserted_by = $request->inserted_by;


        $government_position_project->created_at = $request->created_at;


        $government_position_project->updated_at = $request->updated_at;


        $government_position_project->deleted_at = $request->deleted_at;

        //$government_position_project->user_id = $request->user()->id;
        $government_position_project->save();

        return redirect('/government_position_projects');

    }

    public function store(Request $request)
    {
        return $this->update($request);
    }

    public function destroy(Request $request, $id)
    {

        $government_position_project = GovernmentPositionProject::findOrFail($id);

        $government_position_project->delete();
        return "OK";

    }


}
