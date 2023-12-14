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
        return $this->confirmationRepository->insert($newConfirmation);
    }

    private function createConfirmationCode()
    {
        // ...
        return $newCode;
    }

    public function sendConfirmationCode(int $userId, $confirmationCode)
    {
        $user = $this->userRepository->get($userId);

        switch ($user->settings['sendMethod']) {
            case 'sms':
                $sender = new \SmsSender();
                break;
            case 'email':
                $sender = new \EmailSender();
                break;
            case 'telegram':
                $sender = new \TelegramSender();
                break;
            default:
                return ['error' => 'Не указан / не корректный метод подтверждения'];
        }

        $sender->send($userId, $confirmationCode);
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