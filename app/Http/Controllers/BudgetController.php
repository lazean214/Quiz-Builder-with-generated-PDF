<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Budget;

class BudgetController extends Controller
{
    public function index(){

        return view('Admin.Settings.index');
    }
}
