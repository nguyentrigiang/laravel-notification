[![Build Status](https://travis-ci.org/nguyentrigiang/laravel-notification.svg?branch=master)](https://travis-ci.org/nguyentrigiang/laravel-notification)
[![License](https://img.shields.io/github/license/nguyentrigiang/laravel-notification.svg)](https://github.com/nguyentrigiang/laravel-notification/blob/master/LICENSE)


# Introduction

This is a simple Notification wrapper library for Laravel. It simplifies the basic
notification flow with the defined methods. You can send a message to all users
or you can notify a single user, manage notifications, devices ID, and configure time to receive notifications.

# Installation

First, you'll need to require the package with Composer:

```sh
composer require nguyentrigiang/laravel-notification
```
The package will automatically register a service provider.


Then, run `php artisan vendor:publish --provider="GiangNT\LaravelNotification\NotificationServiceProvider"` from your command line to publish the notification migration file.


Finally, from the command line again, run

```
php artisan migrate
```


# Configuration

If you use Onesignal, run

```sh
php artisan vendor:publish --tag=config
```
to publish the default configuration file. This will publish a configuration file named onesignal.php which includes your OneSignal authorization keys.

You need to fill in onesignal.php file that is found in your applications config directory. app_id is your OneSignal App ID and rest_api_key is your REST API Key.


# USAGE

## Preparing your model:
To associate notification with a model, the model must implement the following interface and trait

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use GiangNT\LaravelNotification\HasPlayer;
use GiangNT\LaravelNotification\HasConfiguration;
use GiangNT\LaravelNotification\InteractsWithPlayer;
use GiangNT\LaravelNotification\InteractsWithConfiguration;
use Illuminate\Notifications\Notifiable;

class User extends Model implements HasPlayer, HasConfiguration
{
    use InteractsWithPlayer, InteractsWithConfiguration, Notifiable;
}
```

## Creating Notifications:
```sh
php artisan make:notification InvoicePaid
```
Extends `GiangNT\LaravelNotification\BaseNotification` instead of `Illuminate\Notifications\Notification`
```php
use GiangNT\LaravelNotification\BaseNotification;

class UserRegisted extends BaseNotification
{
}
```

## Sending Notifications:

```php
use App\Notifications\InvoicePaid;

$user->notify(new InvoicePaid($invoice));
```

## Accessing The Notifications
```php
$user = App\Models\User::find(1);

foreach ($user->notifications as $notification) {
    echo $notification->type;
}
```


## Interacts with Player
```php
$user->addPlayer('5ea79c81-327f-4d8b-98b1-58dbd22a277b');
$players = $user->players;
$user->deletePlayer('5ea79c81-327f-4d8b-98b1-58dbd22a277b');
$user->clearPlayer();
```


## Interacts with Configuration
```php
$data = [
    'start_time' => '5:00',
    'end_time' => '21:59',
    'days_of_the_week' => ['Monday', 'Tuesday']
];
$user->addConfiguration($data);
$user->resetConfiguration();
```
