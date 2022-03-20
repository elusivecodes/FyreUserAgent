<?php
declare(strict_types=1);

namespace Fyre\Http;

use function
    preg_match,
    preg_quote;

/**
 * UserAgent
 */
class UserAgent
{

    const PLATFORMS = [
        'windows nt 10.0' => 'Windows 10',
        'windows nt 6.3' => 'Windows 8.1',
        'windows nt 6.2' => 'Windows 8',
        'windows nt 6.1' => 'Windows 7',
        'windows nt 6.0' => 'Windows Vista',
        'windows nt 5.2' => 'Windows 2003',
        'windows nt 5.1' => 'Windows XP',
        'windows nt 5.0' => 'Windows 2000',
        'windows nt 4.0' => 'Windows NT 4.0',
        'winnt4.0' => 'Windows NT 4.0',
        'winnt 4.0' => 'Windows NT',
        'winnt' => 'Windows NT',
        'windows 98' => 'Windows 98',
        'win98' => 'Windows 98',
        'windows 95' => 'Windows 95',
        'win95' => 'Windows 95',
        'windows phone' => 'Windows Phone',
        'windows' => 'Unknown Windows OS',
        'android' => 'Android',
        'blackberry' => 'BlackBerry',
        'iphone' => 'iOS',
        'ipad' => 'iOS',
        'ipod' => 'iOS',
        'os x' => 'Mac OS X',
        'ppc mac' => 'Power PC Mac',
        'freebsd' => 'FreeBSD',
        'ppc' => 'Macintosh',
        'linux' => 'Linux',
        'debian' => 'Debian',
        'sunos' => 'Sun Solaris',
        'beos' => 'BeOS',
        'apachebench' => 'ApacheBench',
        'aix' => 'AIX',
        'irix' => 'Irix',
        'osf' => 'DEC OSF',
        'hp-ux' => 'HP-UX',
        'netbsd' => 'NetBSD',
        'bsdi' => 'BSDi',
        'openbsd' => 'OpenBSD',
        'gnu' => 'GNU/Linux',
        'unix' => 'Unknown Unix OS',
        'symbian' => 'Symbian OS'
    ];

    const BROWSERS = [
        'OPR' => 'Opera',
        'Flock' => 'Flock',
        'Edge' => 'Spartan',
        'Edg' => 'Edge',
        'Chrome' => 'Chrome',
        'Opera.*?Version' => 'Opera',
        'Opera' => 'Opera',
        'MSIE' => 'Internet Explorer',
        'Internet Explorer' => 'Internet Explorer',
        'Trident.* rv' => 'Internet Explorer',
        'Shiira' => 'Shiira',
        'Firefox' => 'Firefox',
        'Chimera' => 'Chimera',
        'Phoenix' => 'Phoenix',
        'Firebird' => 'Firebird',
        'Camino' => 'Camino',
        'Netscape' => 'Netscape',
        'OmniWeb' => 'OmniWeb',
        'Safari' => 'Safari',
        'Mozilla' => 'Mozilla',
        'Konqueror' => 'Konqueror',
        'icab' => 'iCab',
        'Lynx' => 'Lynx',
        'Links' => 'Links',
        'hotjava' => 'HotJava',
        'amaya' => 'Amaya',
        'IBrowse' => 'IBrowse',
        'Maxthon' => 'Maxthon',
        'Ubuntu' => 'Ubuntu Web Browser',
        'Vivaldi' => 'Vivaldi'
    ];

