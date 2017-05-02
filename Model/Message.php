<?php

namespace GorkaLaucirica\HipchatAPIv2Client\Model;

class Message
{
    protected $id = null;
    protected $color;
    protected $message;
    protected $messageFormat;
    protected $date = null;
    protected $from = '';
    protected $mentions = [];
    protected $type;

    const COLOR_YELLOW = 'yellow';
    const COLOR_GREEN = 'green';
    const COLOR_RED = 'red';
    const COLOR_PURPLE = 'purple';
    const COLOR_GRAY = 'gray';
    const COLOR_RANDOM = 'random';

    const FORMAT_HTML = 'html';
    const FORMAT_TEXT = 'text';

    /**
     * Message constructor
     */
    public function __construct($json = null)
    {
        if ($json) {
            $this->parseJson($json);
        } else {
            $this->color = self::COLOR_YELLOW;
            $this->messageFormat = self::FORMAT_HTML;
            $this->message = "";
        }
    }

    public function parseJson($json)
    {
        $this->id = $json['id'];
        $this->from = is_array($json['from']) ? $json['from']['name'] : $json['from'];
        $this->message = $json['message'];
        $this->color = isset($json['color']) ? $json['color'] : null;
        $this->messageFormat = isset($json['message_format']) ? $json['message_format'] : 'html';
        $this->date = $json['date'];
        $this->mentions = $json['mentions'];
        $this->type = $json['type'];

    }


    /**
     * Serializes Message object
     *
     * @return array
     */
    public function toJson()
    {
        $json = array();
        $json['id'] = $this->id;
        $json['from'] = $this->from;
        $json['color'] = $this->color;
        $json['message'] = $this->message;
        $json['message_format'] = $this->messageFormat;
        $json['date'] = $this->date;
        $json['mentions'] = $this->mentions;
        $json['type'] = $this->type;

        return $json;

    }

    /**
     * Sets background color for message
     *
     * @param string $color Background color for message
     *
     * @return self
     */
    public function setColor($color)
    {
        $this->color = $color;
        return $this;
    }

    /**
     * Returns background color for message
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Sets the message body
     *
     * @param string $message The message body
     *
     * @return self
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    /**
     * Returns the message body
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }



    /**
     * Sets how the message is treated by the server and rendered inside HipChat applications
     *
     * @param string $messageFormat How the message is treated by the server and rendered inside HipChat applications
     *
     * @return self
     */
    public function setMessageFormat($messageFormat)
    {
        $this->messageFormat = $messageFormat;
        return $this;
    }

    /**
     * Returns how the message is treated by the server and rendered inside HipChat applications
     *
     * @return string
     */
    public function getMessageFormat()
    {
        return $this->messageFormat;
    }

    /**
     * Sets a label to be shown in addition to the sender's name
     *
     * @param string $from The label
     *
     * @return self
     */
    public function setFrom($from)
    {
        $this->from = $from;
        return $this;
    }

    /**
     * Gets the label to be shown in addition to the sender's name
     *
     * @return string|array
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * Get mentions in message.
     *
     * @return array
     */
    public function getMentions()
    {
        return $this->mentions;
    }

    /**
     * Set mentions in the message
     * @param array
     * @return array
     */
    public function setMentions($mentions)
    {
        $this->mentions = $mentions;
    }

    /**
     * Get type of message
     * Posible values: message, guest_access, topic, notification.
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set The type of message
     *
     * @param $type string | message, guest_access, topic, notification
     */
    public function setType($type)
    {
        $this->type = $type;
    }

}
