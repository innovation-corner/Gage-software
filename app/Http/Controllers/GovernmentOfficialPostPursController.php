<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\GovernmentOfficialPostPur;

use DB;

class GovernmentOfficialPostPursController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
    {
        return view('government_official_post_purs.index', []);
    }

    public function create(Request $request)
    {
        return view('government_official_post_purs.add', [
            []
        ]);
    }

    public function edit(Request $request, $id)
    {
        $government_official_post_pur = GovernmentOfficialPostPur::findOrFail($id);
        return view('government_official_post_purs.add', [
            'model' => $government_official_post_pur]);
    }

    public function show(Request $request, $id)
    {
        $government_official_post_pur = GovernmentOfficialPostPur::findOrFail($id);
        return view('government_official_post_purs.show', [
            'model' => $government_official_post_pur]);
    }


    public function update(Request $request)
    {
        //
        /*$this->validate($request, [
        'name' => 'required|max:255',
      ]);*/
        $government_official_post_pur = null;
        if ($request->id > 0) {
            $government_official_post_pur = GovernmentOfficialPostPur::findOrFail($request->id);
        } else {
            $government_official_post_pur = new GovernmentOfficialPostPur;
        }


        $government_official_post_pur->id = $request->id ?: 0;


        $government_official_post_pur->pur_user_id = $request->pur_user_id;


        $government_official_post_pur->rating_id = $request->rating_id;


        $government_official_post_pur->remark = $request->remark;


        $government_official_post_pur->government_official_post_id = $request->government_official_post_id;


        $government_official_post_pur->created_at = $request->created_at;


        $government_official_post_pur->updated_at = $request->updated_at;


        $government_official_post_pur->deleted_at = $request->deleted_at;

        //$government_official_post_pur->user_id = $request->user()->id;
        $government_official_post_pur->save();

        return redirect('/government_official_post_purs');

    }

    public function store(Request $request)
    {
        return $this->update($request);
    }

    public function destroy(Request $request, $id)
    {

        $government_official_post_pur = GovernmentOfficialPostPur::findOrFail($id);

        $government_official_post_pur->delete();
        return "OK";

    }


}
