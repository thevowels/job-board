<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class JobApplicationController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Job $job)
    {
        Gate::authorize('apply', $job);
        return view('job_applications.create', compact('job'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Job $job)
    {
        Gate::authorize('apply', $job);
        $data = $request->validate([
            'expected_salary' => 'required|numeric|min:5000|max:200000',
        ]);

        $job->jobApplications()->create([
            ...$data,
            'user_id' => $request->user()->id,
        ]);

        return redirect()->route('jobs.show', $job)
            ->with('success', 'Job application created successfully.');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