    const MOBILES = [
        'mobileexplorer' => 'Mobile Explorer',
        'palmsource' => 'Palm',
        'palmscape' => 'Palmscape',

        // manufacturers
        'motorola' => 'Motorola',
        'nokia' => 'Nokia',
        'palm' => 'Palm',
        'iphone' => 'Apple iPhone',
        'ipad' => 'iPad',
        'ipod' => 'Apple iPod Touch',
        'sony' => 'Sony Ericsson',
        'ericsson' => 'Sony Ericsson',
        'blackberry' => 'BlackBerry',
        'cocoon' => 'O2 Cocoon',
        'blazer' => 'Treo',
        'lg' => 'LG',
        'amoi' => 'Amoi',
        'xda' => 'XDA',
        'mda' => 'MDA',
        'vario' => 'Vario',
        'htc' => 'HTC',
        'samsung' => 'Samsung',
        'sharp' => 'Sharp',
        'sie-' => 'Siemens',
        'alcatel' => 'Alcatel',
        'benq' => 'BenQ',
        'ipaq' => 'HP iPaq',
        'mot-' => 'Motorola',
        'playstation portable' => 'PlayStation Portable',
        'playstation 3' => 'PlayStation 3',
        'playstation vita' => 'PlayStation Vita',
        'hiptop' => 'Danger Hiptop',
        'nec-' => 'NEC',
        'panasonic' => 'Panasonic',
        'philips' => 'Philips',
        'sagem' => 'Sagem',
        'sanyo' => 'Sanyo',
        'spv' => 'SPV',
        'zte' => 'ZTE',
        'sendo' => 'Sendo',
        'nintendo dsi' => 'Nintendo DSi',
        'nintendo ds' => 'Nintendo DS',
        'nintendo 3ds' => 'Nintendo 3DS',
        'wii' => 'Nintendo Wii',
        'open web' => 'Open Web',
        'openweb' => 'OpenWeb',

        // os
        'android' => 'Android',
        'symbian' => 'Symbian',
        'SymbianOS' => 'SymbianOS',
        'elaine' => 'Palm',
        'series60' => 'Symbian S60',
        'windows ce' => 'Windows CE',

        // browser
        'obigo' => 'Obigo',
        'netfront' => 'Netfront Browser',
        'openwave' => 'Openwave Browser',
        'mobilexplorer' => 'Mobile Explorer',
        'operamini' => 'Opera Mini',
        'opera mini' => 'Opera Mini',
        'opera mobi' => 'Opera Mobile',
        'fennec' => 'Firefox Mobile',

        // other
        'digital paths' => 'Digital Paths',
        'avantgo' => 'AvantGo',
        'xiino' => 'Xiino',
        'novarra' => 'Novarra Transcoder',
        'vodafone' => 'Vodafone',
        'docomo' => 'NTT DoCoMo',
        'o2' => 'O2',

        // Fallback
        'mobile' => 'Generic Mobile',
        'wireless' => 'Generic Mobile',
        'j2me' => 'Generic Mobile',
        'midp' => 'Generic Mobile',
        'cldc' => 'Generic Mobile',
        'up.link' => 'Generic Mobile',
        'up.browser' => 'Generic Mobile',
        'smartphone' => 'Generic Mobile',
        'cellphone' => 'Generic Mobile'
    ];

    const ROBOTS = [
        'googlebot' => 'Googlebot',
        'msnbot' => 'MSNBot',
        'baiduspider' => 'Baiduspider',
        'bingbot' => 'Bing',
        'slurp' => 'Inktomi Slurp',
        'yahoo' => 'Yahoo',
        'ask jeeves' => 'Ask Jeeves',
        'fastcrawler' => 'FastCrawler',
        'infoseek' => 'InfoSeek Robot 1.0',
        'lycos' => 'Lycos',
        'yandex' => 'YandexBot',
        'mediapartners-google' => 'MediaPartners Google',
        'CRAZYWEBCRAWLER' => 'Crazy Webcrawler',
        'adsbot-google' => 'AdsBot Google',
        'feedfetcher-google' => 'Feedfetcher Google',
        'curious george' => 'Curious George',
        'ia_archiver' => 'Alexa Crawler',
        'MJ12bot' => 'Majestic-12',
        'Uptimebot' => 'Uptimebot'
    ];

    protected string $agent = '';

    protected string $platform = '';
    protected string|null $browser = null;
    protected string|null $version = null;
    protected string|null $mobile = null;
    protected string|null $robot = null;

