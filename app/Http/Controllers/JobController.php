<?php

namespace App\Http\Controllers;

use Auth;
use App\Job;
use App\Http\Requests\JobStoreRequest;
use App\Http\Requests\JobUpdateRequest;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::where('user_id', '=', Auth::id())
                    ->latest()
                    ->paginate(5);

        return view('jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobStoreRequest $request)
    {
        $validated = $request->validated();

        Job::create($validated);

        return redirect()
                ->route('jobs.index')
                ->with('success','Job posted successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        return view('jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        if($job->user_id !== Auth::id()){
            return redirect()
                    ->route('jobs.index')
                    ->with('error', 'Unauthorize to edit.');
        }

        return view('jobs.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(JobUpdateRequest $request, Job $job)
    {
        
        $validated = $request->validated();

        if($job->user_id !== Auth::id()) {
            return back()
                    ->with('error', 'unauthorize to edit');            
        }

        $job->update($validated);

        return redirect()
            ->route('jobs.index')
            ->with('success', 'Job updated successfully!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        if($job->user_id !== Auth::id()){
            return back()->with('error', 'Unauthorize to delete');
        }

        $job->delete();
        
        return redirect()
                ->route('jobs.index')
                ->with('success', 'Job deleted.');
        
    }
}