<?php

namespace App\Containers\AppSection\Post\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class CreatePostRequest extends ParentRequest
{
    protected array $access = [
        'permissions' => null,
        'roles' => null,
    ];

    protected array $decode = [
        // 'id',
    ];

    protected array $urlParameters = [
        // 'id',
    ];

    public function rules(): array
    {
        return [
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
