<?php

use App\Models\Job;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    Log::info('Welcome page visited');
    $jobs = Job::all();
    dd($jobs[0]);
    return view('home');
});

Route::get('/jobs', function () {
    Log::info('Jobs page visited');
    // This is an example of eager loading. We are getting all the necessary data that we want to manipulate. Don't just use the old method of just passing through jobs as data variable of the return view section
    
    // Paginates all of the records
    //$jobs = Job::with('employer')->paginate(10);
    
    // Cursor based pagination will mess up the url
    //$jobs = Job::with('employer')->cursorPaginate(10);

    //Saves loading all of the page numbers
    $jobs = Job::with('employer')->latest()->simplePaginate(10);
    
    return view(
        'jobs.index', [
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
});

Route::get('/jobs/create', function () {
    Log::info('Job create page visited');
    return view('jobs.create');
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    Log::info('Job specific page visited');
    return view('jobs.show', ['job' => $job]);
});

Route::post('/jobs', function() {
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'] 
    ]);

    // The request() object lets us access data from the form data
    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);

    return redirect('/jobs');
});

Route::get('/contact', function () {
    Log::info('Contact page visited');
    return view('contact');
});

Route::get('/info', function () {
    Log::info('Phpinfo page visited');
    return phpinfo();
});

Route::get('/health', function () {
    $status = [];

    // Check Database Connection
    try {
        DB::connection()->getPdo();
        // Optionally, run a simple query
        DB::select('SELECT 1');
        $status['database'] = 'OK';
    } catch (\Exception $e) {
        $status['database'] = 'Error';
    }

    // Check Redis Connection
    try {
        Cache::store('redis')->put('health_check', 'OK', 10);
        $value = Cache::store('redis')->get('health_check');
        if ($value === 'OK') {
            $status['redis'] = 'OK';
        } else {
            $status['redis'] = 'Error';
        }
    } catch (\Exception $e) {
        $status['redis'] = 'Error';
    }

    // Check Storage Access
    try {
        $testFile = 'health_check.txt';
        Storage::put($testFile, 'OK');
        $content = Storage::get($testFile);
        Storage::delete($testFile);

        if ($content === 'OK') {
            $status['storage'] = 'OK';
        } else {
            $status['storage'] = 'Error';
        }
    } catch (\Exception $e) {
        $status['storage'] = 'Error';
    }

    // Determine overall health status
    $isHealthy = collect($status)->every(function ($value) {
        return $value === 'OK';
    });

    $httpStatus = $isHealthy ? 200 : 503;

    return response()->json($status, $httpStatus);
});
