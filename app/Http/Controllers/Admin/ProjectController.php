<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use App\Http\Requests\Project\StoreProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Auth::user()->projects()->orderByDesc('id')->paginate(6);

        return view('admin.projects.index', compact('projects'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $technologies = Technology::orderByDesc('id')->get();
        $types = Type::orderByDesc('id')->get();
        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Project\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $val_data = $request->validated();
        $slug = Project::generateSlug($val_data['title']);
        $val_data['slug'] = $slug;
        $val_data['user_id'] = Auth::id();

        if ($request->hasFile('link_cover')) {
            $image_path = Storage::put('uploads', $request->link_cover);
            $val_data['link_cover'] = $image_path;
        }

        $newProject = Project::create($val_data); //Gli assegno l'id dell'utente loggato

        if ($request->has('technologies')) {
            $newProject->technologies()->attach($request->technologies);
        }

        return to_route('admin.projects.index')->with('message', "Project: " . $val_data['title'] . " created succesfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        if (Auth::id() === $project->user_id) {
            return view('admin.projects.show', compact('project'));
        }
        abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $types = Type::orderByDesc('id')->get();
        $technologies = Technology::orderByDesc('id')->get();
        if (Auth::id() === $project->user_id) {
            return view('admin.projects.edit', compact('project', 'types', 'technologies'));
        }
        abort(403);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Project\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $val_data = $request->validated();
        $slug = Project::generateSlug($val_data['title']);
        $val_data['slug'] = $slug;

        if ($request->hasFile('link_cover')) {
            if ($project->link_cover) {
                Storage::delete($project->link_cover);
            }
            $image_path = Storage::put('uploads', $request->link_cover);
            $val_data['link_cover'] = $image_path;
        }

        $project->update($val_data);
        if ($request->has('technologies')) {
            $project->technologies()->sync($request->technologies);
        }
        return to_route('admin.projects.index')->with('message', "Project: $project->title update succesfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        if ($project->link_cover) {
            Storage::delete($project->link_cover);
        }
        $project->delete();
        return to_route('admin.projects.index')->with('message', "Project: $project->title deleted succesfully");
    }
}
