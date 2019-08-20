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

  public function grid(Request $request)
  {
    $len = $_GET['length'];
    $start = $_GET['start'];

    $select = "SELECT *,1,2 ";
    $presql = " FROM government_states a ";
    if($_GET['search']['value']) {
      $presql .= " WHERE name LIKE '%".$_GET['search']['value']."%' ";
    }

    $presql .= "  ";

    //------------------------------------
    // 1/2/18 - Jasmine Robinson Added Orderby Section for the Grid Results
    //------------------------------------
    $orderby = "";
    $columns = array('id','name','created_by','government_id','created_at','updated_at','deleted_at',);
    $order = $columns[$request->input('order.0.column')];
    $dir = $request->input('order.0.dir');
    $orderby = "Order By " . $order . " " . $dir;

    $sql = $select.$presql.$orderby." LIMIT ".$start.",".$len;
    //------------------------------------

    $qcount = DB::select("SELECT COUNT(a.id) c".$presql);
    //print_r($qcount);
    $count = $qcount[0]->c;

    $results = DB::select($sql);
    $ret = [];
    foreach ($results as $row) {
      $r = [];
      foreach ($row as $value) {
        $r[] = $value;
      }
      $ret[] = $r;
    }

    $ret['data'] = $ret;
    $ret['recordsTotal'] = $count;
    $ret['iTotalDisplayRecords'] = $count;

    $ret['recordsFiltered'] = count($ret);
    $ret['draw'] = $_GET['draw'];

    echo json_encode($ret);

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
