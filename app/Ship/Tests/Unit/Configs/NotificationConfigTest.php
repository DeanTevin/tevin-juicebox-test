<?php

namespace App\Ship\Tests\Unit\Configs;

use App\Ship\Tests\ShipTestCase;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Group;

#[Group('ship')]
#[CoversNothing]
final class NotificationConfigTest extends ShipTestCase
{
    public function testConfigHasCorrectValues(): void
    {
        $config = config('notification');
        $expected = [
            'channels' => [
                'database',
                // 'mail',
            ],
            'microsoft_teams' => [
                'error_log' => [
                    'url' => env('TEAMS_ERROR_WEBHOOKS_NOTIFICATION'),
                    'enabled' => env('TEAMS_ERROR_LOG',false)
                ]
            ],
            'slack' => [
                'error_log' => [
                    'enabled' => env('SLACK_ERROR_LOG',true),
                    'config' => config('logging.channels.slack_activity')
                ]
            ]
        ];

        $this->assertSame($expected, $config);
    }
}
