<?php

namespace App\Filament\Resources\FaceSearchResource\Pages;

use App\Filament\Resources\FaceSearchResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFaceSearch extends EditRecord
{
    protected static string $resource = FaceSearchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
