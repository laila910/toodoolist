<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class taskcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {

        $this->middleware('checkAuth', ['except'  => ['create', 'store', 'login', 'logicLogin']]);
    }
    public function index()
    {
        $data = Task::get();

        return view('task.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('task.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            "name"  => "required|min:3",
            "title" => "required|min:3",
            "desc" => "required|min:5"
        ]);

        // $data['password'] = bcrypt($data['password']);

        $op =   Task::create($data);

        $message = "Error Try Again";

        if ($op) {
            $message = "Data Inserted";
        }


        session()->flash('message', $message);

        return redirect(url('/task'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Task::find($id)->toArray();
        return view('task.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            "name"  => "required|min:3",
            "title" => "required|min:3",
            "desc" => "required|min:3",

        ]);


        $op = Task::where('id', $id)->update($data);


        $message = "Error Try Again !!!";

        if ($op) {
            $message = "Data Updated";
        }

        session()->flash('message', $message);

        return redirect(url('/task'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $op = Task::find($id)->delete();

        $message = "Error in delete";

        if ($op) {
            $message = "User Removed";
        }
        session()->flash('message', $message);
        return back();
    }
}
