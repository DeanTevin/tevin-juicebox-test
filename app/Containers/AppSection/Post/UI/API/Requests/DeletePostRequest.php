<?php

namespace App\Containers\AppSection\Post\UI\API\Requests;

use App\Containers\AppSection\Post\Models\Post;
use App\Ship\Parents\Requests\Request as ParentRequest;
use Illuminate\Validation\Rule;

class DeletePostRequest extends ParentRequest
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
        return ['id' => ['uuid','required', Rule::exists(Post::class, 'id')],];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
