<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::latest()->with('employer', 'tags')->get()->groupBy('featured');
        return view('job.index', [
        'jobs' => $jobs[0],    
        'featuredJobs' => $jobs[1],  
            'tags' => \App\Models\Tag::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('job.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $attributes = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'salary' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'schedule' => ['required', Rule::in(['full-time', 'part-time', 'contract'])],
            'url' => ['required', 'url'],
            // 'featured' => ['boolean'],
            'tags' => ['nullable']
        ]);

       

        $attributes['featured'] = $request->has('featured');
        
        

        $job = Auth::user()->employer->jobs()->create(Arr::except($attributes , 'tags'));

        if($attributes['tags'] ?? false){
           foreach (explode(',',$attributes['tags']) as $tag) {
               // Handle each tag
               $job->tag($tag);
           }
        }
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        //
    }
}
