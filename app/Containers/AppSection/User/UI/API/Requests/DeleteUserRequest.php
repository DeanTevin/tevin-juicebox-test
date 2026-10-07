<?php

namespace App\Containers\AppSection\User\UI\API\Requests;

use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Requests\Request as ParentRequest;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Validation\Rule;

class DeleteUserRequest extends ParentRequest
{

    protected array $decode = [
        'id',
    ];

    protected array $urlParameters = [
        'id',
    ];

    public function rules(): array
    {
        return [
            'id' => ['uuid','required', Rule::exists(User::class, 'id')],
        ];
    }

    public function authorize(Gate $gate): bool
    {
        return $gate->allows('delete', [User::class]);
    }
}
