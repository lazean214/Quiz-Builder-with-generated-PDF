<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Budget;
use App\Models\Area;
use App\Models\Purpose;
use App\Models\Completion;
use App\Models\Projects;
use App\Models\quiz;
use App\Models\Questionaire;
use App\Models\Result;
Use Image;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = quiz::all();
        return view('Admin.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $budget = Budget::all();
        $areas = Area::all();
        $purpose = Purpose::all();
        $completion = Completion::all();

        return view('Admin.create-quiz', compact('budget', 'areas', 'purpose', 'completion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->all());
        $quiz = new quiz;
        $quiz->title = $request->title;
        $quiz->sub_title = $request->sub_title;
        $quiz->save();

        $id = $quiz->id;

        if($request->has('budget')){

            $q = new Questionaire;
            $q->quiz_id = $id;
            $q->type = 'budget';
            $q->header = $request->budget_header;
            $q->sub_header = $request->budget_subheader;
            $q->options = json_encode($request->budget);
            $q->input_type = $request->budget_input_type;
            $q->save();
        }

        if($request->has('area')){
            $a = new Questionaire;
            $a->quiz_id = $id;
            $a->type = 'areas';
            $a->header = $request->area_header;
            $a->sub_header = $request->area_subheader;
            $a->options = json_encode($request->area);
            $a->input_type = $request->area_input_type;
            $a->save();
        }

        if($request->has('purpose')){
            $p = new Questionaire;
            $p->quiz_id = $id;
            $p->type = 'purpose';
            $p->header = $request->purpose_header;
            $p->sub_header = $request->purpose_subheader;
            $p->options = json_encode($request->purpose);
            $p->input_type = $request->purpose_input_type;
            $p->save();
        }

        if($request->has('completion')){
            $c = new Questionaire;
            $c->quiz_id = $id;
            $c->type = 'completion';
            $c->header = $request->completion_header;
            $c->sub_header = $request->completion_subheader;
            $c->options = json_encode($request->completion);
            $c->input_type = $request->completion_input_type;
            $c->save();
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
    }




    public function setting($setting){

        if($setting == 'result'){
                $data = Result::all();
                $b = Budget::all();
                $a = Area::all();
                $p = Purpose::all();
                $c = Completion::all();
                $q = quiz::all();
                return view('Admin.Results.index', compact('data', 'a', 'b', 'c', 'b', 'q', 'p'));
        }

        if($setting == 'projects'){
            $data = Projects::all();

            // dd($data);
            return view('Admin.Projects.index', compact('data'));
        }

        $data = settings($setting);

        return view('Admin.Settings.index', compact('data'));
        // if($setting == 'budget'){
        //     $data = Budget::all();

        // }elseif($setting == 'areas'){
        //     $data = Area::all();
        // }elseif($setting == 'purpose'){
        //     $data = Purpose::all();
        // }elseif($setting == 'completion'){
        //     $data = Completion::all();
        // }elseif($setting == 'result'){
        //     $data = Result::all();
        //     $b = Budget::all();
        //     $a = Area::all();
        //     $p = Purpose::all();
        //     $c = Completion::all();
        //     $q = quiz::all();
        //     return view('Admin.Results.index', compact('data', 'a', 'b', 'c', 'b', 'q', 'p'));
        // }
        // return view('Admin.Settings.index', compact('data'));
    }


    public function createOptions(Request $request, $setting){


        if($setting == 'budget'){
            $data = new Budget;

        }elseif($setting == 'areas'){
            $data = new Area;
        }elseif($setting == 'purpose'){
            $data = new Purpose;
        }elseif($setting == 'completion'){
            $data = new Completion;
        }

        // $this->validate($request, [
        //     'file' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        // ]);
        if($request->hasFile('image')){
        $image = $request->file('image');
        $input['file'] = time().'.'.$image->getClientOriginalExtension();

        $destinationPath = public_path('/thumbnail');

        $imgFile = Image::make($image->getRealPath());

        $imgFile->resize(150, 150, function ($constraint) {
		    $constraint->aspectRatio();
		})->save($destinationPath.'/'.$input['file']);

        $destinationPath = public_path('/uploads');
        $image->move($destinationPath, $input['file']);
        }

        // dd($request->all());
            $data->name = $request->name;
            $data->input_type = $request->input_type;
            if(isset($image)){
                $data->image = $input['file'];
            }

            $data->save();
        return redirect()->back();
    }



    public function storeResultOption(Request $request){

        $file = $request->file('media');

      //Display File Name
      echo 'File Name: '.$file->getClientOriginalName();
      echo '<br>';

      //Display File Extension
      echo 'File Extension: '.$file->getClientOriginalExtension();
      echo '<br>';

      //Display File Real Path
      echo 'File Real Path: '.$file->getRealPath();
      echo '<br>';

      //Display File Size
      echo 'File Size: '.$file->getSize();
      echo '<br>';

      //Display File Mime Type
      echo 'File Mime Type: '.$file->getMimeType();

      //Move Uploaded File
      $destinationPath = 'uploads';
      $file->move($destinationPath,time().'.' .$file->getClientOriginalName());


      $r = new Result;
      $r->quiz_id = request()->quiz_id;
      $r->budget_id = request()->budget_id;
      $r->areas = json_encode(request()->areas);
      $r->purpose_id = request()->purpose_id;
      $r->completion_id = request()->completion_id;
      $r->image = time().'.' .$file->getClientOriginalName();
      $r->save();

      return redirect()->back();
    }
}
