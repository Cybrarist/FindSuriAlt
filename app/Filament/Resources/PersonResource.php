<?php

namespace App\Filament\Resources;

use App\Enums\StatusEnum;
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
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PersonResource extends Resource
{
    protected static ?string $model = Person::class;
    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?int $navigationSort=1;

    public static function canViewAny(): bool
    {
        return true;
    }

    public static function canView(Model $record): bool
    {
        return true;
    }

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

                Select::make('status')
                ->options(StatusEnum::class)
                ->default(StatusEnum::Missing),

                Forms\Components\Textarea::make('contact')
                    ->columnSpanFull()
                    ->nullable()
                    ->autosize()
                    ->rows(4),

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


                Forms\Components\FileUpload::make('faces')
                    ->visible(Auth::check())
                    ->disk('faces')
                    ->directory('form-attachments')
                    ->visibility('private')
                    ->disabled()
                    ->multiple()
                    ->image()
                    ->previewable()
                    ->downloadable()
                    ->panelLayout('grid')
                    ->formatStateUsing(function ($record){
                        if (!$record)
                            return [];

                        $list_of_images_names_only=[];
                        foreach ($record->images as $image)
                            $list_of_images_names_only[]=explode('.', $image)[0]. '*';

                        //get available faces from directory
                        $files = glob(storage_path('app/private/faces') .
                            '/{' . implode(',', $list_of_images_names_only) .'}' ,
                            GLOB_BRACE
                        );

                        foreach ($files as &$file)
                            $file= str_replace(storage_path("app/private/faces/") , "" , $file);

                        return $files;
                    }),
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
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn ($state): string => StatusEnum::get_badge($state)),

                Tables\Columns\TextColumn::make('born_in_city.name'),
                Tables\Columns\TextColumn::make('born_on')->date('d-m-Y'),
                Tables\Columns\TextColumn::make('arrested_in_city.name'),
                Tables\Columns\TextColumn::make('arrested_at')->date('d-m-Y'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->preload(),

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
            'view' => Pages\ViewPerson::route('/{record}/'),
        ];
    }
}
