<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\CronViewController;

Route::get('/cronview', [CronViewController::class, 'index'])
    ->name('cronview.index');

