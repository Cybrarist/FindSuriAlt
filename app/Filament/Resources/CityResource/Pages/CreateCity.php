<?php

namespace App\Filament\Resources\CityResource\Pages;

use App\Filament\Resources\CityResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateCity extends CreateRecord
{
    protected static string $resource = CityResource::class;


    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id']=Auth::id();

        return $data;
    }
}
