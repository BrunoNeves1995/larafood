<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Profile;
use Illuminate\Http\Request;

class PlanProfileController extends Controller
{
    private $repositoryPlan, $repositoryProfile;
    public function __construct(Plan $plan, Profile $profile)
    {
        $this->repositoryPlan = $plan;
        $this->repositoryProfile = $profile;
    }
}
