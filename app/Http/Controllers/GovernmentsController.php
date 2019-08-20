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

    public function grid(Request $request)
    {
        $len = $_GET['length'];
        $start = $_GET['start'];

        $select = "SELECT *,1,2 ";
        $presql = " FROM governments a ";
        if ($_GET['search']['value']) {
            $presql .= " WHERE name LIKE '%" . $_GET['search']['value'] . "%' ";
        }

        $presql .= "  ";

        //------------------------------------
        // 1/2/18 - Jasmine Robinson Added Orderby Section for the Grid Results
        //------------------------------------
        $orderby = "";
        $columns = array('id', 'name', 'created_by', 'country_id', 'created_at', 'updated_at',);
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
