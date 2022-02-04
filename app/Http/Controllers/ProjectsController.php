<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Budget;
use App\Models\Area;
use App\Models\Purpose;
use App\Models\Completion;
use App\Models\Projects;
use Image;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ProjectsController extends Controller
{
    public function index(){

    }

    public function create(){

        $budget = Budget::all();
        $areas = Area::all();
        $purpose = Purpose::all();
        $completion = Completion::all();
        return view('Admin.Projects.create', compact('budget', 'areas', 'purpose', 'completion'));
    }

    public function edit($id){

        $data = Projects::find($id)->toArray();
        $budget = Budget::all();
        $areas = Area::all();
        $purpose = Purpose::all();
        $completion = Completion::all();
        return view('Admin.Projects.edit', compact('budget', 'areas', 'purpose', 'completion', 'data'));
    }

    public function store(Request $request){


        // dd(request()->all());
        //Singe Image
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

        //Gallery
        if($request->hasFile('gallery')){
            $gal = array();
            foreach($request->file('gallery') as $file){
                $image = $file;
                $input['gallery'] = time().'.'.$image->getClientOriginalExtension();

                $destinationPath = public_path('/thumbnail');

                $imgFile = Image::make($image->getRealPath());

                $imgFile->resize(400, 400, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$input['gallery']);

                $destinationPath = public_path('/uploads');
                $image->move($destinationPath, $input['gallery']);

                $gal[] = $input['gallery'];
            }

        }
        $p = new Projects;
        $p->name = $request->name;
        $p->price = $request->price;
        $p->content = $request->content;
        $p->size = $request->size;
        $p->budget = $request->budget;
        $p->area = $request->area;
        $p->purpose = $request->purpose;
        $p->completion = $request->completion;
        $p->language = $request->language;
        $p->handover = $request->handover;
        if($request->hasFile('image')){
        $p->image = $input['file'];
        }
        if($request->hasFile('gallery')){
        $p->gallery = json_encode($gal);
        }
        $p->save();
        return redirect('/admin/projects');
    }


    public function update(Request $request, $id){
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

        //Gallery
        if($request->hasFile('gallery')){
            $gal = array();
            foreach($request->file('gallery') as $file){
                $image = $file;
                $input['gallery'] = time().'.'.$image->getClientOriginalExtension();

                $destinationPath = public_path('/thumbnail');

                $imgFile = Image::make($image->getRealPath());

                $imgFile->resize(400, 400, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$input['gallery']);

                $destinationPath = public_path('/uploads');
                $image->move($destinationPath, $input['gallery']);

                $gal[] = $input['gallery'];
            }

        }
        $p =  Projects::find($id);
        $p->name = $request->name;
        $p->price = $request->price;
        $p->content = $request->content;
        $p->size = $request->size;
        $p->budget = $request->budget;
        $p->area = $request->area;
        $p->purpose = $request->purpose;
        $p->completion = $request->completion;
        $p->language = $request->language;
        $p->handover = $request->handover;
        $p->image = $input['file'];
        $p->gallery = json_encode($gal);
        $p->save();
        return redirect('/admin/projects');
    }


}
