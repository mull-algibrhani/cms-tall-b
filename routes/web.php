<?php

use App\Livewire\Blog\Archives;
use App\Livewire\Blog\Authors;
use App\Livewire\Blog\Categorys;
use App\Livewire\Blog\Drafts;
use App\Livewire\Blog\Posts;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware(['auth', 'verified'])->get('/blog/posts', Posts::class)->name('posts');
Route::middleware(['auth', 'verified'])->get('/blog/new-post', Posts::class)->name('new-post');
Route::middleware(['auth', 'verified'])->get('/blog/edit-post/{id}', Posts::class)->name('edit-post');
Route::middleware(['auth', 'verified'])->get('/blog/drafts', Drafts::class)->name('drafts');
Route::middleware(['auth', 'verified'])->get('/blog/categorys', Categorys::class)->name('categorys');
Route::middleware(['auth', 'verified'])->get('/blog/archives', Archives::class)->name('archives');
Route::middleware(['auth', 'verified'])->get('/blog/authors', Authors::class)->name('authors');
require __DIR__ . '/auth.php';