    /**
     * New UserAgent constructor.
     * @param string $agent The user agent string.
     */
    public function __construct(string $agent = '')
    {
        $this->setAgentString($agent);
    }

    /**
     * Get the user agent string.
     * @return string The user agent string.
     */
    public function __toString(): string
    {
        return $this->getAgentString();
    }

    /**
     * Get the user agent string.
     * @return string The user agent string.
     */
    public function getAgentString(): string
    {
        return $this->agent;
    }

    /**
     * Get the browser.
     * @return string|null The browser.
     */
    public function getBrowser(): string|null
    {
        return $this->browser;
    }

    /**
     * Get the mobile.
     * @return string|null The mobile.
     */
    public function getMobile(): string|null
    {
        return $this->mobile;
    }

    /**
     * Get the platform.
     * @return string The platform.
     */
    public function getPlatform(): string
    {
        return $this->platform;
    }

    /**
     * Get the robot.
     * @return string|null The robot.
     */
    public function getRobot(): string|null
    {
        return $this->robot;
    }

    /**
     * Get the browser version.
     * @return string|null The browser version.
     */
    public function getVersion(): string|null
    {
        return $this->version;
    }

    /**
     * Determine if the user agent is a browser.
     * @return bool TRUE if the user agent is a browser, otherwise FALSE.
     */
    public function isBrowser(): bool
    {
        return $this->browser !== null;
    }

    /**
     * Determine if the user agent is a mobile.
     * @return bool TRUE if the user agent is a mobile, otherwise FALSE.
     */
    public function isMobile(): bool
    {
        return $this->mobile !== null;
    }

    /**
     * Determine if the user agent is a robot.
     * @return bool TRUE if the user agent is a robot, otherwise FALSE.
     */
    public function isRobot(): bool
    {
        return $this->robot !== null;
    }

    /**
     * Set the user agent string.
     * @param string $agent The user agent string.
     * @return UserAgent The UserAgent.
     */
    public function setAgentString(string $agent): static
    {
        $this->agent = $agent;
        $this->browser = null;
        $this->version = null;
        $this->mobile = null;
        $this->robot = null;

        $this->checkPlatform();

        if ($this->agent) { 
            $this->checkRobot() || $this->checkBrowser();
            $this->checkMobile();
        }

        return $this;
    }

    /**
     * Check the user agent for a browser.
     * @return bool TRUE if the agent matches a browser, otherwise FALSE.
     */
    protected function checkBrowser(): bool
    {
        foreach (static::BROWSERS AS $key => $value) {
            if (preg_match('/'.preg_quote($key).'.*?([0-9\.]+)/i', $this->agent, $match)) {
                $this->version = $match[1];
                $this->browser = $value;

                return true;
            }
        }

        return false;
    }

    /**
     * Check the user agent for a mobile.
     * @return bool TRUE if the agent matches a mobile, otherwise FALSE.
     */
    protected function checkMobile(): bool
    {
        foreach (static::MOBILES AS $key => $value) {
            if (preg_match('/'.preg_quote($key).'/i', $this->agent)) {
                $this->mobile = $value;

                return true;
            }
        }

        return false;
    }

    /**
     * Check the user agent platform.
     * @return bool TRUE if the agent matches a platform, otherwise FALSE.
     */
    protected function checkPlatform(): bool
    {
        foreach (static::PLATFORMS AS $key => $value) {
            if (preg_match('/'.preg_quote($key).'/i', $this->agent)) {
                $this->platform = $value;

                return true;
            }
        }

        $this->platform = 'Unknown Platform';

        return false;
    }

    /**
     * Check the user agent for a robot.
     * @return bool TRUE if the agent matches a robot, otherwise FALSE.
     */
    protected function checkRobot(): bool
    {
        foreach (static::ROBOTS AS $key => $value) {
            if (preg_match('/'.preg_quote($key).'/i', $this->agent)) {
                $this->robot = $value;

                return true;
            }
        }

        return false;
    }

}
