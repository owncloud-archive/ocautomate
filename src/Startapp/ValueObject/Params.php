<?php

namespace Startapp;

use Startapp\InvalidParameterSettingException;

/**
 * Class Params
 * @package Startapp
 */
class Params
{
    /**
     * @var array List of allowed licenses
     */
    const ALLOWED_LICENSES = ['agpl', 'mit'];

    /**
     * @var array List of allowed categories
     */
    const ALLOWED_CATEGORIES = [
        'multimedia',
        'tool',
        'pim',
        'other',
        'game',
        'productivity'
    ];

    const DEFAULT_LICENSE = 'agpl';
    const DEFAULT_APP_VERSION = '0.0.1';
    const DEFAULT_OWNCLOUD_VERSION = '9.0';

    /**
     * @var string Regular expression to validate the name
     */
    const REGEX_NAME = '/^([A-Z][a-z]+)+$/';

    /**
     * @var string Regular expression to semantic version strings
     */
    const REGEX_SEMVER = '/0|[1-9]\d*|\d*[a-zA-Z-][0-9a-zA-Z-]*/';

    /**
     * @var string
     */
    private $author;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $homepage;

    /**
     * @var string
     */
    private $license;

    /**
     * @var string
     */
    private $category;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $output;

    /**
     * @var string
     */
    private $owncloudVersion;

    /**
     * @var string
     */
    private $appVersion;

    /**
     * @var
     */
    private $date;

    /**
     * Return the install year
     * @return false|string
     */
    public function getDate()
    {
        return date('y');
    }

    /**
     * @param string $version
     * @return Params
     */
    public function setOwnCloudVersion($version)
    {
        if (preg_match(self::REGEX_SEMVER, $version) !== 1) {
            throw new InvalidParameterSettingException('Invalid version value supplied');
        }
        $this->owncloudVersion = $version;

        return $this;
    }

    /**
     * @param string $version
     * @return Params
     */
    public function setApplicationVersion($version)
    {
        if (preg_match(self::REGEX_SEMVER, $version) !== 1) {
            throw new InvalidParameterSettingException('Invalid version value supplied');
        }
        $this->appVersion = $version;
        return $this;
    }


    /**
     * Retrieve the application version
     *
     * @return string
     */
    public function getApplicationVersion()
    {
        if ($this->appVersion === null) {
            return self::DEFAULT_APP_VERSION;
        }
        return $this->appVersion;
    }

    /**
     * Retrieve the ownCloud version
     *
     * @return string
     */
    public function getOwnCloudVersion()
    {
        if ($this->owncloudVersion === null) {
            return self::DEFAULT_OWNCLOUD_VERSION;
        }
        return $this->owncloudVersion;
    }

    /**
     * @param $name
     * @throws \Startapp\InvalidParameterSettingException
     */
    public function setName($name)
    {
        if (preg_match(self::REGEX_NAME, $name) !== 1) {
            throw new InvalidParameterSettingException('Invalid value for name supplied');
        }

        $this->name = $name;
    }

    /**
     * @param $license
     * @throws \Startapp\InvalidParameterSettingException
     */
    public function setLicense($license)
    {
        if (!in_array($license, self::ALLOWED_LICENSES)) {
            throw new InvalidParameterSettingException('Invalid value for license supplied');
        }

        $this->license = $license;
    }

    /**
     * @param $category
     * @throws \Startapp\InvalidParameterSettingException
     */
    public function setCategory($category)
    {
        if (!in_array($category, self::ALLOWED_CATEGORIES)) {
            throw new InvalidParameterSettingException(
                'Invalid value for category supplied'
            );
        }

        $this->category = $category;
    }
}
