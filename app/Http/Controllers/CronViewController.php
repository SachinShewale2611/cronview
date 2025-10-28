<?php

namespace App\Http\Controllers;

use App\Services\CronScanner;
use Inertia\Inertia;

class CronViewController extends Controller
{
    public function index()
    {
        $tasks = CronScanner::getScheduledTasks();
        return Inertia::render('CronView/Index', [
            'tasks' => $tasks,
        ]);
    }
}
