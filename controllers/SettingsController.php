<?php

class SettingsController extends Controller
{
    private $confirmationService;
    private $userService;

    /**
     * @param $confirmationServices
     */
    public function __construct($confirmationService, $userService)
    {
        $this->confirmationService = $confirmationService;
        $this->userService = $userService;
    }

    public function actionSettingsPage()
    {
        // ...
        $this->render('settings', ['data' => 'data']);
    }

    public function actionRequestConfirmation(int $settingId)
    {
        $confirmation = $this->confirmationService->createConfirmation($app->userId, $settingId);
        $this->confirmationService->sendConfirmationCode($app->userId, $confirmation['code']);

        $this->returnStatus(200, ['data' => 'data']);
    }

    public function actionEditSetting(string $confirmationCode, $parameter)
    {
        if ($this->confirmationService->isConfirmationCorrect($app->userId, $confirmationCode)) {
            $confirmation = $this->confirmationService->getConfirmation($app->userId);

            $this->userService->editSetting($confirmation, $parameter);
            $this->confirmationService->deleteConfirmation($app->userId);

            $this->render('settings', ['data' => 'data']);
        } else {
            $this->returnStatus(402, ['error' => 'Неверный код']);
        }
    }
}