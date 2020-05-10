<?php

namespace Illuminate\Notifications\Channels;

use Alsaad\Client as AlsaadClient;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\Messages\AlsaadMessage;

class AlsaadSmsChannel
{
    /**
     * The Alsaad client instance.
     *
     * @var \Alsaad\Client
     */
    protected $alsaad;

    /**
     * The sender notifications should be sent from.
     *
     * @var string
     */
    protected $from;

    /**
     * Create a new channel instance.
     *
     * @param  \Alsaad\Client  $alsaad
     * @param  string  $from
     * @return void
     */
    public function __construct(AlsaadClient $alsaad, $from)
    {
        $this->from = $from;
        $this->alsaad = $alsaad;
    }

    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return \Alsaad\Message\Message
     */
    public function send($notifiable, Notification $notification)
    {
        if (! $to = $notifiable->routeNotificationFor('alsaad', $notification)) {
            return;
        }

        $message = $notification->toAlsaad($notifiable);

        if (is_string($message)) {
            $message = new AlsaadMessage($message);
        }

        return ($message->client ?? $this->alsaad)->message()->send([
            'from' => $message->from ?: $this->from,
            'to' => $to,
            'message' => $message->content,
        ]);
    }
}
