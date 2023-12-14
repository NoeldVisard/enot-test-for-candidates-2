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

    public function editSetting(Confirmation $confirmation, $newParameter)
    {
        $user = $this->userRepository->get($confirmation['userId']);
        $user['settings'][$confirmation['settingId']] = $newParameter;

        return $this->userRepository->update($user['id'], $user);
    }
}