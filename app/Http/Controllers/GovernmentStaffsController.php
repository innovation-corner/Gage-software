<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\GovernmentStaff;

use DB;

class GovernmentStaffsController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
    {
        return view('government_staffs.index', []);
    }

    public function create(Request $request)
    {
        return view('government_staffs.add', [
            []
        ]);
    }

    public function edit(Request $request, $id)
    {
        $government_staff = GovernmentStaff::findOrFail($id);
        return view('government_staffs.add', [
            'model' => $government_staff]);
    }

    public function show(Request $request, $id)
    {
        $government_staff = GovernmentStaff::findOrFail($id);
        return view('government_staffs.show', [
            'model' => $government_staff]);
    }

    public function grid(Request $request)
    {
        $len = $_GET['length'];
        $start = $_GET['start'];

        $select = "SELECT *,1,2 ";
        $presql = " FROM government_staff a ";
        if ($_GET['search']['value']) {
            $presql .= " WHERE name LIKE '%" . $_GET['search']['value'] . "%' ";
        }

        $presql .= "  ";

        //------------------------------------
        // 1/2/18 - Jasmine Robinson Added Orderby Section for the Grid Results
        //------------------------------------
        $orderby = "";
        $columns = array('id', 'name', 'created_by', 'government_id', 'email', 'phone', 'gender', 'created_at', 'updated_at', 'deleted_at',);
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
        $government_staff = null;
        if ($request->id > 0) {
            $government_staff = GovernmentStaff::findOrFail($request->id);
        } else {
            $government_staff = new GovernmentStaff;
        }


        $government_staff->id = $request->id ?: 0;


        $government_staff->name = $request->name;


        $government_staff->created_by = $request->created_by;


        $government_staff->government_id = $request->government_id;


        $government_staff->email = $request->email;


        $government_staff->phone = $request->phone;


        $government_staff->gender = $request->gender;


        $government_staff->created_at = $request->created_at;


        $government_staff->updated_at = $request->updated_at;


        $government_staff->deleted_at = $request->deleted_at;

        //$government_staff->user_id = $request->user()->id;
        $government_staff->save();

        return redirect('/government_staffs');

    }

    public function store(Request $request)
    {
        return $this->update($request);
    }

    public function destroy(Request $request, $id)
    {

        $government_staff = GovernmentStaff::findOrFail($id);

        $government_staff->delete();
        return "OK";

    }


}
