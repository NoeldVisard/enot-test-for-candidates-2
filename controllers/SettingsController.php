<?php

class SettingsController extends Controller
{
    public function actionSettingsPage()
    {
        // ...
        $this->render('settings', ['data' => 'data']);
    }

    public function actionRequestConfirmation(int $settingId)
    {
        $confirmationService = new \services\ConfirmationService();

        $confirmationService->createConfirmation($app->userId, $settingId);

        $this->returnStatus(200, ['data' => 'data']);
    }
}