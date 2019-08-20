<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Rating;

use DB;

class RatingsController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
    {
        return view('ratings.index', []);
    }

    public function create(Request $request)
    {
        return view('ratings.add', [
            []
        ]);
    }

    public function edit(Request $request, $id)
    {
        $rating = Rating::findOrFail($id);
        return view('ratings.add', [
            'model' => $rating]);
    }

    public function show(Request $request, $id)
    {
        $rating = Rating::findOrFail($id);
        return view('ratings.show', [
            'model' => $rating]);
    }

    public function grid(Request $request)
    {
        $len = $_GET['length'];
        $start = $_GET['start'];

        $select = "SELECT *,1,2 ";
        $presql = " FROM ratings a ";
        if ($_GET['search']['value']) {
            $presql .= " WHERE name LIKE '%" . $_GET['search']['value'] . "%' ";
        }

        $presql .= "  ";

        //------------------------------------
        // 1/2/18 - Jasmine Robinson Added Orderby Section for the Grid Results
        //------------------------------------
        $orderby = "";
        $columns = array('id', 'name', 'number_of_stars', 'created_at', 'udated_at',);
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
        $rating = null;
        if ($request->id > 0) {
            $rating = Rating::findOrFail($request->id);
        } else {
            $rating = new Rating;
        }


        $rating->id = $request->id ?: 0;


        $rating->name = $request->name;


        $rating->number_of_stars = $request->number_of_stars;


        $rating->created_at = $request->created_at;


        $rating->udated_at = $request->udated_at;

        //$rating->user_id = $request->user()->id;
        $rating->save();

        return redirect('/ratings');

    }

    public function store(Request $request)
    {
        return $this->update($request);
    }

    public function destroy(Request $request, $id)
    {

        $rating = Rating::findOrFail($id);

        $rating->delete();
        return "OK";

    }


}
