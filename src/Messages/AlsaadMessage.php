<?php

namespace Illuminate\Notifications\Messages;

class AlsaadMessage
{
    /**
     * The message content.
     *
     * @var string
     */
    public $content;

    /**
     * The sender the message should be sent from.
     *
     * @var string
     */
    public $from;

    /**
     * The custom client instance.
     *
     * @var \Alsaad\Client|null
     */
    public $client;

    /**
     * Create a new message instance.
     *
     * @param  string  $content
     * @return void
     */
    public function __construct($content = '')
    {
        $this->content = $content;
    }

    /**
     * Set the message content.
     *
     * @param  string  $content
     * @return $this
     */
    public function content($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Set the sender the message should be sent from.
     *
     * @param  string  $from
     * @return $this
     */
    public function from($from)
    {
        $this->from = $from;

        return $this;
    }

    /**
     * Set the client instance.
     *
     * @param  \Alsaad\Client  $client
     * @return $this
     */
    public function usingClient($client)
    {
        $this->client = $client;

        return $this;
    }
}
