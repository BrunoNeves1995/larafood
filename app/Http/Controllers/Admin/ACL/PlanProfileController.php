<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Profile;
use Illuminate\Http\Request;

class PlanProfileController extends Controller
{   
    private $repositoryplan, $repositoryprofile;
    public function __construct(plan $plan, Profile $profile)
    {
        $this->repositoryplan = $plan;
        $this->repositoryprofile = $profile;
    }


    /** 
     * Get profiles not linked to plans
    */
    public function profiles(int|string $idplan)
    {   
        if (!$plan = $this->repositoryplan->find($idplan)) {
            return redirect()->back();
        }

        $profiles = $plan->profiles()->paginate();

        return view('admin.pages.plans.profiles.profile', compact('plan', 'profiles'));
    }   

    /**
     * Get profiles not linked to plans
    */
    public function profileUnlinkedPlan(Request $request, int|string $idplan)
    {
        if (!$plan = $this->repositoryplan->find($idplan)) {
            return redirect()->back();
        }

        $filters = $request->except('_token');

        $profiles = $this->repositoryprofile->profilesNotLinkedPlan($idplan, $request->filter);


        return view('admin.pages.plans.profiles.available', compact('plan', 'profiles', 'filters'));
    }

    /** 
     * unlinked the profile from plan 
    */
    public function filterProfilesAvailable(Request $request, int|string $idplan)
    {   
        $plan = $this->repositoryplan->find($idplan);
        $filters = $request->except('_token');
        $profiles = $this->repositoryplan->filterPlansAvailableSearch($idplan, $request->filter);

        return view('admin.pages.plans.profiles.profile', compact('plan', 'profiles', 'filters'));
    }


    /**
     * linked profile in plan 
    */
    public function addProfilePlan(Request $request, int|string $idPlan)
    {
        if (!$plan = $this->repositoryplan->find($idPlan)) {
            return redirect()->back();
        }

        if (!$request->profiles || count($request->profiles) === 0) {
            return redirect()->back()->with('info', 'É preciso selecionar pelo menos um perfil');
        }
        // add N x N
        $plan->profiles()->attach($request->profiles);

        return redirect()->route('plans.profiles.index', $plan->id);
    }

     /**
     * unlinked the profile in plan
    */
    public function detachProfilePlan(int|string $idplan, int|string $idprofile) 
    {   
        $plan = $this->repositoryplan->find($idplan);
        $profile = $this->repositoryprofile->find($idprofile);

        if (!$plan || !$profile) {
            return redirect()->back();
        }

        $plan->profiles()->detach([$plan->id,$profile->id]);

        return redirect()->route('plans.profiles.index', $plan->id);
    }

    // /** 
    //  * Lista os plano vinculado vinculado um perfil
    // */
    // public function profiles(int|string $idprofile)
    // {   
    //     if (!$profile = $this->repositoryprofile->find($idprofile)) {
    //         return redirect()->back();
    //     }

    //     $plans = $profile->plans()->paginate();

        
    //     return view('admin.pages.profiles.plans.plan', compact('profile', 'plans'));
    // }

    // /** 
    //  * unlinked the profile from plan 
    // */
    // public function detachprofileplan(int|string $idplan, int|string $idprofile) 
    // {   
    //     $plan = $this->repositoryplan->find($idplan);
    //     $profile = $this->repositoryprofile->find($idprofile);

    //     if (!$plan || !$profile) {
    //         return redirect()->back();
    //     }

    //     $plan->profiles()->detach([ $plan->id,$profile->id]);

    //     return redirect()->route('plans.profiles.index', $plan->id);
    // }   
}
