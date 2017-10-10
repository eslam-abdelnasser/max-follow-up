<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faq;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $faqs = Faq::paginate(10);
        return view('admin.faqs.index')->with('faqs',$faqs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $languages = Language::where('status','=','1')->get();
        return view('admin.faqs.create')->withLanguages($languages);
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
        $languages = Language::where('status','=','1')->get();
        $rules=[];
        foreach ($languages as  $language){

            $rules['question_'.$language->label] = 'required|max:255';
            $rules['answer_'.$language->label] = 'required';
        }
        $this->validate($request,$rules);

        foreach ($languages as $language){
            $faq = new Faq();
            $faq->lang_id = $language->id;
            $faq->question = $request->get('question_'.$language->label);
            $faq->answer = $request->get('answer_'.$language->label);
            $faq->save();
        }
        return redirect()->back();
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
        $faq = Faq::find($id);
        $languages = Language::where('status','=','1')->get();
        return view('admin.faqs.edit')->with('faq',$faq)->with('languages',$languages);
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

        $faq = Faq::find($id);

        $label = Language::where('id',$faq->lang_id)->value('label');
        $rules=[

            'question_'.$label => 'required|max:255',
            'answer_'.$label => 'required'
        ];


        $this->validate($request,$rules);

        $faq->question = $request->get('question_'.$label);
        $faq->answer = $request->get('answer_'.$label);
        $faq->save();

        return redirect()->route('faqs.index');



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
        $faq = Faq::find($id);
        $faq->delete();
        return redirect()->back();
    }
}
