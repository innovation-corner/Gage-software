<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Country;

use DB;

class CountriesController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
    {
        return view('countries.index', []);
    }

    public function create(Request $request)
    {
        return view('countries.add', [
            []
        ]);
    }

    public function edit(Request $request, $id)
    {
        $country = Country::findOrFail($id);
        return view('countries.add', [
            'model' => $country]);
    }

    public function show(Request $request, $id)
    {
        $country = Country::findOrFail($id);
        return view('countries.show', [
            'model' => $country]);
    }


    public function update(Request $request)
    {
        //
        /*$this->validate($request, [
        'name' => 'required|max:255',
      ]);*/
        $country = null;
        if ($request->id > 0) {
            $country = Country::findOrFail($request->id);
        } else {
            $country = new Country;
        }


        $country->id = $request->id ?: 0;


        $country->name = $request->name;


        $country->short_code = $request->short_code;


        $country->created_at = $request->created_at;


        $country->updated_at = $request->updated_at;

        //$country->user_id = $request->user()->id;
        $country->save();

        return redirect('/countries');

    }

    public function store(Request $request)
    {
        return $this->update($request);
    }

    public function destroy(Request $request, $id)
    {

        $country = Country::findOrFail($id);

        $country->delete();
        return "OK";

    }


}
