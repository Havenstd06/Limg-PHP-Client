<?php

namespace Havenstd06\Limg;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;

use Havenstd06\Limg\Entity\Image;

/**
 * Class Client
 *
 * The main class for API consumption
 *
 * @package Havenstd06\Client
 */
class Client
{
    /** @var string The API access token */
    private static $token = null;

    /** @var string The instance token, settable once per new instance */
    private $instanceToken;

    /**
     * @param string|null $token The API access token, as obtained on limg.app
     * @throws LimgException When no token is provided
     */
    public function __construct($token = null)
    {
        if ($token === null) {
            if (self::$token === null) {
                $msg = 'No token provided, and none is globally set. ';
                $msg .= 'Use Client::setApiToken, or instantiate the Client class with a $token parameter.';

                throw new LimgException($msg);
            }
        } else {
            self::validateToken($token);
            $this->instanceToken = $token;
        }
    }

    /**
     * Sets the token for all future new instances
     * @param $token string The API access token, as obtained on limg.app
     * @return void
     */
    public static function setApiToken($token)
    {
        self::validateToken($token);
        self::$token = $token;
    }

    private static function validateToken($token)
    {
        if (! is_string($token)) {
            throw new \InvalidArgumentException('Token is not a string.');
        }

        if (strlen($token) < 4) {
            throw new \InvalidArgumentException('Token "' . $token . '" is too short, and thus invalid.');
        }

        return true;
    }

    /**
     * Returns the token that has been defined.
     * @return null|string
     */
    public function getToken()
    {
        return ($this->instanceToken) ?: self::$token;
    }

    public static function upload($file, $title = 'Image uploaded from Client-PHP-Client')
    {
        self::validateUpload($file, $title);

        $guzzleClient = new GuzzleClient();
        $response = [];

        try {
            $response = $guzzleClient->request('POST', 'https://limg.app/api/upload', [
                'stream' => true,
                'headers' => [
                    'Authorization' => (new self())->getToken(),
                ],
                'multipart' => [
                    [
                        'name' => 'file',
                        'contents' => fopen($file, 'r'),
                    ],
                    [
                        'name' => 'title',
                        'contents' => $title,
                    ],
                ],
            ]);
        } catch (GuzzleException $e) {
            echo $e->getMessage();
        }

        return new Image(json_decode($response->getBody()->getContents(), true));
    }

    private static function validateUpload($file, $title)
    {
        if (! is_file($file)) {
            throw new \InvalidArgumentException('File is not a file.');
        }

        if (! is_string($title)) {
            throw new \InvalidArgumentException('Title is not a string.');
        }

        if (strlen($title) > 50) {
            throw new \InvalidArgumentException('Title is too long, and thus invalid.');
        }

        return true;
    }
}
