<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function filterByLocation($location)
{
    $tasks = Task::where('procedure_location', $location)->get();
    return view('tasks.index', compact('tasks'));
}

}
