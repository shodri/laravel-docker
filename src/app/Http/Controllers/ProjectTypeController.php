<?php

namespace App\Http\Controllers;

use App\Models\ProjectType;
use App\Http\Requests\StoreProjectTypeRequest;
use App\Http\Requests\UpdateProjectTypeRequest;
use Illuminate\Http\Request;

class ProjectTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ProjectType $projectType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectType $projectType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectTypeRequest $request, ProjectType $projectType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectType $projectType)
    {
        //
    }

    /**
     * Retrive the list of types o e project class in json format.
     */
    public function json($class_id)
    {
        return ProjectType::select('id', 'name')
                          ->where('project_class_id', $class_id)
                          ->orderBy('name','asc')
                          ->get();
    }
}
