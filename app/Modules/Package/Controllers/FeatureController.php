<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $features = Feature::get();

        $list = [];
        foreach ($features as $key => $value) {
            $list[$key] = new \stdClass();
            $list[$key] = Feature::generateFeature($value);
        }

        $this->data['data'] = (object)$list;
        return view('Package.Views.Features.index',$this->data);
    }


    public function addFeature(Request $request){

        $feature = new Feature();
        $feature->title = $request->title;
        $feature->type = $request->type;
        $feature->save();
        return 1;
    }

    public function destroyFeature(Request $request){
        Feature::find($request->id)->delete();
        return 1;
    }

    public function editTitle(Request $request){
        $feature = Feature::find($request->id);
        $feature ->title = $request->title;
        $feature ->save();
        return 1;
    }

    public function editType(Request $request){
        $feature = Feature::find($request->id);
        $feature ->type = $request->type;
        $feature ->save();
        return 1;
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
