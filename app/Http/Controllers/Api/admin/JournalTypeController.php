<?php

namespace App\Http\Controllers\Api\admin;

use App\Http\Controllers\Controller;
use App\Models\Journaltype;

use Illuminate\Http\Request;

class JournalTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Journaltype $journaltype)
    {
        //
        return $journaltype->paginate(20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if($request->has('id')){
            $respond=Journaltype::find($request->get('id'));
            $respond->update($request->all());
        }else{
            $respond=Journaltype::firstOrCreate($request->all());
        }
        return response()->json($respond);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Journaltype $journaltype)
    {
        //
        return $journaltype;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Journaltype $journaltype)
    {
        //
        $response = new \stdClass();
        $response->success=$journaltype->update($request->all());
        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Journaltype $journaltype)
    {
        //
        $response = new \stdClass();
        $response->success=$journaltype->delete();
        return response()->json($response);
    }
}
