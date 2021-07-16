<?php


namespace Havenstd06\Entity;

use DateTime;
use Havenstd06\Abstracts\Entity;

class Image extends Entity
{
    /**
     * Should always return "success"
     * @return boolean
     */
    public function getSuccess()
    {
        return $this->data['success'];
    }

    /**
     * Should always return "status"
     * @return integer
     */
    public function getStatus()
    {
        return $this->data['status'];
    }

    /**
     * Should always return "title"
     * @return string
     */
    public function getTitle()
    {
        return $this->data['data']['title'];
    }

    /**
     * Should always return "date time"
     * @return string
     */
    public function getDatetime()
    {
        return $this->data['data']['datetime'];
    }

    /**
     * Should always return "date"
     * @return string
     */
    public function getDate()
    {
        $datetime = $this->data['data']['datetime'];

        if (! isset($datetime)) {
            return null;
        }

        $date = new DateTime();
        $date->setTimestamp($datetime);

        return $date->format('Y-m-d H:i:s');
    }

    /**
     * Should always return "type"
     * @return string
     */
    public function getType()
    {
        return $this->data['data']['type'];
    }

    /**
     * Should always return "user id"
     * @return integer
     */
    public function getUserId()
    {
        return $this->data['data']['account_id'];
    }

    /**
     * Should always return "username"
     * @return string
     */
    public function getUsername()
    {
        return $this->data['data']['account_name'];
    }

    /**
     * Should always return "image state"
     * @return integer
     */
    public function getState()
    {
        return $this->data['data']['image_state'];
    }

    /**
     * Should always return "delete link"
     * @return string
     */
    public function getDeleteLink()
    {
        return $this->data['data']['delete'];
    }

    /**
     * Should always return "page link"
     * @return string
     */
    public function getPageLink()
    {
        return $this->data['data']['page'];
    }

    /**
     * Should always return "image link"
     * @return string
     */
    public function getImageLink()
    {
        return $this->data['data']['link'];
    }
}
