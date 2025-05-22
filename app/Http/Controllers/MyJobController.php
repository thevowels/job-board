<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MyJobController extends Controller
{
    //


    public function index()
    {
        Gate::authorize('viewAnyEmployer', Job::class);
        return view('my_job.index',[
            'jobs' => auth()->user()
                ->employer
                ->jobs()
                ->withTrashed()
                ->with(['employer', 'jobApplications', 'jobApplications.user'])
                ->get()

        ]);
    }

    public function create()
    {
        Gate::authorize('create', Job::class);
        return view('my_job.create');
    }
    public function store(JobRequest $request)
    {
        $data = $request->validated();

        auth()->user()->employer->jobs()->create($data);
        return redirect()->route('my-jobs.index')
            ->with('success','Job created successfully.');
    }

    public function edit(Request $request, Job $myJob){
        Gate::authorize('update', $myJob);
        return view('my_job.edit',[
            'job' => $myJob
        ]);
    }

    public function update(JobRequest $request, Job $myJob){
        Gate::authorize('update', $myJob);
        $data = $request->validated();
        $myJob->update($data);

        return redirect()->route('my-jobs.index')
            ->with('success','Job updated successfully.');
    }

    public function destroy(Job $myJob)
    {
        Gate::authorize('delete', $myJob);
        $myJob->delete();
        return redirect()->route('my-jobs.index')
            ->with('success','Job deleted successfully.');
    }
}
