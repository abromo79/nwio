<?php

use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WebsiteController::class, 'home'])->name('website.home');
Route::redirect('/login', '/admin/login')->name('login');
Route::get('/about-us', [WebsiteController::class, 'about'])->name('website.about');
Route::get('/programs/{slug}', [WebsiteController::class, 'program'])->name('website.programs.show');
Route::get('/projects/{status}', [WebsiteController::class, 'projects'])->name('website.projects.status');
Route::get('/research-innovation', [WebsiteController::class, 'research'])->name('website.research');
Route::get('/get-involved', [WebsiteController::class, 'getInvolved'])->name('website.get-involved');
Route::get('/news', [WebsiteController::class, 'news'])->name('website.news');
Route::get('/events', [WebsiteController::class, 'events'])->name('website.events');
Route::get('/our-team', [WebsiteController::class, 'team'])->name('website.team');
Route::get('/gallery', [WebsiteController::class, 'gallery'])->name('website.gallery');
Route::get('/contact-us', [WebsiteController::class, 'contact'])->name('website.contact');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
});

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [AdminPanelController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    Route::get('/about', [AdminPanelController::class, 'about'])->name('about');
    Route::post('/about', [AdminPanelController::class, 'storeAbout'])->name('about.store');
    Route::put('/about/{id}', [AdminPanelController::class, 'updateAbout'])->name('about.update');
    Route::delete('/about/{id}', [AdminPanelController::class, 'destroyAbout'])->name('about.destroy');

    Route::get('/programs', [AdminPanelController::class, 'programs'])->name('programs');
    Route::post('/programs', [AdminPanelController::class, 'storeProgram'])->name('programs.store');
    Route::put('/programs/{id}', [AdminPanelController::class, 'updateProgram'])->name('programs.update');
    Route::delete('/programs/{id}', [AdminPanelController::class, 'destroyProgram'])->name('programs.destroy');

    Route::get('/projects', [AdminPanelController::class, 'projects'])->name('projects');
    Route::post('/projects', [AdminPanelController::class, 'storeProject'])->name('projects.store');
    Route::put('/projects/{id}', [AdminPanelController::class, 'updateProject'])->name('projects.update');
    Route::delete('/projects/{id}', [AdminPanelController::class, 'destroyProject'])->name('projects.destroy');

    Route::get('/research', [AdminPanelController::class, 'research'])->name('research');
    Route::post('/research', [AdminPanelController::class, 'storeResearch'])->name('research.store');
    Route::put('/research/{id}', [AdminPanelController::class, 'updateResearch'])->name('research.update');
    Route::delete('/research/{id}', [AdminPanelController::class, 'destroyResearch'])->name('research.destroy');

    Route::get('/news', [AdminPanelController::class, 'news'])->name('news');
    Route::post('/news', [AdminPanelController::class, 'storeNews'])->name('news.store');
    Route::put('/news/{id}', [AdminPanelController::class, 'updateNews'])->name('news.update');
    Route::delete('/news/{id}', [AdminPanelController::class, 'destroyNews'])->name('news.destroy');

    Route::get('/events', [AdminPanelController::class, 'events'])->name('events');
    Route::post('/events', [AdminPanelController::class, 'storeEvent'])->name('events.store');
    Route::put('/events/{id}', [AdminPanelController::class, 'updateEvent'])->name('events.update');
    Route::delete('/events/{id}', [AdminPanelController::class, 'destroyEvent'])->name('events.destroy');

    Route::get('/team', [AdminPanelController::class, 'team'])->name('team');
    Route::post('/team', [AdminPanelController::class, 'storeTeam'])->name('team.store');
    Route::put('/team/{id}', [AdminPanelController::class, 'updateTeam'])->name('team.update');
    Route::delete('/team/{id}', [AdminPanelController::class, 'destroyTeam'])->name('team.destroy');

    Route::get('/gallery', [AdminPanelController::class, 'gallery'])->name('gallery');
    Route::post('/gallery', [AdminPanelController::class, 'storeGallery'])->name('gallery.store');
    Route::put('/gallery/{id}', [AdminPanelController::class, 'updateGallery'])->name('gallery.update');
    Route::delete('/gallery/{id}', [AdminPanelController::class, 'destroyGallery'])->name('gallery.destroy');

    Route::get('/get-involved', [AdminPanelController::class, 'getInvolved'])->name('get-involved');
    Route::delete('/get-involved/{id}', [AdminPanelController::class, 'destroyGetInvolved'])->name('get-involved.destroy');

    Route::get('/messages', [AdminPanelController::class, 'messages'])->name('messages');
    Route::delete('/messages/{id}', [AdminPanelController::class, 'destroyMessage'])->name('messages.destroy');

    Route::get('/users', [AdminPanelController::class, 'users'])->name('users');
    Route::post('/users', [AdminPanelController::class, 'storeUser'])->name('users.store');
    Route::put('/users/{id}', [AdminPanelController::class, 'updateUser'])->name('users.update');
    Route::delete('/users/{id}', [AdminPanelController::class, 'destroyUser'])->name('users.destroy');
});
