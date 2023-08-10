<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class SiteController extends Controller
{   
    private $repositoryPlan;
    public function __construct(Plan $plan)
    {
        $this->repositoryPlan = $plan;
    }

    public function index() 
    {   
        $plans = $this->repositoryPlan->with('details')->get();
        return view('site.pages.home.index', compact('plans'));
    }
}
