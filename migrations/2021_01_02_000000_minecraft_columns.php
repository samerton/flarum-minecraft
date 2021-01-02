<?php

use Flarum\Database\Migration;

return Migration::addColumns('users', [
    'mcname' => ['string', 'length' => 32, 'nullable' => true],
    'uuid' => ['string', 'length' => 64, 'nullable' => true]
]);
