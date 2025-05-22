<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;

class MyJobApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('my_job_applications.index',
        [
            'applications' => auth()->user()->jobApplications()
                            ->with(['job' => fn ($query) => $query->withCount('jobApplications')->withTrashed()->withAvg('jobApplications', 'expected_salary') , 'job.employer'])
                            ->latest()->latest('id')->get()
        ]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobApplication $myJobApplication)
    {
        //
        $myJobApplication->delete();
        return redirect()->back()->with('success', 'Job Application deleted successfully');

    }
}
