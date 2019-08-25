<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\GovernmentState;

use DB;

class GovernmentStatesController extends Controller
{
  //
  public function __construct()
  {
    //$this->middleware('auth');
  }


  public function index(Request $request)
  {
    return view('government_states.index', []);
  }

  public function create(Request $request)
  {
    return view('government_states.add', [
      []
    ]);
  }

  public function edit(Request $request, $id)
  {
    $government_state = GovernmentState::findOrFail($id);
    return view('government_states.add', [
      'model' => $government_state    ]);
  }

  public function show(Request $request, $id)
  {
    $government_state = GovernmentState::findOrFail($id);
    return view('government_states.show', [
      'model' => $government_state    ]);
  }



  public function update(Request $request) {
    //
    /*$this->validate($request, [
    'name' => 'required|max:255',
  ]);*/
  $government_state = null;
  if($request->id > 0) { $government_state = GovernmentState::findOrFail($request->id); }
  else {
    $government_state = new GovernmentState;
  }


  
    $government_state->id = $request->id?:0;
    
  
      $government_state->name = $request->name;
  
  
      $government_state->created_by = $request->created_by;
  
  
      $government_state->government_id = $request->government_id;
  
  
      $government_state->created_at = $request->created_at;
  
  
      $government_state->updated_at = $request->updated_at;
  
  
      $government_state->deleted_at = $request->deleted_at;
  
    //$government_state->user_id = $request->user()->id;
  $government_state->save();

  return redirect('/government_states');

}

public function store(Request $request)
{
  return $this->update($request);
}

public function destroy(Request $request, $id) {

  $government_state = GovernmentState::findOrFail($id);

  $government_state->delete();
  return "OK";

}


}
