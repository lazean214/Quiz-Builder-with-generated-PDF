<?php
/**
 *  Quiz Builder Helper File
 *
 */

use App\Models\Budget;
use App\Models\Area;
use App\Models\Purpose;
use App\Models\Completion;
use App\Models\quiz;
use App\Models\Questionaire;
use App\Models\Result;
use App\Models\Projects;

function downloadBrochure($name, $budget, $purpose, $areas, $deadline){

    /**
     *  Select Media where budget = $budget && purpose = $purpose && $areas Like, $handover = $deadline;
     *
     */


 }


 function getImage($name){
    return Area::where('name', '=', $name)->get()->toArray();
 }



 function settings($setting){

    switch ($setting) {
        case "budget":
            $data = Budget::all();
            return $data;
          break;
        case "areas":
            $data = Area::all();
            return $data;
          break;
        case "purpose":
            $data = Purpose::all();
            return $data;
          break;
        case "completion":
            $data = Completion::all();
            return $data;
            break;

      }
 }


 function movingToHandover($param){

    if($param == 'This year'){
        return 'completed';
    }else{
        $date = explode(' - ', $param);
        return ($date);
    }

 }



