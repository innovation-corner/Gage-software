<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\GovernmentPosition;

use DB;

class GovernmentPositionsController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
    {
        return view('government_positions.index', []);
    }

    public function create(Request $request)
    {
        return view('government_positions.add', [
            []
        ]);
    }

    public function edit(Request $request, $id)
    {
        $government_position = GovernmentPosition::findOrFail($id);
        return view('government_positions.add', [
            'model' => $government_position]);
    }

    public function show(Request $request, $id)
    {
        $government_position = GovernmentPosition::findOrFail($id);
        return view('government_positions.show', [
            'model' => $government_position]);
    }


    public function update(Request $request)
    {
        //
        /*$this->validate($request, [
        'name' => 'required|max:255',
      ]);*/
        $government_position = null;
        if ($request->id > 0) {
            $government_position = GovernmentPosition::findOrFail($request->id);
        } else {
            $government_position = new GovernmentPosition;
        }


        $government_position->id = $request->id ?: 0;


        $government_position->name = $request->name;


        $government_position->government_category_id = $request->government_category_id;


        $government_position->created_by = $request->created_by;


        $government_position->created_at = $request->created_at;


        $government_position->updated_at = $request->updated_at;


        $government_position->deleted_at = $request->deleted_at;

        //$government_position->user_id = $request->user()->id;
        $government_position->save();

        return redirect('/government_positions');

    }

    public function store(Request $request)
    {
        return $this->update($request);
    }

    public function destroy(Request $request, $id)
    {

        $government_position = GovernmentPosition::findOrFail($id);

        $government_position->delete();
        return "OK";

    }


}
