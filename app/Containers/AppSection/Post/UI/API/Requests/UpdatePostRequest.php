<?php

namespace App\Containers\AppSection\Post\UI\API\Requests;

use App\Containers\AppSection\Post\Models\Post;
use App\Ship\Parents\Requests\Request as ParentRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends ParentRequest
{
    protected array $access = [
        'permissions' => null,
        'roles' => null,
    ];

    protected array $decode = [
        'id',
    ];

    protected array $urlParameters = [
        'id',
    ];

    public function rules(): array
    {
        return [
            'id' => ['required','uuid',Rule::exists(Post::class,'id')],
            'post' => ['required','min:10','max:'.config('appSection-post.post_length')],
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
