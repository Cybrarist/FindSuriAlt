<?php

namespace App\Models;

use App\Enums\StatusEnum;
use App\Observers\PersonObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ObservedBy(PersonObserver::class)]
class Person extends Model
{
    /** @use HasFactory<\Database\Factories\PersonFactory> */
    use HasFactory;

    protected $fillable=[
        "name",
        "name_second_lang",
        "born_on",
        "born_in",
        "missing_at",
        "missing_in",
        "images",
        "videos",
        "user_id",
        "status",
        "contact",
    ];

    protected function casts(): array
    {
        return [
            'missing_at' => 'date:y-m-d',
            'born_on' => 'date:y-m-d',
            'status'=>StatusEnum::class,
            'images' => 'array',
            'videos' => 'array',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function born_in_city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'born_in');
    }
    public function missing_in_city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'missing_in');
    }
}
