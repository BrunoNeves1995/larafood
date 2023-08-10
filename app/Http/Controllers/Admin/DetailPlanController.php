<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateDetailPlan;
use App\Models\DetailPlan;
use App\Models\Plan;

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

    public function store(StoreUpdateDetailPlan $request, int|string $id)
    {   
        if (!$plan = $this->repositoryPlan->find($id)) {
            return redirect()->back();
         }

         $plan->details()->create($request->all());
        return redirect()->route('plans.details.index', $plan->id);
    }

    public function edit(int|string $idPlan, int|string $id)
    {   
        $plan = $this->repositoryPlan->find($idPlan);
        $detail = $this->repository->find($id);

        if (!$plan || !$detail) {
            return redirect()->back();
        }
        return view('admin.pages.plans.details.edit', compact('plan', 'detail'));

    }

    public function update(StoreUpdateDetailPlan $request, int|string $idPlan, int|string $id)
    {
        $plan = $this->repositoryPlan->find($idPlan);
        $detail = $this->repository->find($id);

        if (!$plan || !$detail) {
            return redirect()->back();
        }

        $detail->fill($request->all());
        $detail->save();

        return redirect()->route('plans.details.index', $plan->id);
    }

    public function show(int|string $idPlan, int|string $id)
    {
        $plan = $this->repositoryPlan->find($idPlan);
        $detail = $this->repository->find($id);
        if (!$plan || !$detail) {
            return redirect()->back();
        }
        return view('admin.pages.plans.details.show', compact('plan', 'detail'));
    }

    public function destroy(int|string $idPlan, int|string $id)
    {
        $plan = $this->repositoryPlan->find($idPlan);
        $detail = $this->repository->find($id);

        if (!$plan || !$detail) {
            return redirect()->back();
        }

        $detail->delete();
        return redirect()
            ->route('plans.details.index', $plan->id)
            ->with('message', 'Registro foi deletao com sucesso!');
    
    }
}
