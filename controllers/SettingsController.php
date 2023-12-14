<?php

class SettingsController extends Controller
{
    private $confirmationService;

    /**
     * @param $confirmationServices
     */
    public function __construct($confirmationService)
    {
        $this->confirmationService = $confirmationService;
    }

    public function actionSettingsPage()
    {
        // ...
        $this->render('settings', ['data' => 'data']);
    }

    public function actionRequestConfirmation(int $settingId)
    {
        $this->confirmationService->createConfirmation($app->userId, $settingId);

        $this->returnStatus(200, ['data' => 'data']);
    }
}