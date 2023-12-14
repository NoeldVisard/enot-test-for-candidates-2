<?php

namespace services;

use models\Confirmation;
use repositories\ConfirmationRepository;

class ConfirmationService extends Service
{
    private $confirmationRepository;

    /**
     * @param ConfirmationRepository $confirmationRepository
     */
    public function __construct(ConfirmationRepository $confirmationRepository)
    {
        $this->confirmationRepository = $confirmationRepository;
    }

    public function createConfirmation(int $userId, int $settingId)
    {
        $newConfirmation = new Confirmation($userId, $settingId, $this->createCode());
        $this->confirmationRepository->insert($newConfirmation);
    }

    private function createCode()
    {
        // ...
        return $newCode;
    }
}