<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePermission;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    private $repository;
    public function __construct(Permission $permission)
    {
        $this->repository = $permission;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = $this->repository->paginate();
     
        return view('admin.pages.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdatePermission $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('permissions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(int|string $id)
    {
        if (!$permission = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.permissions.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int|string $id)
    {
        if (!$permission = $this->repository->find($id)) {
           return redirect()->back();
        }

        return view('admin.pages.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdatePermission $request, int|string $id)
    {
        if (!$permission = $this->repository->find($id)) {
            return redirect()->back();
        }

        $permission->fill($request->all());
        $permission->save();

        return redirect()->route('permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int|string $id)
    {
        if (!$permission = $this->repository->find($id)) {
            return redirect()->back();
        }
        $permission->delete();
        return redirect()
        ->route('permissions.index');
    }

    public function search(Request $request)
    {   
        $filters = $request->except('_token');
       $permissions = $this->repository->search($request->filter);

       return view('admin.pages.permissions.index', compact('permissions', 'filters'));
    }
}
