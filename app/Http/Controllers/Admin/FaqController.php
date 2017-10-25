<?php

namespace App\Http\Controllers\Admin;

use App\Models\FaqDescription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Faq ;
use App\Models\Language ;
use Image ;

class FaqController extends Controller
{

    protected $language ;

    public function __construct()
    {
        $this->language = Language::where('status','=','1')->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $faqs = Faq::all() ;

        return view('admin.faq.index')->withFaqs($faqs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.faq.create')->with('languages',$this->language);
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
            'status' => 'required'
        ];
        foreach ($this->language as  $language){
            $rules['title_'.$language->label] = 'required|max:255';
            $rules['description_'.$language->label] = 'required';

        }


        $this->validate($request,$rules);

        $faq = new Faq();
        $faq->status = $request->status;


        //upload image to server directory to service


        $faq->save();

        foreach ($this->language as $language){
            $faqDescription = new FaqDescription();
            $faqDescription->lang_id = $language->id;
            $faqDescription->faq_id = $faq->id;
            $faqDescription->title = $request->get('title_'.$language->label);
            $faqDescription->description = $request->get('description_'.$language->label);
            $faqDescription->save();
        }
        session()->flash('message','faq Added successfully');
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
        return view('admin.faq.edit')->with('faq',$faq)->with('languages',$this->language);
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
            'status' => 'required'
        ];
        foreach ($this->language as  $language){

            $rules['title_'.$language->label] = 'required|max:255';
            $rules['description_'.$language->label] = 'required';

        }


        $this->validate($request,$rules);

        $faq = Faq::find($id);
        $faq->status = $request->status;
        $faq->save();


        foreach ($this->language as $language){
            foreach($faq->description  as $description){
                if($description->lang_id == $language->id){
                    $description->lang_id = $language->id;
                    $description->faq_id = $faq->id;
                    $description->title = $request->get('title_'.$language->label);
                    $description->description = $request->get('description_'.$language->label);
                    $description->save();
                }
            }
        }
        session()->flash('message','faq Updated successfully');
        return redirect()->back();
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
        Faq::destroy($id);
        session()->flash('message','Faq deleted successfully');
        return redirect()->back();
    }

    public function destroyAll(Request $request){

        Faq::whereIn('id',explode(',',$request->items))->delete();
        session()->flash('message','All  selected Faqs deleted successfully');
        return redirect()->back();
    }
}
