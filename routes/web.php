<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\Users\LoginController;
use App\Http\Controllers\Users\LogoutController;
use App\Http\Controllers\Users\ProfileController;
use App\Http\Controllers\Users\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/search', [SearchController::class, 'search'])->name('search');

Route::get('/{user}/experience', [ExperienceController::class, 'index'])->name('experience');
Route::post('/{user}/experience', [ExperienceController::class, 'store'])->name('experience');
Route::get('/{user}/experience/view', [ExperienceController::class, 'view'])->name('experience.view');
Route::get('/{user}/experience/edit/{id}', [ExperienceController::class, 'edit'])->name('experience.edit');
Route::put('/{user}/experience/', [ExperienceController::class, 'update'])->name('experience.update');
Route::delete('/{user}/experience/delete/{id}', [ExperienceController::class, 'destroy'])->name('experience.delete');

Route::get('/{user}/comment', [CommentController::class, 'index'])->name('comment');
Route::post('/{user}/comment', [CommentController::class, 'store'])->name('comment');
Route::get('/{user}/comment/view', [CommentController::class, 'view'])->name('comment.view');
Route::get('/{user}/comment/edit/{id}', [CommentController::class, 'edit'])->name('comment.edit');
Route::put('/{user}/comment/{id}', [CommentController::class, 'update'])->name('comment.update');
Route::delete('/{user}/comment/delete/{id}', [CommentController::class, 'destroy'])->name('comment.delete');

Route::get('/{user}/project', [ProjectController::class, 'index'])->name('project');
Route::post('/{user}/project', [ProjectController::class, 'store'])->name('project');
Route::get('/{user}/project/view', [ProjectController::class, 'view'])->name('project.view');
Route::get('/{user}/project/edit/{id}', [ProjectController::class, 'edit'])->name('project.edit');
Route::put('/{user}/project/{id}', [ProjectController::class, 'update'])->name('project.update');
Route::delete('/{user}/project/delete/{id}', [ProjectController::class, 'destroy'])->name('project.delete');

Route::get('/{user}/skill', [SkillController::class, 'index'])->name('skill');
Route::post('/{user}/skill', [SkillController::class, 'store'])->name('skill');
Route::get('/{user}/skill/view', [SkillController::class, 'view'])->name('skill.view');
Route::get('/{user}/skill/edit/{id}', [SkillController::class, 'edit'])->name('skill.edit');
Route::put('/{user}/skill/{id}', [SkillController::class, 'update'])->name('skill.update');
Route::delete('/{user}/skill/delete/{id}', [SkillController::class, 'destroy'])->name('skill.delete');

Route::get('/{user}/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/{user}/contact/edit', [ContactController::class, 'edit'])->name('contact.edit');
Route::put('/{user}/contact', [ContactController::class, 'update'])->name('contact.update');

Route::get('/{user}/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/{user}/profile', [ProfileController::class, 'update'])->name('profile.update');

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register');