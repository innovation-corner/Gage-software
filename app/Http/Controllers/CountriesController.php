<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Country;

use DB;

class CountriesController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
    {
        return view('countries.index', []);
    }

    public function create(Request $request)
    {
        return view('countries.add', [
            []
        ]);
    }

    public function edit(Request $request, $id)
    {
        $country = Country::findOrFail($id);
        return view('countries.add', [
            'model' => $country]);
    }

    public function show(Request $request, $id)
    {
        $country = Country::findOrFail($id);
        return view('countries.show', [
            'model' => $country]);
    }

    public function grid(Request $request)
    {
        $len = $_GET['length'];
        $start = $_GET['start'];

        $select = "SELECT *,1,2 ";
        $presql = " FROM countries a ";
        if ($_GET['search']['value']) {
            $presql .= " WHERE name LIKE '%" . $_GET['search']['value'] . "%' ";
        }

        $presql .= "  ";

        //------------------------------------
        // 1/2/18 - Jasmine Robinson Added Orderby Section for the Grid Results
        //------------------------------------
        $orderby = "";
        $columns = array('id', 'name', 'short_code', 'created_at', 'updated_at',);
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
        $country = null;
        if ($request->id > 0) {
            $country = Country::findOrFail($request->id);
        } else {
            $country = new Country;
        }


        $country->id = $request->id ?: 0;


        $country->name = $request->name;


        $country->short_code = $request->short_code;


        $country->created_at = $request->created_at;


        $country->updated_at = $request->updated_at;

        //$country->user_id = $request->user()->id;
        $country->save();

        return redirect('/countries');

    }

    public function store(Request $request)
    {
        return $this->update($request);
    }

    public function destroy(Request $request, $id)
    {

        $country = Country::findOrFail($id);

        $country->delete();
        return "OK";

    }


}
