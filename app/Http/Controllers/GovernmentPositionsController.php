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

    public function grid(Request $request)
    {
        $len = $_GET['length'];
        $start = $_GET['start'];

        $select = "SELECT *,1,2 ";
        $presql = " FROM government_positions a ";
        if ($_GET['search']['value']) {
            $presql .= " WHERE name LIKE '%" . $_GET['search']['value'] . "%' ";
        }

        $presql .= "  ";

        //------------------------------------
        // 1/2/18 - Jasmine Robinson Added Orderby Section for the Grid Results
        //------------------------------------
        $orderby = "";
        $columns = array('id', 'name', 'government_category_id', 'created_by', 'created_at', 'updated_at', 'deleted_at',);
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $orderby = "Order By " . $order . " " . $dir;

        $sql = $select . $presql . $orderby . " LIMIT " . $start . "," . $len;
        //------------------------------------

        $qcount = DB::select("SELECT COUNT(a.id) c" . $presql);
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
