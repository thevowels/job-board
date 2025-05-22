<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EmployerController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Employer::class);
        return view('employer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', Employer::class);
        $data = $request->validate([
            'company_name' => ['required', 'string', 'max:255'],
        ]);
        $request->user()->employer()->create($data);

        return redirect(route('jobs.index'))
            ->with('success', 'Your employer account created successfully.');
    }


}
