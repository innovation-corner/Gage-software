<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\GovernmentStatePur;

use DB;

class GovernmentStatePursController extends Controller
{
  //
  public function __construct()
  {
    //$this->middleware('auth');
  }


  public function index(Request $request)
  {
    return view('government_state_purs.index', []);
  }

  public function create(Request $request)
  {
    return view('government_state_purs.add', [
      []
    ]);
  }

  public function edit(Request $request, $id)
  {
    $government_state_pur = GovernmentStatePur::findOrFail($id);
    return view('government_state_purs.add', [
      'model' => $government_state_pur    ]);
  }

  public function show(Request $request, $id)
  {
    $government_state_pur = GovernmentStatePur::findOrFail($id);
    return view('government_state_purs.show', [
      'model' => $government_state_pur    ]);
  }


  public function update(Request $request) {
    //
    /*$this->validate($request, [
    'name' => 'required|max:255',
  ]);*/
  $government_state_pur = null;
  if($request->id > 0) { $government_state_pur = GovernmentStatePur::findOrFail($request->id); }
  else {
    $government_state_pur = new GovernmentStatePur;
  }


  
    $government_state_pur->id = $request->id?:0;
    
  
      $government_state_pur->pur_user_id = $request->pur_user_id;
  
  
      $government_state_pur->rating_id = $request->rating_id;
  
  
      $government_state_pur->remark = $request->remark;
  
  
      $government_state_pur->government_state_id = $request->government_state_id;
  
  
      $government_state_pur->created_at = $request->created_at;
  
  
      $government_state_pur->updated_at = $request->updated_at;
  
  
      $government_state_pur->deleted_at = $request->deleted_at;
  
    //$government_state_pur->user_id = $request->user()->id;
  $government_state_pur->save();

  return redirect('/government_state_purs');

}

public function store(Request $request)
{
  return $this->update($request);
}

public function destroy(Request $request, $id) {

  $government_state_pur = GovernmentStatePur::findOrFail($id);

  $government_state_pur->delete();
  return "OK";

}


}
