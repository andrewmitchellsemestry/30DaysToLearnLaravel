<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class JobController extends Controller
{
    public function index()
    {
        Log::info('Jobs page visited');
        // This is an example of eager loading. We are getting all the necessary data that we want to manipulate. Don't just use the old method of just passing through jobs as data variable of the return view section

        // Paginates all of the records
        //$jobs = Job::with('employer')->paginate(10);

        // Cursor based pagination will mess up the url
        //$jobs = Job::with('employer')->cursorPaginate(10);

        //Saves loading all of the page numbers
        $jobs = Job::with('employer')->latest('updated_at')->simplePaginate(10);

        return view(
            'jobs.index',
            [
                'jobs' => $jobs
            ]
        );
        /**
         * return view(
         *     'jobs', [
         *          'jobs' => Job:all()
         *      ]
         * )
         * 
         * This is the method that does not use eager loading. It will run an SQL query for EVERY job.
         */
    }

    public function create()
    {
        Log::info('Job create page visited');
        return view('jobs.create');
    }

    public function show(Job $job)
    {
        Log::info('Job specific page visited');
        return view('jobs.show', ['job' => $job]);
    }

    public function store()
    {
        Log::info('Job create request');
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required', 'numeric:strict']
        ]);

        // The request() object lets us access data from the form data
        Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1
        ]);

        return redirect('/jobs');
    }

    public function edit(Job $job)
    {
        Log::info('Job edit request');
        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Job $job)
    {
        Log::info('Job update request');
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required', 'numeric:strict']
        ]);

        $job->update([
            'title' => request('title'),
            'salary' => request('salary')
        ]);

        return redirect('/jobs/' . $job->id);
    }

    public function destory()
    {
        Log::info('Job delete request');
        $job->delete();
        return redirect('/jobs');
    }
}
