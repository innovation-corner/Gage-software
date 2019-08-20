<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\GovernmentOfficialPost;

use DB;

class GovernmentOfficialPostsController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
    {
        return view('government_official_posts.index', []);
    }

    public function create(Request $request)
    {
        return view('government_official_posts.add', [
            []
        ]);
    }

    public function edit(Request $request, $id)
    {
        $government_official_post = GovernmentOfficialPost::findOrFail($id);
        return view('government_official_posts.add', [
            'model' => $government_official_post]);
    }

    public function show(Request $request, $id)
    {
        $government_official_post = GovernmentOfficialPost::findOrFail($id);
        return view('government_official_posts.show', [
            'model' => $government_official_post]);
    }

    public function grid(Request $request)
    {
        $len = $_GET['length'];
        $start = $_GET['start'];

        $select = "SELECT *,1,2 ";
        $presql = " FROM government_official_posts a ";
        if ($_GET['search']['value']) {
            $presql .= " WHERE header LIKE '%" . $_GET['search']['value'] . "%' ";
        }

        $presql .= "  ";

        //------------------------------------
        // 1/2/18 - Jasmine Robinson Added Orderby Section for the Grid Results
        //------------------------------------
        $orderby = "";
        $columns = array('id', 'header', 'content', 'title', 'posted_by', 'government_id', 'created_at', 'updated_at', 'deleted_at',);
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
        $government_official_post = null;
        if ($request->id > 0) {
            $government_official_post = GovernmentOfficialPost::findOrFail($request->id);
        } else {
            $government_official_post = new GovernmentOfficialPost;
        }


        $government_official_post->id = $request->id ?: 0;


        $government_official_post->header = $request->header;


        $government_official_post->content = null;


        $government_official_post->title = $request->title;


        $government_official_post->posted_by = $request->posted_by;


        $government_official_post->government_id = $request->government_id;


        $government_official_post->created_at = $request->created_at;


        $government_official_post->updated_at = $request->updated_at;


        $government_official_post->deleted_at = $request->deleted_at;

        //$government_official_post->user_id = $request->user()->id;
        $government_official_post->save();

        return redirect('/government_official_posts');

    }

    public function store(Request $request)
    {
        return $this->update($request);
    }

    public function destroy(Request $request, $id)
    {

        $government_official_post = GovernmentOfficialPost::findOrFail($id);

        $government_official_post->delete();
        return "OK";

    }


}
