<?php

use Illuminate\Support\Facades\Route;
use Filament\Notifications\Notification;
use Filament\Notifications\Events\DatabaseNotificationsSent;
use App\Events\TestNotif;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('test', function () {
//     $recipient = auth()->user();

//     \Filament\Notifications\Notification::make()
//         ->title('TESTING POTA')
//         ->sendToDatabase($recipient);
    
    
//     dd('BWISET');

// })->middleware('auth');

Route::get('/trigger-test-notif', function () {
    // $data = ['message' => 'This is a test notification'];

    event(new TestNotif('Bwiset'));

    // $recipient = auth()->user();

    // \Filament\Notifications\Notification::make()
    //     ->title('TESTING POTA')
    //     ->sendToDatabase($recipient);

    // dd(response());
    return response()->json(['status' => 'Event triggered!']);
});