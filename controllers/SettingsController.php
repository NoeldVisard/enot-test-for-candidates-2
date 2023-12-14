<?php

class SettingsController extends Controller
{
    public function actionSettingsPage()
    {
        // ...
        $this->render('settings', ['data' => 'data']);
    }

    /**
     * action для изменения настройки пользователем
     * @param int $settingId
     * @return void
     */
    public function actionEditSetting(int $settingId)
    {
        $confirmationService = new \services\ConfirmationService();

        $confirmationService->createConfirmation($app->userId, $settingId);

        $this->render('edit-setting');
    }
}