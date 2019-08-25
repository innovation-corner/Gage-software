<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Rating;

use DB;

class RatingsController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
    {
        return view('ratings.index', []);
    }

    public function create(Request $request)
    {
        return view('ratings.add', [
            []
        ]);
    }

    public function edit(Request $request, $id)
    {
        $rating = Rating::findOrFail($id);
        return view('ratings.add', [
            'model' => $rating]);
    }

    public function show(Request $request, $id)
    {
        $rating = Rating::findOrFail($id);
        return view('ratings.show', [
            'model' => $rating]);
    }

    public function update(Request $request)
    {
        //
        /*$this->validate($request, [
        'name' => 'required|max:255',
      ]);*/
        $rating = null;
        if ($request->id > 0) {
            $rating = Rating::findOrFail($request->id);
        } else {
            $rating = new Rating;
        }


        $rating->id = $request->id ?: 0;


        $rating->name = $request->name;


        $rating->number_of_stars = $request->number_of_stars;


        $rating->created_at = $request->created_at;


        $rating->udated_at = $request->udated_at;

        //$rating->user_id = $request->user()->id;
        $rating->save();

        return redirect('/ratings');

    }

    public function store(Request $request)
    {
        return $this->update($request);
    }

    public function destroy(Request $request, $id)
    {

        $rating = Rating::findOrFail($id);

        $rating->delete();
        return "OK";

    }


}
