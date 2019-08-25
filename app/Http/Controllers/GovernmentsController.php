<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Government;

use DB;

class GovernmentsController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
    {
        return view('governments.index', []);
    }

    public function create(Request $request)
    {
        return view('governments.add', [
            []
        ]);
    }

    public function edit(Request $request, $id)
    {
        $government = Government::findOrFail($id);
        return view('governments.add', [
            'model' => $government]);
    }

    public function show(Request $request, $id)
    {
        $government = Government::findOrFail($id);
        return view('governments.show', [
            'model' => $government]);
    }

    public function update(Request $request)
    {
        //
        /*$this->validate($request, [
        'name' => 'required|max:255',
      ]);*/
        $government = null;
        if ($request->id > 0) {
            $government = Government::findOrFail($request->id);
        } else {
            $government = new Government;
        }


        $government->id = $request->id ?: 0;


        $government->name = $request->name;


        $government->created_by = $request->created_by;


        $government->country_id = $request->country_id;


        $government->created_at = $request->created_at;


        $government->updated_at = $request->updated_at;

        //$government->user_id = $request->user()->id;
        $government->save();

        return redirect('/governments');

    }

    public function store(Request $request)
    {
        return $this->update($request);
    }

    public function destroy(Request $request, $id)
    {

        $government = Government::findOrFail($id);

        $government->delete();
        return "OK";

    }


}
