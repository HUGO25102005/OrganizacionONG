<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\vendor\Chatify\Api\MessagesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Ruta de ejemplo que ya tenías
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Rutas de Chatify
Route::group(['prefix' => 'chatify', 'middleware' => 'auth:api'], function () {
    Route::post('/auth', [MessagesController::class, 'pusherAuth'])->name('api.pusher.auth');
    Route::post('/idInfo', [MessagesController::class, 'idFetchData'])->name('api.idInfo');
    Route::post('/sendMessage', [MessagesController::class, 'send'])->name('api.send.message');
    Route::post('/fetchMessages', [MessagesController::class, 'fetch'])->name('api.fetch.messages');
    Route::get('/download/{fileName}', [MessagesController::class, 'download'])->name('api.'.config('chatify.attachments.download_route_name'));
    Route::post('/makeSeen', [MessagesController::class, 'seen'])->name('api.messages.seen');
    Route::get('/getContacts', [MessagesController::class, 'getContacts'])->name('api.contacts.get');
    Route::post('/star', [MessagesController::class, 'favorite'])->name('api.star');
    Route::post('/favorites', [MessagesController::class, 'getFavorites'])->name('api.favorites');
    Route::get('/search', [MessagesController::class, 'search'])->name('api.search');
    Route::post('/shared', [MessagesController::class, 'sharedPhotos'])->name('api.shared');
    Route::post('/deleteConversation', [MessagesController::class, 'deleteConversation'])->name('api.conversation.delete');
    Route::post('/updateSettings', [MessagesController::class, 'updateSettings'])->name('api.avatar.update');
    Route::post('/setActiveStatus', [MessagesController::class, 'setActiveStatus'])->name('api.activeStatus.set');
});