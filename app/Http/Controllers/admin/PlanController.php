<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

    public function store(Request $request)
    {   
        $data = $request->all();
        $data['url'] = Str::kebab($data['name']);
        $this->repository->create($data);

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

    public function destroy(int|string $id)
    {
        $plan = $this->repository->find($id);

        if (!$plan){
            return redirect()->back();
        }
        $plan->delete();
    
        return redirect()->route('plans.index');
    }
}
