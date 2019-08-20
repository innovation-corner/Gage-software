<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Role;

use DB;

class RolesController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
    {
        return view('roles.index', []);
    }

    public function create(Request $request)
    {
        return view('roles.add', [
            []
        ]);
    }

    public function edit(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        return view('roles.add', [
            'model' => $role]);
    }

    public function show(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        return view('roles.show', [
            'model' => $role]);
    }

    public function grid(Request $request)
    {
        $len = $_GET['length'];
        $start = $_GET['start'];

        $select = "SELECT *,1,2 ";
        $presql = " FROM roles a ";
        if ($_GET['search']['value']) {
            $presql .= " WHERE name LIKE '%" . $_GET['search']['value'] . "%' ";
        }

        $presql .= "  ";

        //------------------------------------
        // 1/2/18 - Jasmine Robinson Added Orderby Section for the Grid Results
        //------------------------------------
        $orderby = "";
        $columns = array('id', 'name', 'display_name', 'description', 'created_at', 'updated_at',);
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
        $role = null;
        if ($request->id > 0) {
            $role = Role::findOrFail($request->id);
        } else {
            $role = new Role;
        }


        $role->id = $request->id ?: 0;


        $role->name = $request->name;


        $role->display_name = $request->display_name;


        $role->description = $request->description;


        $role->created_at = $request->created_at;


        $role->updated_at = $request->updated_at;

        //$role->user_id = $request->user()->id;
        $role->save();

        return redirect('/roles');

    }

    public function store(Request $request)
    {
        return $this->update($request);
    }

    public function destroy(Request $request, $id)
    {

        $role = Role::findOrFail($id);

        $role->delete();
        return "OK";

    }


}
