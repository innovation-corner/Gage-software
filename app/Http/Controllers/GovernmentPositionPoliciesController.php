<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\GovernmentPositionPolicy;

use DB;

class GovernmentPositionPoliciesController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
    {
        return view('government_position_policies.index', []);
    }

    public function create(Request $request)
    {
        return view('government_position_policies.add', [
            []
        ]);
    }

    public function edit(Request $request, $id)
    {
        $government_position_policy = GovernmentPositionPolicy::findOrFail($id);
        return view('government_position_policies.add', [
            'model' => $government_position_policy]);
    }

    public function show(Request $request, $id)
    {
        $government_position_policy = GovernmentPositionPolicy::findOrFail($id);
        return view('government_position_policies.show', [
            'model' => $government_position_policy]);
    }

    public function grid(Request $request)
    {
        $len = $_GET['length'];
        $start = $_GET['start'];

        $select = "SELECT *,1,2 ";
        $presql = " FROM government_position_policies a ";
        if ($_GET['search']['value']) {
            $presql .= " WHERE government_position_id LIKE '%" . $_GET['search']['value'] . "%' ";
        }

        $presql .= "  ";

        //------------------------------------
        // 1/2/18 - Jasmine Robinson Added Orderby Section for the Grid Results
        //------------------------------------
        $orderby = "";
        $columns = array('id', 'government_position_id', 'policy_name', 'government_policy_category_id', 'year', 'policy_header', 'policy_description_content', 'image_urls', 'inserted_by', 'created_at', 'updated_at', 'deleted_at',);
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
        $government_position_policy = null;
        if ($request->id > 0) {
            $government_position_policy = GovernmentPositionPolicy::findOrFail($request->id);
        } else {
            $government_position_policy = new GovernmentPositionPolicy;
        }


        $government_position_policy->id = $request->id ?: 0;


        $government_position_policy->government_position_id = $request->government_position_id;


        $government_position_policy->policy_name = $request->policy_name;


        $government_position_policy->government_policy_category_id = $request->government_policy_category_id;


        $government_position_policy->year = $request->year;


        $government_position_policy->policy_header = $request->policy_header;


        $government_position_policy->policy_description_content = $request->policy_description_content;


        $government_position_policy->image_urls = $request->image_urls;


        $government_position_policy->inserted_by = $request->inserted_by;


        $government_position_policy->created_at = $request->created_at;


        $government_position_policy->updated_at = $request->updated_at;


        $government_position_policy->deleted_at = $request->deleted_at;

        //$government_position_policy->user_id = $request->user()->id;
        $government_position_policy->save();

        return redirect('/government_position_policies');

    }

    public function store(Request $request)
    {
        return $this->update($request);
    }

    public function destroy(Request $request, $id)
    {

        $government_position_policy = GovernmentPositionPolicy::findOrFail($id);

        $government_position_policy->delete();
        return "OK";

    }


}
