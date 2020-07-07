<?php

namespace App\Http\Controllers;

use App\Task;
use App\TaskCategory;
use Illuminate\Http\Request;

class FETaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taskCategories = TaskCategory::with('nonArchivedTasks')->orderBy('id')->get();

        return view('fe.index', compact('taskCategories'));
    }
}
