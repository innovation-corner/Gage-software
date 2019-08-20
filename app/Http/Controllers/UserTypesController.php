<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UserType;

use DB;

class UserTypesController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
    {
        return view('user_types.index', []);
    }

    public function create(Request $request)
    {
        return view('user_types.add', [
            []
        ]);
    }

    public function edit(Request $request, $id)
    {
        $user_type = UserType::findOrFail($id);
        return view('user_types.add', [
            'model' => $user_type]);
    }

    public function show(Request $request, $id)
    {
        $user_type = UserType::findOrFail($id);
        return view('user_types.show', [
            'model' => $user_type]);
    }

    public function grid(Request $request)
    {
        $len = $_GET['length'];
        $start = $_GET['start'];

        $select = "SELECT *,1,2 ";
        $presql = " FROM user_types a ";
        if ($_GET['search']['value']) {
            $presql .= " WHERE name LIKE '%" . $_GET['search']['value'] . "%' ";
        }

        $presql .= "  ";

        //------------------------------------
        // 1/2/18 - Jasmine Robinson Added Orderby Section for the Grid Results
        //------------------------------------
        $orderby = "";
        $columns = array('id', 'name',);
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
        $user_type = null;
        if ($request->id > 0) {
            $user_type = UserType::findOrFail($request->id);
        } else {
            $user_type = new UserType;
        }


        $user_type->id = $request->id ?: 0;


        $user_type->name = $request->name;

        //$user_type->user_id = $request->user()->id;
        $user_type->save();

        return redirect('/user_types');

    }

    public function store(Request $request)
    {
        return $this->update($request);
    }

    public function destroy(Request $request, $id)
    {

        $user_type = UserType::findOrFail($id);

        $user_type->delete();
        return "OK";

    }


}
