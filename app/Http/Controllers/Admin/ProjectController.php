<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Type;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderByDesc('id')->get();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $technologies = Technology::all();
        $types = Type::all();
        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $val_data = $request->validated();
        if ($request->hasFile('cover_image')){
            $img_path = Storage::disk('public')->put('uploads', $request['cover_image']);
            $val_data['cover_image'] =   $img_path;
        }
        $slug_data = Project::createSlug($val_data['title']);
        $val_data['slug'] =  $slug_data;
        $project = Project::create($val_data);
        if ($request->has('technologies')) {
            $project->technologies()->attach($val_data['technologies']);
        }

        return redirect()->route('admin.projects.index')->with('message', "$project->title add successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $technologies = Technology::all();
        $types = Type::all();
        return view('admin.projects.edit', compact('project', 'types','technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $val_data = $request->validated();

        if($request['cover_image']){
            if ($project['cover_image']) {
                Storage::disk('public')->delete($project->cover_image);
            }
            $img_path = Storage::disk('public')->put('uploads', $request['cover_image']);
            $val_data['cover_image'] =   $img_path;
        }


        $slug_data = Project::createSlug($val_data['title']);
        $val_data['slug'] =  $slug_data;
        $project->update($val_data);
        if ($request->has('technologies')) {
            $project->technologies()->sync($val_data['technologies']);
        } else {
            $project->technologies()->sync([]);
        }
        
        return redirect()->route('admin.projects.index')->with('message', "$project->title update successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        if ($project['cover_image']) {
            Storage::disk('public')->delete($project->cover_image);
        }
        $project->delete();
        return redirect()->route('admin.projects.index')->with('message', "$project->title deleted successfully");
    }
}
