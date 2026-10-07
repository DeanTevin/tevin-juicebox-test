<?php

namespace App\Containers\AppSection\Post\Tests\Unit\Tasks;

use App\Containers\AppSection\Post\Events\PostCreated;
use App\Containers\AppSection\Post\Tasks\CreatePostTask;
use App\Containers\AppSection\Post\Tests\UnitTestCase;
use App\Containers\AppSection\User\Models\User;
use Illuminate\Support\Facades\Event;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(CreatePostTask::class)]
class CreatePostTaskTest extends UnitTestCase
{
    public function testCreatePost(): void
    {
        Event::fake();
        $data = [
            'post' => 'asdasd',
            'user_id' => User::first()->id
        ];

        $post = app(CreatePostTask::class)->run($data);

        $this->assertModelExists($post);
        Event::assertDispatched(PostCreated::class);
    }
}
