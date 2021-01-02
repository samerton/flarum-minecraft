<?php

use Flarum\Extend;
use Flarum\Api\Serializer\UserSerializer;

return [
    (new Extend\ApiSerializer(UserSerializer::class))
        ->attribute('mcname', function($serializer, $user, $attributes) {
            return $user->mcname;
        })
        ->attribute('uuid', function($serializer, $user, $attributes) {
            return $user->uuid;
        })
];
