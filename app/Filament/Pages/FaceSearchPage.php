<?php

namespace App\Filament\Pages;

use App\Jobs\ValidateIfFaceExistsJob;
use App\Models\FaceSearch;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;

class FaceSearchPage extends Page implements HasForms
{
    use InteractsWithForms;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.face-search';
    public string $temporary_image;
    public string $email;
    public static function canAccess(): bool
    {
        return !Auth::check();
    }


    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }


    public function form(Form $form): Form
    {
        return $form->schema([
            FileUpload::make('temporary_image')
                ->disk('temporary_images_for_search')
                ->maxFiles(1)
                ->required()
                ->image(),
            TextInput::make('email')
                ->email()
                ->required(),
            ])
            ->statePath('data');
    }
    public function create(): void
    {

        $state_saved= $this->form->getState();

        //check if record already exists
        $face_search=FaceSearch::where('email', $this->data['email'])->first();

        //if record exists, get the turn and cancel the submitted form
        if ($face_search) {
            $count= FaceSearch::where('id', '<' , $face_search->id)->count('id');
            Notification::make()
                ->title('You Already Have An Active Search, Please Wait For the Results')
                ->body("There are still $count before your search")
                ->danger()
                ->send();
        }
        //if it doesn't exist, add the record and pass it to the job
        else {
            $face_search= FaceSearch::create([
                'email' => $state_saved['email'],
                'image' => $state_saved['temporary_image'],
            ]);
            $count= FaceSearch::where('id', '<' , $face_search->id)->count('id');


            $this->form->fill();

            Notification::make()
                ->title('Record Submitted, You will receive an email if a search is found')
                ->body("There are still $count before your search")
                ->success()
                ->send();


        }
    }
}
