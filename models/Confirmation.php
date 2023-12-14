<?php

namespace models;

use DateTime;

class Confirmation extends Model
{
    private int $id;
    private int $userId;
    private int $settingId;
    private int $code;
    private DateTime $delayDate;

    /**
     * @param int $userId
     * @param int $code
     */
    public function __construct(int $userId, int $settingId, int $code)
    {
        $this->userId = $userId;
        $this->code = $code;
        $this->settingId = $settingId;
        $this->delayDate = (new DateTime())->modify('+15 minutes');
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @return int
     */
    public function getSettingId(): int
    {
        return $this->settingId;
    }

    /**
     * @return int
     */
    public function getCode(): int
    {
        return $this->code;
    }

    /**
     * @return DateTime
     */
    public function getDelayDate(): DateTime
    {
        return $this->delayDate;
    }

}