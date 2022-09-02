<?php

namespace App\Listeners;

use App\Events\MessageDeleted;
use App\Libs\Messenger;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyMessageDeleted implements ShouldQueue
{
    public function handle(MessageDeleted $event)
    {
        $message = sprintf(
            'Message was deleted in <#%s>',
            $event->payload->channel,
        );

        $old = data_get($event->payload, 'previous_message.text');
        $user = data_get($event->payload, 'previous_message.user');

        if ($old && $user) {
            $message = implode(PHP_EOL.PHP_EOL, [
                $message,
                sprintf('<@%s>', $user),
                $old,
            ]);
        }

        Messenger::send(config('services.slack.message_delete_chanid'), $message, ':candle:');
    }
}
