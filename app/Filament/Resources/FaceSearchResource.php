<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FaceSearchResource\Pages;
use App\Filament\Resources\FaceSearchResource\RelationManagers;
use App\Models\FaceSearch;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class FaceSearchResource extends Resource
{
    protected static ?string $model = FaceSearch::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    public static function canViewAny(): bool
    {
        return Auth::check();
    }

    public static function canDelete(Model $record): bool
    {
        return Auth::check();
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->disk('temporary_images_for_search')
                    ->visibility('private')
                    ->height(150)
                    ->circular(),

                Tables\Columns\TextColumn::make('email')->searchable()
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make()
            ])
            ;
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFaceSearches::route('/'),
        ];
    }
}
