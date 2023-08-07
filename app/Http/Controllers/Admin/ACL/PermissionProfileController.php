<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Profile;
use Illuminate\Http\Request;

class PermissionProfileController extends Controller
{   
    private $repositoryProfile, $repositoryPermission;
    public function __construct(Profile $profile, Permission $permission)
    {
        $this->repositoryProfile = $profile;
        $this->repositoryPermission = $permission;
    }

    // Lista as permissões de 1 perfil
    public function permissions(int|string $idProfile)
    {   
        $profile = $this->repositoryProfile->find($idProfile);

        if (!$profile) {
            return redirect()->back();
        }

        $permissions = $profile->permissions()->paginate();

        return view('admin.pages.profiles.permissions.index', compact('profile', 'permissions'));
    }
}
