<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Feature;
use App\Models\PackageFeatures;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $packages = Package::get();

        $list = [];
        foreach ($packages as $key => $value) {
            $list[$key] = new \stdClass();
            $list[$key] = Package::generatePackage($value);
        }
        //dd($list);
        $this->data['data'] = (object)$list;
        $this->data['features'] = Feature::get();
        return view('Package.Views.Packages.index',$this->data);
    }


    public function addPackage(Request $request){

        $package = new Package();
        $package->title = $request->title;
        $package->price = $request->price;
        $package->discount = $request->discount;
        $package->coupon = $request->coupon;
        $package->is_active = $request->is_active;
        $package->save();


        foreach ($request->features as $key => $value) {
            $packageFeature = new PackageFeatures();
            $packageFeature->package_id = $package->id;
            $packageFeature->feature_id = $value[0];
            if($value[2] == 'text'){
                $packageFeature->value = $value[1];
            }else{
                $packageFeature->bool_value = $value[1];
            }
            $packageFeature->save();
        }

        return 1;
    }

    public function destroyPackage(Request $request){
        PackageFeatures::where('package_id',$request->id)->delete();
        Package::find($request->id)->delete();
        return 1;
    }

    public function editPackage(Request $request){

        PackageFeatures::where('package_id',$request->id)->delete();
        $package = Package::find($request->id);
        $package->title = $request->title;
        $package->price = $request->price;
        $package->discount = $request->discount;
        $package->coupon = $request->coupon;
        $package->is_active = $request->is_active;
        $package->save();

        foreach ($request->features as $key => $value) {
            $packageFeature = new PackageFeatures();
            $packageFeature->package_id = $request->id;
            $packageFeature->feature_id = $value[0];
            if($value[2] == 'text'){
                $packageFeature->value = $value[1];
            }else{
                $packageFeature->bool_value = $value[1];
            }
            $packageFeature->save();
        }

        return 1;
    }


    public function home_index()
    {
        $packages = Package::where('is_active',1)->get();

        $list = [];
        foreach ($packages as $key => $value) {
            $list[$key] = new \stdClass();
            $list[$key] = Package::generatePackage($value);
        }
        dd((object)$list);
        $this->data['data'] = (object)$list;


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
