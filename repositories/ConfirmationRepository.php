<?php

namespace repositories;

use models\Confirmation;

class ConfirmationRepository extends Repository
{
    public function insert(Confirmation $confirmation)
    {
        $this->save('confirmations', $confirmation);
    }

    public function edit(Confirmation $confirmation)
    {
        $this->update('confirmations', $confirmation);
    }
}