<?php
declare(strict_types=1);

namespace Tests;

use
    Fyre\Http\UserAgent,
    PHPUnit\Framework\TestCase;

final class UserAgentTest extends TestCase
{

    public function testGetAgentStringDesktop(): void
    {
        $this->assertSame(
            'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36',
            (new UserAgent('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36'))->getAgentString()
        );
    }

    public function testGetAgentStringMobile(): void
    {
        $this->assertSame(
            'Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1',
            (new UserAgent('Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1'))->getAgentString()
        );
    }

    public function testGetAgentStringRobot(): void
    {
        $this->assertSame(
            'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)',
            (new UserAgent('Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)'))->getAgentString()
        );
    }

    public function testGetBrowserDesktop(): void
    {
        $this->assertSame(
            'Chrome',
            (new UserAgent('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36'))->getBrowser()
        );
    }

    public function testGetBrowserMobile(): void
    {
        $this->assertSame(
            'Safari',
            (new UserAgent('Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1'))->getBrowser()
        );
    }

    public function testGetBrowserRobot(): void
    {
        $this->assertNull(
            (new UserAgent('Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)'))->getBrowser()
        );
    }

    public function testGetMobileDesktop(): void
    {
        $this->assertNull(
            (new UserAgent('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36'))->getMobile()
        );
    }

    public function testGetMobileMobile(): void
    {
        $this->assertSame(
            'Apple iPhone',
            (new UserAgent('Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1'))->getMobile()
        );
    }

    public function testGetMobileRobot(): void
    {
        $this->assertNull(
            (new UserAgent('Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)'))->getMobile()
        );
    }

    public function testGetPlatformDesktop(): void
    {
        $this->assertSame(
            'Windows 7',
            (new UserAgent('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36'))->getPlatform()
        );
    }

    public function testGetPlatformMobile(): void
    {
        $this->assertSame(
            'iOS',
            (new UserAgent('Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1'))->getPlatform()
        );
    }

    public function testGetPlatformRobot(): void
    {
        $this->assertSame(
            'Unknown Platform',
            (new UserAgent('Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)'))->getPlatform()
        );
    }

    public function testGetRobotDesktop(): void
    {
        $this->assertNull(
            (new UserAgent('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36'))->getRobot()
        );
    }

    public function testGetRobotMobile(): void
    {
        $this->assertNull(
            (new UserAgent('Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1'))->getRobot()
        );
    }

    public function testGetRobotRobot(): void
    {
        $this->assertSame(
            'Googlebot',
            (new UserAgent('Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)'))->getRobot()
        );
    }

    public function testGetVersionDesktop(): void
    {
        $this->assertSame(
            '47.0.2526.111',
            (new UserAgent('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36'))->getVersion()
        );
    }

    public function testGetVersionMobile(): void
    {
        $this->assertSame(
            '604.1',
            (new UserAgent('Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1'))->getVersion()
        );
    }

    public function testGetVersionRobot(): void
    {
        $this->assertNull(
            (new UserAgent('Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)'))->getVersion()
        );
    }

    public function testIsBrowserDesktop(): void
    {
        $this->assertTrue(
            (new UserAgent('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36'))->isBrowser()
        );
    }

    public function testIsBrowserMobile(): void
    {
        $this->assertTrue(
            (new UserAgent('Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1'))->isBrowser()
        );
    }

    public function testIsBrowserRobot(): void
    {
        $this->assertFalse(
            (new UserAgent('Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)'))->isBrowser()
        );
    }

    public function testIsMobileDesktop(): void
    {
        $this->assertFalse(
            (new UserAgent('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36'))->isMobile()
        );
    }

    public function testIsMobileMobile(): void
    {
        $this->assertTrue(
            (new UserAgent('Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1'))->isMobile()
        );
    }

    public function testIsMobileRobot(): void
    {
        $this->assertFalse(
            (new UserAgent('Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)'))->isMobile()
        );
    }

    public function testIsRobotDesktop(): void
    {
        $this->assertFalse(
            (new UserAgent('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36)'))->isRobot()
        );
    }

    public function testIsRobotMobile(): void
    {
        $this->assertFalse(
            (new UserAgent('Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1'))->isRobot()
        );
    }

    public function testIsRobotRobot(): void
    {
        $this->assertTrue(
            (new UserAgent('Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)'))->isRobot()
        );
    }

    public function testSetAgentString(): void
    {
        $userAgent = new UserAgent('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36');

        $this->assertSame(
            $userAgent,
            $userAgent->setAgentString('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36)')
        );

        $this->assertSame(
            'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36)',
            $userAgent->getAgentString()
        );

        $this->assertSame(
            'Chrome',
            $userAgent->getBrowser()
        );

        $this->assertNull(
            $userAgent->getMobile()
        );

        $this->assertSame(
            'Windows 7',
            $userAgent->getPlatform()
        );

        $this->assertSame(
            '47.0.2526.111',
            $userAgent->getVersion()
        );
    }

}
