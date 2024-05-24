<?php

namespace App\Filament\Resources\DepartmentResource\Pages;

use App\Filament\Resources\DepartmentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Events\TestNotif;
use Filament\Notifications\Notification;

class ListDepartments extends ListRecords
{
    protected static string $resource = DepartmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->successNotificationTitle('Department added!')
                // ->after(function () {
                //     event(new TestNotif('Bwiset'));

                //     $recipient = auth()->user();

                //     Notification::make()
                //         ->title('TESTING POTA')
                //         ->sendToDatabase($recipient)
                //         ->broadcast($recipient);
                // }),
        ];
    }
}
