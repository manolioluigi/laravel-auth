<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Facade\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Project::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $form_data = $request->validated();
        $slug = Project::generateSlug($request->title);
        $form_data['slug'] = $slug;

        $newProject = new Project();
        $newProject->fill($form_data);
        $newProject->save();

        return redirect()->route('admin.posts.index')->with('message', 'Project creato correttamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Project $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $post)
    {
        //
    }
}