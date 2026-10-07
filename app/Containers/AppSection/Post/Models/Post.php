<?php

namespace App\Containers\AppSection\Post\Models;

use App\Containers\AppSection\Post\Data\Enums\CategoriesEnum;
use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends ParentModel
{
    use HasUuids;

    protected $fillable = [
        'user_id',
        'post',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
