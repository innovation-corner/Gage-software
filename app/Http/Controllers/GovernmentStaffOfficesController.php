<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\GovernmentStaffOffice;

use DB;

class GovernmentStaffOfficesController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
    {
        return view('government_staff_offices.index', []);
    }

    public function create(Request $request)
    {
        return view('government_staff_offices.add', [
            []
        ]);
    }

    public function edit(Request $request, $id)
    {
        $government_staff_office = GovernmentStaffOffice::findOrFail($id);
        return view('government_staff_offices.add', [
            'model' => $government_staff_office]);
    }

    public function show(Request $request, $id)
    {
        $government_staff_office = GovernmentStaffOffice::findOrFail($id);
        return view('government_staff_offices.show', [
            'model' => $government_staff_office]);
    }

    public function grid(Request $request)
    {
        $len = $_GET['length'];
        $start = $_GET['start'];

        $select = "SELECT *,1,2 ";
        $presql = " FROM government_staff_offices a ";
        if ($_GET['search']['value']) {
            $presql .= " WHERE government_staff_id LIKE '%" . $_GET['search']['value'] . "%' ";
        }

        $presql .= "  ";

        //------------------------------------
        // 1/2/18 - Jasmine Robinson Added Orderby Section for the Grid Results
        //------------------------------------
        $orderby = "";
        $columns = array('id', 'government_staff_id', 'government_position_id', 'year', 'created_by', 'created_at', 'updated_at', 'deleted_at',);
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
        $government_staff_office = null;
        if ($request->id > 0) {
            $government_staff_office = GovernmentStaffOffice::findOrFail($request->id);
        } else {
            $government_staff_office = new GovernmentStaffOffice;
        }


        $government_staff_office->id = $request->id ?: 0;


        $government_staff_office->government_staff_id = $request->government_staff_id;


        $government_staff_office->government_position_id = $request->government_position_id;


        $government_staff_office->year = $request->year;


        $government_staff_office->created_by = $request->created_by;


        $government_staff_office->created_at = $request->created_at;


        $government_staff_office->updated_at = $request->updated_at;


        $government_staff_office->deleted_at = $request->deleted_at;

        //$government_staff_office->user_id = $request->user()->id;
        $government_staff_office->save();

        return redirect('/government_staff_offices');

    }

    public function store(Request $request)
    {
        return $this->update($request);
    }

    public function destroy(Request $request, $id)
    {

        $government_staff_office = GovernmentStaffOffice::findOrFail($id);

        $government_staff_office->delete();
        return "OK";

    }


}
