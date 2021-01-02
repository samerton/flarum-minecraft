<?php

use Flarum\Extend;
use Flarum\Api\Serializer\BasicUserSerializer;

return [
    (new Extend\ApiSerializer(BasicUserSerializer::class))
        ->attribute('mcname', function($serializer, $user, $attributes) {
            return $user->mcname;
        })
        ->attribute('uuid', function($serializer, $user, $attributes) {
            return $user->uuid;
        })
];
