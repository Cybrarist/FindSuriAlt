<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PersonResource\Pages;
use App\Filament\Resources\PersonResource\RelationManagers;
use App\Models\Person;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PersonResource extends Resource
{
    protected static ?string $model = Person::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?int $navigationSort=1;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->nullable()
                    ->required(fn ($get) => ! $get('images'))
                    ->string(),

                TextInput::make('name_ar')
                    ->string()
                    ->required(fn ($get) => ! $get('images'))
                    ->nullable(),

                DatePicker::make('born_on')
                    ->date(),

                Select::make('born_in')
                    ->relationship('born_in_city', 'name')
                    ->searchable()
                    ->preload()
                    ->native(false),

                DatePicker::make('arrested_at')
                    ->date(),

                Select::make('arrested_in')
                    ->relationship('arrested_in_city', 'name')
                    ->searchable()
                    ->preload()
                    ->native(false),

                Forms\Components\FileUpload::make('images')
                    ->required(fn ($get) => ! $get('name') && ! $get('name_ar'))
                    ->multiple()
                    ->image()
                    ->previewable()
                    ->downloadable()
                    ->panelLayout('grid'),

                Forms\Components\FileUpload::make('videos')
                    ->multiple()
                    ->image()
                    ->previewable()
                    ->downloadable()
                    ->panelLayout('grid'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function ($query){
                $query->with([
                    'born_in_city',
                    'arrested_in_city',
                ]);
            })
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('name_ar')->searchable(),
                Tables\Columns\TextColumn::make('born_in_city.name'),
                Tables\Columns\TextColumn::make('born_in')->searchable(),
                Tables\Columns\TextColumn::make('arrested_in_city.name'),
                Tables\Columns\TextColumn::make('arrested_in')->searchable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('born_in_city')
                    ->relationship('born_in_city', 'name')
                    ->preload()
                    ->multiple(),
                Tables\Filters\SelectFilter::make('arrested_in_city')
                    ->relationship('arrested_in_city', 'name')
                    ->preload()
                    ->multiple(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
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
            'index' => Pages\ListPeople::route('/'),
            'create' => Pages\CreatePerson::route('/create'),
            'edit' => Pages\EditPerson::route('/{record}/edit'),
        ];
    }
}
