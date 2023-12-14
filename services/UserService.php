<?php

namespace services;

use models\Confirmation;

class UserService extends Service
{
    private $userRepository;

    /**
     * @param $userRepository
     */
    public function __construct($userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function editSetting(int $userId, int $settingId, $newParameter)
    {
        $user = $this->userRepository->get($userId);
        $user['settings'][$settingId] = $newParameter;

        return $this->userRepository->update($user['id'], $user);
    }
}