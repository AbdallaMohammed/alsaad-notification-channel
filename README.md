## Installation

Sending SMS notifications in Laravel using Alsaad. Before you can send notifications via Alsaad, you need to install the `abdallahmohammed/alsaad-notification-channel` Composer package:

```text
composer require abdallahmohammed/alsaad-notification-channel
```

Next, you will need to add a configuration option to your `config/services.php` configuration file. You may copy the example configuration below to get started:

```text
'alsaad' => [
    'from' => SENDER_NAME,
],
```

## Formatting Notifications

If a notification supports being sent as an SMS, you should define a `toAlsaad` method on the notification class. This method will receive a `$notifiable` entity and should return a `Illuminate\Notifications\Messages\AlsaadMessage` instance:

```php
/**
 * Get the SMS representation of the notification.
 *
 * @param  mixed  $notifiable
 * @return AlsaadMessage
 */
public function toAlsaad($notifiable)
{
    return (new AlsaadMessage)
                ->content('Hello World');
}
```
