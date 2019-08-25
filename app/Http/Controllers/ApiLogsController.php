<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ApiLog;

use DB;

class ApiLogsController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
    {
        return view('api_logs.index', []);
    }

    public function create(Request $request)
    {
        return view('api_logs.add', [
            []
        ]);
    }

    public function edit(Request $request, $id)
    {
        $api_log = ApiLog::findOrFail($id);
        return view('api_logs.add', [
            'model' => $api_log]);
    }

    public function show(Request $request, $id)
    {
        $api_log = ApiLog::findOrFail($id);
        return view('api_logs.show', [
            'model' => $api_log]);
    }

    public function grid(Request $request)
    {
        $len = $_GET['length'];
        $start = $_GET['start'];

        $select = "SELECT *,1,2 ";
        $presql = " FROM api_logs a ";
        if ($_GET['search']['value']) {
            $presql .= " WHERE url LIKE '%" . $_GET['search']['value'] . "%' ";
        }

        $presql .= "  ";

        //------------------------------------
        // 1/2/18 - Jasmine Robinson Added Orderby Section for the Grid Results
        //------------------------------------
        $orderby = "";
        $columns = array('id', 'url', 'method', 'data_param', 'response', 'created', 'modified',);
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
        $api_log = null;
        if ($request->id > 0) {
            $api_log = ApiLog::findOrFail($request->id);
        } else {
            $api_log = new ApiLog;
        }


        $api_log->id = $request->id ?: 0;


        $api_log->url = $request->url;


        $api_log->method = "post";


        $api_log->data_param = $request->data_param;


        $api_log->response = $request->response;


        $api_log->created = $request->created;


        $api_log->modified = $request->modified;

        //$api_log->user_id = $request->user()->id;
        $api_log->save();

        return redirect('/api_logs');

    }

    public function store(Request $request)
    {
        return $this->update($request);
    }

    public function destroy(Request $request, $id)
    {

        $api_log = ApiLog::findOrFail($id);

        $api_log->delete();
        return "OK";

    }


}
