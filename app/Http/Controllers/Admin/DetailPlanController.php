<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetailPlan;
use App\Models\Plan;
use Illuminate\Http\Request;

class DetailPlanController extends Controller
{   
    protected $repository, $repositoryPlan;
    public function __construct(DetailPlan $detailPlan, Plan $plan)
    {
        $this->repository = $detailPlan;
        $this->repositoryPlan = $plan;
    }

    public function index(int|string $id)
    {
        if (!$plan = $this->repositoryPlan->find($id)) {
           return redirect()->back();
        }
        $details = $plan->details()->paginate()->toArray();
        // dd($details);
        
        return view('admin.pages.plans.details.index', compact('plan', 'details'));

    }

    public function create(int|string $id)
    {   
        if (!$plan = $this->repositoryPlan->find($id)) {
            return redirect()->back();
         }

        return view('admin.pages.plans.details.create', compact('plan'));
    }

    public function store(Request $request, int|string $id)
    {   
        if (!$plan = $this->repositoryPlan->find($id)) {
            return redirect()->back();
         }

         $plan->details()->create($request->all());
        return redirect()->route('plans.details.index', $plan->id);

    }
}
