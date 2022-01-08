<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use App\Models\Picture;
use App\Models\Technique;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProjectResource::collection(Project::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {



        if ($request->hasFile('image')) {
            $image = $request->image;
            $imageName = $image->getClientOriginalName();
            $imageName = time() . '_' . $imageName;
            $image->move(public_path('/images'), $imageName);
        } else {
            $imageName = 'default.jpg';
        }

        $project = new Project();
        $project->image = $imageName;
        $project->title = $request->title;
        $project->description = $request->description;
        $project->client = $request->client;
        $project->project_url = $request->project_url;
        $project->category = $request->category;
        $project->save();
        //uploading gallery
        if ($request->hasFile('files')) {

            foreach ($request->file('files') as $file) {

                $imageName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('/images'), $imageName);

                Picture::create([
                    'project_id' => $project->id,
                    'picture' => $imageName,
                    'created_at' => Carbon::now()
                ]);
            }
        }
        // creating techniques
        if ($request->has('techniques')) {
            foreach ($request->techniques as $technique) {
                Technique::create([
                    'project_id' => $project->id,
                    'technique' => $technique,
                    'created_at' => Carbon::now()
                ]);
            }
        }

        return new ProjectResource($project);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $Project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $Project)
    {

        $pictures = Picture::where('project_id', $Project->id)->get();
        $project
            = new ProjectResource($Project);
        $techniques = Technique::where('project_id', $Project->id)->get();
        return ["project" => $project, "pictures" => $pictures, 'techniques' => $techniques];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $Project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $Project)
    {
        Log::info($request);

        $path = public_path() . '/images/';
        if ($request->new_image != 'null') { //code for remove old image
            $file_old = $path . $request->image;
            unlink($file_old);

            //code for add new image
            $image = $request->new_image;
            $imageName = $image->getClientOriginalName();
            $imageName = time() . '_' . $imageName;
            $image->move(public_path('/images'), $imageName);
        } else {
            $imageName = $request->image;
        }
        DB::table('techniques')->where('project_id', $Project->id)->delete();

        if ($request->has('techniques')) {
            foreach ($request->techniques as $technique) {
                Technique::create([
                    'project_id' => $Project->id,
                    'technique' => $technique,
                    'created_at' => Carbon::now()
                ]);
            }
        }

        $Project->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
            'client' => $request->client,
            'project_url' => $request->project_url,
            'category' => $request->category
        ]);

        return new ProjectResource($Project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $Project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return response()->noContent();
    }
}
