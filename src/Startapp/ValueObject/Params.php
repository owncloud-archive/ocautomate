<?php

namespace Startapp;

use StartappTest\InvalidParameterSettingException;

/**
 * Class Params
 * @package Startapp
 */
class Params
{
    const ALLOWED_LICENSES = ['agpl', 'mit'];
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
    const REGEX_NAME = '/^([A-Z][a-z]+)+$/';

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
    private $name;

    /**
     * @var string
     */
    private $output;

    /**
     * @var string
     */
    private $owncloud;

    /**
     * @var string
     */
    private $version;

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

    public function setName($name)
    {
        if (preg_match(self::REGEX_NAME, $name) !== 1) {
            throw new InvalidParameterSettingException('Invalid value for name supplied');
        }

        $this->name = $name;
    }
}
