<?php

use App\Models\Project;
use App\Models\ProjectUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/projects', function () {
    $projects = Auth::user()->projects;
    return view('projects', [
        'projects' => $projects
    ]);
})->name('projects');


Route::get('/newproject', function () {
    return view('newproject');
})->name('newproject');

Route::get('/editproject/{project_id?}', function ($project_id = null) {
    $project = Project::find($project_id);
    return view('editproject', [
        'project' => $project
    ]);
})->name('editproject');

Route::put('/saveproject/{project_id?}', function (Request $request, $project_id = null) {
    $project = Project::find($project_id);
    if ($project->leader == Auth::user()->getId()) {
        $project->name = $request->name;
        $project->description = $request->description;
        $project->price = $request->price;
        $project->start = $request->start;
        $project->end = $request->end;
    }
    $project->completed = $request->completed;
    $project->save();
    return redirect('/projects');
})->name('saveproject');

Route::get('/users/{project_id?}', function($project_id = null) {
    $users = User::orderBy('created_at', 'asc')->get();
    return view('users', [
        'users' => $users,
        'project_id' => $project_id
    ]);
})->name('users');

Route::post('/adduser', function (Request $request) {
    $project_user = new ProjectUser();
    $project_user->user_id = $request->user_id;
    $project_user->project_id = $request->project_id;
    $project_user->save();
    return redirect('/projects');
})->name('adduser');

Route::post('/project', function (Request $request) {
    $project = new Project;
    $project->name = $request->name;
    $project->description = $request->description;
    $project->price = $request->price;
    $project->completed = $request->completed;
    $project->start = $request->start;
    $project->end = $request->end;
    $project->leader = Auth::user()->getId();
    $project->save();

    $project_user = new ProjectUser();
    $project_user->user_id = Auth::user()->getId();
    $project_user->project_id = $project->id;
    $project_user->save();
    return redirect('/projects');
})->name('project');
