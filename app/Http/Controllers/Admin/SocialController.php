<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Social ;
class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $socials = Social::all();

        return view('admin.socials.index')->withSocials($socials);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.socials.create');
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

        $rules = [
            'name' => 'required|max:255',
            'url' => 'required|max:255',
            'icon' => 'required|max:255',
            'status' =>'required'
        ];

        $this->validate($request,$rules);


        $social = new Social() ;

        $social->name = $request->name ;
        $social->url = $request->url ;
        $social->icon  = $request->icon ;
        $social->status = $request->status ;
        $social->save() ;
        session()->flash('message','social added successfully');

        return redirect()->back() ;
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
        //
        $social = Social::find($id);

        return view('admin.socials.edit')->withSocial($social);
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
        //

        $rules = [
            'name' => 'required|max:255',
            'url' => 'required|max:255',
            'icon' => 'required|max:255',
            'status' =>'required'
        ];

        $this->validate($request,$rules);


        $social = Social::find($id) ;

        $social->name = $request->name ;
        $social->url = $request->url ;
        $social->icon  = $request->icon ;
        $social->status = $request->status ;
        $social->save() ;
        session()->flash('message','social updated successfully');

        return redirect()->back() ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Social::destroy($id);
        session()->flash('message','social deleted successfully');
        return redirect()->back() ;

    }

    public function destroyAll(Request $request){

//        dd($request);

        Social::whereIn('id',explode(',',$request->items))->delete();
        session()->flash('message','All  selected services deleted successfully');
        return redirect()->back();


    }
}
