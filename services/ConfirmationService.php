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
        $newConfirmation = new Confirmation($userId, $settingId, $this->createConfirmationCode());
        $this->confirmationRepository->insert($newConfirmation);
    }

    private function createConfirmationCode()
    {
        // ...
        return $newCode;
    }

    public function isConfirmationCorrect(int $userId, string $confirmationCode)
    {
        $confirmation = $this->confirmationRepository->get($userId);
        $currentDateTime = new \DateTime();

        if ($confirmationCode === $confirmation['code']
            && $currentDateTime < $confirmation['delayDate']) {
            return true;
        } else {
            return false;
        }
    }

}