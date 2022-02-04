<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\quiz;
use App\Models\Budget;
use App\Models\Area;
use App\Models\Purpose;
use App\Models\Completion;
use App\Models\Questionaire;
use App\Models\Result;
use App\Models\Projects;
// use PDF;
use DB;

use Symfony\Component\HttpFoundation\Session\Session;

class QuizController extends Controller
{
    public function index(){
        return view('Quiz.index');
    }


    public function show(Request $request, $id){



        if(null !== request()->segment(3)){

            $data = '';
            $step = request()->segment(3);

            if($step == 'budget'){
                $request->session()->put('name', request()->name);


            }elseif($step == 'purpose'){
                $request->session()->put('budget', request()->budget);
            }elseif($step == 'areas'){

                $request->session()->put('purpose', request()->purpose);

            }elseif($step == 'completion'){

                $request->session()->put('areas', request()->areas);



            }elseif($step == 'result'){

                $request->session()->put('completion', request()->completion);


                // dd($request->session()->all());
            }

            if($step == 'info' || $step == 'result'){
                $data = Questionaire::where('quiz_id', '=', $id)->get()->toArray();

            }else{
                $data = Questionaire::where('quiz_id', '=', $id)->where('type', '=', $step)->get()->toArray();
            }


            // dd($data);
            $qid = $id;
            $type = $data[0]['type'];
            $header = $data[0]['header'];
            $subheader = $data[0]['sub_header'];
            $input = $data[0]['input_type'];
            $options = json_decode($data[0]['options']);
            // dd($options);
            return view('Quiz.steps', compact('step', 'type', 'header', 'subheader', 'input', 'options', 'qid'));

        }else{
            return view('Quiz.index');
        }

        // return view('Quiz.steps');
    }


    public function result(Request $request){


        $request->session()->put('completion', request()->completion);
        // dd(request()->segment(2));
        // request()->segment(3);
        $name = \Session::get('name');
        $budget = \Session::get('budget');
        $purpose = \Session::get('purpose');
        $areas = \Session::get('areas');
        $completion = \Session::get('completion');

        // dd(movingToHandover($completion));
        $areas = is_array($areas) ? $areas : [$areas];
        // dd($areas);
        $query = DB::table('projects')->limit(3);

        if(null !== $budget){
            $query->where('budget', '=', $budget);
        }

        if(null !== $completion){
            $query->where('completion', '=', $completion);
        }

        if(null !== $areas){
            if(count($areas) > 1){
                $query->whereIn('area', $areas);
            }else{
                $query->where('area', '=', $areas[0]);
            }

        }

        $q = $query->get()->toArray();

        // if(count($q) == 0){
        //     $q = Projects::limit(5)->get()->toArray();
        // }

        // dd($q);
        // if($budget == null && $areas == null && $completion == null){

        //     $q = Projects::limit(3)->get()->toArray();

        //     $download = '/generate-pdf';
        // }elseif($budget == null && $areas !== null && $completion !== null){
        //     $q = DB::table('projects')->whereIn('area', $areas)
        //     ->where('completion', '=', $completion)
        //     ->limit(3)
        //     ->get()
        //     ->toArray();

        // }elseif($areas == null && $budget !== null && $completion !== null){
        //     $q = Projects::where('completion', '=', $completion)
        //     ->where('budget', '=', $budget)
        //     ->limit(3)
        //     ->get()
        //     ->toArray();

        // }elseif($completion == null && $budget !== null && $areas !== null){
        //     $q = DB::table('projects')->whereIn('area', $areas)
        //     ->where('budget', '=', $budget)
        //     ->limit(3)
        //     ->get()
        //     ->toArray();

        // }elseif($areas !== null && $budget == null && $completion == null){
        //     $q = DB::table('projects')->whereIn('area', $areas)
        //     ->limit(3)
        //     ->get()
        //     ->toArray();

        // }elseif($budget !== null && $areas == null && $completion == null){
        //     $q = Projects::where('budget', '=', $budget)
        //     ->limit(3)
        //     ->get()
        //     ->toArray();

        // }elseif($completion !== null && $budget == null && $areas == null){
        //     $q = Projects::where('completion', '=', $completion)
        //     ->limit(3)
        //     ->get()
        //     ->toArray();

        // }else{
        //     $q = DB::table('projects')->whereIn('area', $areas)
        //     ->where('completion', '=', $completion)
        //     ->where('budget', '=', $budget)
        //     ->limit(3)
        //     ->get()
        //     ->toArray();

        // }



        $q = json_encode($q);

        $q = json_decode($q, true);

        if(count($q) > 0){
            $status = 'found';

        }else{
            $images = '';
            $status = 'not found';
        }

        return view('Quiz.result', compact('status', 'q'));
    }

}
