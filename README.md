# humble-flash

[![Latest Version](https://img.shields.io/github/release/humblephp/humble-flash.svg)](https://github.com/humblephp/humble-flash/releases)
[![Software License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE.md)
[![Build Status](https://api.travis-ci.org/humblephp/humble-flash.svg?branch=master)](https://travis-ci.org/humblephp/humble-flash)

HUMBLE Flash

## Install

Via Composer

``` bash
$ composer require humble/flash
```

## Usage

Get PHP Flash.
```
$flash = new \Humble\Flash\Flash;
```

Get PHP Flash with custom settings.
```
$flash = new \Humble\Flash\Flash(array('sessionKey' => 'flash'));
```

Save PHP Flash messages from PHP Flash session.
```
$flash->saveMessages();
```

Reset PHP Flash session.
```
$flash->resetSession();
```

Save and reset with PSR-7 Flash Middleware.
```
$middleware = new \Humble\Flash\FlashMiddleware($flash);
$response = $middleware($request, $response, $next);
```

Get saved PHP Flash messages.
```
$messages = $flash->getMessages();
```

Push PHP Flash message to PHP Flash session.
```
$flash->pushMessage('success', "It's just a test!");
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
