<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use App\Models\Picture;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CompanyResource::collection(Company::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {


        $image = $request->image; //request()->file('image');
        $imageName = $image->getClientOriginalName();
        $imageName = time() . '_' . $imageName;
        $image->move(public_path('/images'), $imageName);

        $project = new Company();
        $project->image = $imageName;
        $project->title = $request->title;
        $project->description = $request->description;
        $project->client = $request->client;
        $project->project_url = $request->project_url;
        $project->category = $request->category;
        $project->save();

        if ($request->hasFile('files')) {

            foreach ($request->file('files') as $file) {

                Log::info($file->getClientOriginalName());
                $imageName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('/images'), $imageName);

                Picture::create([
                    'project_id' => $project->id,
                    'picture' => $imageName,
                    'created_at' => Carbon::now()
                ]);
            }
        }

        return new CompanyResource($project);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {

        $pictures = Picture::where('project_id', $company->id)->get();
        $project
            = new CompanyResource($company);
        return ["project" => $project, "pictures" => $pictures];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {

        $path = public_path() . '/images/';

        //code for remove old image
        $file_old = $path . $request->image;
        unlink($file_old);

        //code for add new image
        $image = $request->new_image;
        $imageName = $image->getClientOriginalName();
        $imageName = time() . '_' . $imageName;
        $image->move(public_path('/images'), $imageName);

        $company->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
            'client' => $request->client,
            'project_url' => $request->project_url,
            'category' => $request->category
        ]);

        return new CompanyResource($company);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return response()->noContent();
    }
}
