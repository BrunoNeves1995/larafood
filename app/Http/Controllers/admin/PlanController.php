<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePlan;
use App\Models\Plan;
use Illuminate\Http\Request;


class PlanController extends Controller
{   
    private $repository;
    public function __construct(Plan $plan)
    {
        $this->repository = $plan;
    }
    public function index()
    {   
        $plans = $this->repository->latest()->paginate(15);

        return view('admin.pages.plans.index', compact('plans'));
    }

    public function create()
    {
        return view('admin.pages.plans.create');
    }

    public function store(StoreUpdatePlan $request)
    {   
        $this->repository->create($request->all());

        return redirect()->route('plans.index');
    }

    public function show(int|string $id)
    {
        $plan = $this->repository->find($id);

        if (!$plan){
            return redirect()->back();
        }
        
        return view('admin.pages.plans.show', compact('plan'));
    }

    public function edit(int|string $id)
    {
        $plan = $this->repository->find($id);

        if (!$plan){
            return redirect()->back();
        }
        
        return view('admin.pages.plans.edit', compact('plan'));
    }

    public function update(StoreUpdatePlan $request, int|string $id)
    {
        $plan = $this->repository->find($id);

        if (!$plan){
            return redirect()->back();
        }
        
        $plan->fill($request->all());
        $plan->save();
        return redirect()->route('plans.index');
    }

    public function destroy(int|string $id)
    {
        $plan = $this->repository->find($id);

        if (!$plan){
            return redirect()->back();
        }
        $plan->delete();
    
        return redirect()->route('plans.index');
    }

    public function search(Request $request)
    {   
        $filters = $request->only(['filter']);

       $plans = $this->repository->search($request->filter);

       return view('admin.pages.plans.index', compact('plans', 'filters'));
    }
}
