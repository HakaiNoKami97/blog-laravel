<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\BlogIndex;

Route::get('/', BlogIndex::class);