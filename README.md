# FyreUserAgent

**FyreUserAgent** is a free, open-source user agent library for *PHP*.


## Table Of Contents
- [Installation](#installation)
- [User Agent Creation](#user-agent-creation)
- [Methods](#methods)



## Installation

**Using Composer**

```
composer require fyre/useragent
```

In PHP:

```php
use Fyre\Http\UserAgent;
```


## User Agent Creation

- `$agent` is a string representing the user agent.

```php
$userAgent = new UserAgent($agent);
```

Alternatively, you can use the `fromString` method for easier chaining.

```php
$userAgent = UserAgent::fromString($agent);
```


## Methods

**Get Agent String**

Get the user agent string.

```php
$agent = $userAgent->getAgentString();
```

**Get Browser**

Get the browser.

```php
$browser = $userAgent->getBrowser();
```

**Get Mobile**

Get the mobile.

```php
$mobile = $userAgent->getMobile();
```

**Get Platform**

Get the platform.

```php
$platform = $userAgent->getPlatform();
```

**Get Robot**

Get the robot.

```php
$robot = $userAgent->getRobot();
```

**Get Version**

Get the browser version.

```php
$version = $userAgent->getVersion();
```

**Is Browser**

Determine if the user agent is a browser.

```php
$isBrowser = $userAgent->isBrowser();
```

**Is Mobile**

Determine if the user agent is a mobile.

```php
$isMobile = $userAgent->isMobile();
```

**Is Robot**

Determine if the user agent is a robot.

```php
$isRobot = $userAgent->isRobot();
```