<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Result;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Markdown;
use App\Models\Area;
use App\Models\Projects;
use App\Models\Completion;
use App\Models\quiz;
use App\Models\Questionaire;
use DB;
use PDF;


class ResultController extends Controller
{
    public function index(){
        $data = Result::all();

        return view('Admin.Results.index', compact('data'));
    }


    public function sendMail(Request $request){

            $subject = 'Lead from Quiz';
             $data = array('name'=>request()->name, 'phone'=>request()->full_phone, 'email'=>request()->email, 'subject'=> $subject, 'budget'=> request()->budget, 'areas'=> request()->areas, 'purpose'=> request()->purpose, 'completion'=> request()->completion);

             Mail::send('mail', $data, function($message) {
                 $message->to('ncs.photo02@gmail.com', 'Lead from Quiz')->subject('New Lead from Quiz');
                 $message->from('info@empirehfbb.com', 'Empires Heights Properties');
              });
             echo "Basic Email Sent. Check your inbox.";

    }

    public function pdfview(Request $request)
    {

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

        // if($budget == null && $areas == null && $completion == null){

        //     $q = Projects::limit(5)->get()->toArray();

        //     $download = '/generate-pdf';
        // }elseif($budget == null && $areas !== null && $completion !== null){
        //     $q = DB::table('projects')->whereIn('area', $areas)
        //     ->where('completion', '=', $completion)
        //     ->get()
        //     ->toArray();

        // }elseif($areas == null && $budget !== null && $completion !== null){
        //     $q = Projects::where('completion', '=', $completion)
        //     ->where('budget', '=', $budget)
        //     ->get()
        //     ->toArray();

        // }elseif($completion == null && $budget !== null && $areas !== null){
        //     $q = DB::table('projects')->whereIn('area', $areas)
        //     ->where('budget', '=', $budget)
        //     ->get()
        //     ->toArray();

        // }elseif($areas !== null && $budget == null && $completion == null){
        //     $q = DB::table('projects')->whereIn('area', $areas)
        //     ->get()
        //     ->toArray();

        // }elseif($budget !== null && $areas == null && $completion == null){
        //     $q = Projects::where('budget', '=', $budget)
        //     ->get()
        //     ->toArray();

        // }elseif($completion !== null && $budget == null && $areas == null){
        //     $q = Projects::where('completion', '=', $completion)
        //     ->get()
        //     ->toArray();

        // }else{
        //     $q = DB::table('projects')->whereIn('area', $areas)
        //     ->where('completion', '=', $completion)
        //     ->where('budget', '=', $budget)
        //     ->get()
        //     ->toArray();

        // }
        if(count($q) == 0){
            $q = Projects::limit(5)->get()->toArray();
        }
        $q = json_encode($q);
        $data = json_decode($q, true);
        $pdf = PDF::loadView('Template.pdfview', compact('data'));
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('catalog-empires-heights-properties.pdf');
        // return view('template.pdfview', );
    }


    public function delete(){
        Projects::destroy(1,2,3,4,5,6);
    }

}
