<?php

namespace App\Models;

use App\Observers\FaceSearchObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy(FaceSearchObserver::class)]
class FaceSearch extends Model
{
    /** @use HasFactory<\Database\Factories\FaceSearchFactory> */
    use HasFactory;


    protected $fillable=[
        'email', 'image'
    ];

}
