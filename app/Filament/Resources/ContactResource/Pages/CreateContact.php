<?php

namespace App\Filament\Resources\ContactResource\Pages;

use App\Filament\Resources\ContactResource;
use App\Jobs\Testjob;
use Filament\Notifications\Notification;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateContact extends CreateRecord {
    protected static string $resource = ContactResource::class;

    protected function handleRecordCreation(array $data): Model {
        dispatch(new Testjob());
        return static::getModel()::create($data);
    }

    protected function getCreatedNotification(): ?Notification {
        return Notification::make()
            ->success()
            ->title('Contacto creado')
            ->body('El contacto se creo con exito!');
    }

}
