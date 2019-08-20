<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\GovernmentPositionProjectPur;

use DB;

class GovernmentPositionProjectPursController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
    {
        return view('government_position_project_purs.index', []);
    }

    public function create(Request $request)
    {
        return view('government_position_project_purs.add', [
            []
        ]);
    }

    public function edit(Request $request, $id)
    {
        $government_position_project_pur = GovernmentPositionProjectPur::findOrFail($id);
        return view('government_position_project_purs.add', [
            'model' => $government_position_project_pur]);
    }

    public function show(Request $request, $id)
    {
        $government_position_project_pur = GovernmentPositionProjectPur::findOrFail($id);
        return view('government_position_project_purs.show', [
            'model' => $government_position_project_pur]);
    }

    public function grid(Request $request)
    {
        $len = $_GET['length'];
        $start = $_GET['start'];

        $select = "SELECT *,1,2 ";
        $presql = " FROM government_position_project_purs a ";
        if ($_GET['search']['value']) {
            $presql .= " WHERE pur_user_id LIKE '%" . $_GET['search']['value'] . "%' ";
        }

        $presql .= "  ";

        //------------------------------------
        // 1/2/18 - Jasmine Robinson Added Orderby Section for the Grid Results
        //------------------------------------
        $orderby = "";
        $columns = array('id', 'pur_user_id', 'rating_id', 'remark', 'government_position_project_id', 'created_at', 'updated_at', 'deleted_at',);
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
        $government_position_project_pur = null;
        if ($request->id > 0) {
            $government_position_project_pur = GovernmentPositionProjectPur::findOrFail($request->id);
        } else {
            $government_position_project_pur = new GovernmentPositionProjectPur;
        }


        $government_position_project_pur->id = $request->id ?: 0;


        $government_position_project_pur->pur_user_id = $request->pur_user_id;


        $government_position_project_pur->rating_id = $request->rating_id;


        $government_position_project_pur->remark = $request->remark;


        $government_position_project_pur->government_position_project_id = $request->government_position_project_id;


        $government_position_project_pur->created_at = $request->created_at;


        $government_position_project_pur->updated_at = $request->updated_at;


        $government_position_project_pur->deleted_at = $request->deleted_at;

        //$government_position_project_pur->user_id = $request->user()->id;
        $government_position_project_pur->save();

        return redirect('/government_position_project_purs');

    }

    public function store(Request $request)
    {
        return $this->update($request);
    }

    public function destroy(Request $request, $id)
    {

        $government_position_project_pur = GovernmentPositionProjectPur::findOrFail($id);

        $government_position_project_pur->delete();
        return "OK";

    }


}
