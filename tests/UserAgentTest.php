<?php
declare(strict_types=1);

namespace Tests;

use
    Fyre\UserAgent\UserAgent,
    PHPUnit\Framework\TestCase;

final class UserAgentTest extends TestCase
{

    public function testUserAgentGetAgentStringDesktop(): void
    {
        $this->assertEquals(
            'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36',
            (new UserAgent('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36'))->getAgentString()
        );
    }

    public function testUserAgentGetAgentStringMobile(): void
    {
        $this->assertEquals(
            'Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1',
            (new UserAgent('Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1'))->getAgentString()
        );
    }

    public function testUserAgentGetAgentStringRobot(): void
    {
        $this->assertEquals(
            'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)',
            (new UserAgent('Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)'))->getAgentString()
        );
    }

    public function testUserAgentGetBrowserDesktop(): void
    {
        $this->assertEquals(
            'Chrome',
            (new UserAgent('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36'))->getBrowser()
        );
    }

    public function testUserAgentGetBrowserMobile(): void
    {
        $this->assertEquals(
            'Safari',
            (new UserAgent('Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1'))->getBrowser()
        );
    }

    public function testUserAgentGetBrowserRobot(): void
    {
        $this->assertEquals(
            null,
            (new UserAgent('Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)'))->getBrowser()
        );
    }

    public function testUserAgentGetMobileDesktop(): void
    {
        $this->assertEquals(
            null,
            (new UserAgent('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36'))->getMobile()
        );
    }

    public function testUserAgentGetMobileMobile(): void
    {
        $this->assertEquals(
            'Apple iPhone',
            (new UserAgent('Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1'))->getMobile()
        );
    }

    public function testUserAgentGetMobileRobot(): void
    {
        $this->assertEquals(
            null,
            (new UserAgent('Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)'))->getMobile()
        );
    }

    public function testUserAgentGetPlatformDesktop(): void
    {
        $this->assertEquals(
            'Windows 7',
            (new UserAgent('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36'))->getPlatform()
        );
    }

    public function testUserAgentGetPlatformMobile(): void
    {
        $this->assertEquals(
            'iOS',
            (new UserAgent('Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1'))->getPlatform()
        );
    }

    public function testUserAgentGetPlatformRobot(): void
    {
        $this->assertEquals(
            'Unknown Platform',
            (new UserAgent('Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)'))->getPlatform()
        );
    }

    public function testUserAgentGetRobotDesktop(): void
    {
        $this->assertEquals(
            null,
            (new UserAgent('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36'))->getRobot()
        );
    }

    public function testUserAgentGetRobotMobile(): void
    {
        $this->assertEquals(
            null,
            (new UserAgent('Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1'))->getRobot()
        );
    }

    public function testUserAgentGetRobotRobot(): void
    {
        $this->assertEquals(
            'Googlebot',
            (new UserAgent('Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)'))->getRobot()
        );
    }

    public function testUserAgentGetVersionDesktop(): void
    {
        $this->assertEquals(
            '47.0.2526.111',
            (new UserAgent('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36'))->getVersion()
        );
    }

    public function testUserAgentGetVersionMobile(): void
    {
        $this->assertEquals(
            '604.1',
            (new UserAgent('Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1'))->getVersion()
        );
    }

    public function testUserAgentGetVersionRobot(): void
    {
        $this->assertEquals(
            null,
            (new UserAgent('Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)'))->getVersion()
        );
    }

    public function testUserAgentIsBrowserDesktop(): void
    {
        $this->assertEquals(
            true,
            (new UserAgent('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36'))->isBrowser()
        );
    }

    public function testUserAgentIsBrowserMobile(): void
    {
        $this->assertEquals(
            true,
            (new UserAgent('Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1'))->isBrowser()
        );
    }

    public function testUserAgentIsBrowserRobot(): void
    {
        $this->assertEquals(
            false,
            (new UserAgent('Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)'))->isBrowser()
        );
    }

    public function testUserAgentIsMobileDesktop(): void
    {
        $this->assertEquals(
            false,
            (new UserAgent('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36'))->isMobile()
        );
    }

    public function testUserAgentIsMobileMobile(): void
    {
        $this->assertEquals(
            true,
            (new UserAgent('Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1'))->isMobile()
        );
    }

    public function testUserAgentIsMobileRobot(): void
    {
        $this->assertEquals(
            false,
            (new UserAgent('Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)'))->isMobile()
        );
    }

    public function testUserAgentIsRobotDesktop(): void
    {
        $this->assertEquals(
            false,
            (new UserAgent('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36)'))->isRobot()
        );
    }

    public function testUserAgentIsRobotMobile(): void
    {
        $this->assertEquals(
            false,
            (new UserAgent('Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1'))->isRobot()
        );
    }

    public function testUserAgentIsRobotRobot(): void
    {
        $this->assertEquals(
            true,
            (new UserAgent('Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)'))->isRobot()
        );
    }

    public function testUserAgentSetAgentString(): void
    {
        $userAgent = new UserAgent('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36');

        $this->assertEquals(
            $userAgent,
            $userAgent->setAgentString('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36)')
        );

        $this->assertEquals(
            'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36)',
            $userAgent->getAgentString()
        );

        $this->assertEquals(
            'Chrome',
            $userAgent->getBrowser()
        );

        $this->assertEquals(
            null,
            $userAgent->getMobile()
        );

        $this->assertEquals(
            'Windows 7',
            $userAgent->getPlatform()
        );

        $this->assertEquals(
            '47.0.2526.111',
            $userAgent->getVersion()
        );
    }

}
