<?php

namespace App\Filament\Resources\PersonResource\Pages;

use App\Filament\Resources\PersonResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreatePerson extends CreateRecord
{
    protected static string $resource = PersonResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id']=Auth::id();
        return $data;
    }
}
