<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{   
    private $repository;
    public function __construct(Profile $profile)
    {
        $this->repository = $profile;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profiles = $this->repository->paginate();

        return view('admin.pages.profiles.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('profiles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int|string $id)
    {
        if (!$profile = $this->repository->find($id)) {
           return redirect()->back();
        }

        return view('admin.pages.profiles.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int|string $id)
    {
        if (!$profile = $this->repository->find($id)) {
            return redirect()->back();
        }

        $profile->fill($request->all());
        $profile->save();

        return redirect()->route('profiles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
