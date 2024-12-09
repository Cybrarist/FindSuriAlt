<?php

namespace App\Filament\Resources\ProvinceResource\Pages;

use App\Filament\Resources\ProvinceResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateProvince extends CreateRecord
{
    protected static string $resource = ProvinceResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id']=Auth::id();
        return $data;
    }
}
