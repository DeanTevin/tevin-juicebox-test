<?php

namespace App\Containers\AppSection\Post\Tests\Unit\Tasks;

use App\Containers\AppSection\Post\Data\Factories\PostFactory;
use App\Containers\AppSection\Post\Events\PostDeleted;
use App\Containers\AppSection\Post\Tasks\DeletePostTask;
use App\Containers\AppSection\Post\Tests\UnitTestCase;
use Illuminate\Support\Facades\Event;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(DeletePostTask::class)]
class DeletePostTaskTest extends UnitTestCase
{
    public function testDeletePost(): void
    {
        // $user = UserFactory::new()->createOne();
        
        $post = PostFactory::new()->createOne();
        auth()->setUser($post->user);

        $result = app(DeletePostTask::class)->run($post->id);

        $this->assertTrue($result);
        $this->assertModelMissing($post);
    }
}
