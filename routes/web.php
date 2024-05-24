<?php

use Illuminate\Support\Facades\Route;
use Filament\Notifications\Notification;
use Filament\Notifications\Events\DatabaseNotificationsSent;
use App\Events\TestNotif;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/testpusher', function () {
    return view('testpusher');
});
// Route::get('test', function () {
//     $recipient = auth()->user();

//     \Filament\Notifications\Notification::make()
//         ->title('TESTING POTA')
//         ->sendToDatabase($recipient);


//     dd('BWISET');

// })->middleware('auth');

// Route::get('/trigger-test-notif', function () {

//     $user = auth()->user();
//     Log::info('User: ', ['user' => $user]);

//     if ($user) {
//         Notification::make()
//             ->title('Gumana ka pls')
//             ->success()
//             ->send()
//             ->sendToDatabase($user);

//         event(new DatabaseNotificationsSent($user));
//         return response()->json(['status' => 'Event triggered!']);
//     } else {
//         return response()->json(['status' => 'No authenticated user!'], 401);
//     }

// })->middleware('auth');




Route::get('/trigger-test-notif', function () {
    $user = auth()->user();
    Log::info('Route accessed by user: ' . ($user ? $user->id : 'Guest'));

    if ($user) {
        Log::info('Dispatching TestNotif event');
        event(new TestNotif('Bwiset'));
        return response()->json(['status' => 'Event triggered!']);
    } else {
        return response()->json(['status' => 'No authenticated user!'], 401);
    }
});
