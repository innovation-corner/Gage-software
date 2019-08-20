<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\GovernmentProjectCategory;

use DB;

class GovernmentProjectCategoriesController extends Controller
{
  //
  public function __construct()
  {
    //$this->middleware('auth');
  }


  public function index(Request $request)
  {
    return view('government_project_categories.index', []);
  }

  public function create(Request $request)
  {
    return view('government_project_categories.add', [
      []
    ]);
  }

  public function edit(Request $request, $id)
  {
    $government_project_category = GovernmentProjectCategory::findOrFail($id);
    return view('government_project_categories.add', [
      'model' => $government_project_category    ]);
  }

  public function show(Request $request, $id)
  {
    $government_project_category = GovernmentProjectCategory::findOrFail($id);
    return view('government_project_categories.show', [
      'model' => $government_project_category    ]);
  }

  public function grid(Request $request)
  {
    $len = $_GET['length'];
    $start = $_GET['start'];

    $select = "SELECT *,1,2 ";
    $presql = " FROM government_project_categories a ";
    if($_GET['search']['value']) {
      $presql .= " WHERE name LIKE '%".$_GET['search']['value']."%' ";
    }

    $presql .= "  ";

    //------------------------------------
    // 1/2/18 - Jasmine Robinson Added Orderby Section for the Grid Results
    //------------------------------------
    $orderby = "";
    $columns = array('id','name','parent_category_id','created_by','created_at','updated_at','deleted_at',);
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
  $government_project_category = null;
  if($request->id > 0) { $government_project_category = GovernmentProjectCategory::findOrFail($request->id); }
  else {
    $government_project_category = new GovernmentProjectCategory;
  }


  
    $government_project_category->id = $request->id?:0;
    
  
      $government_project_category->name = $request->name;
  
  
      $government_project_category->parent_category_id = $request->parent_category_id;
  
  
      $government_project_category->created_by = $request->created_by;
  
  
      $government_project_category->created_at = $request->created_at;
  
  
      $government_project_category->updated_at = $request->updated_at;
  
  
      $government_project_category->deleted_at = $request->deleted_at;
  
    //$government_project_category->user_id = $request->user()->id;
  $government_project_category->save();

  return redirect('/government_project_categories');

}

public function store(Request $request)
{
  return $this->update($request);
}

public function destroy(Request $request, $id) {

  $government_project_category = GovernmentProjectCategory::findOrFail($id);

  $government_project_category->delete();
  return "OK";

}


}
