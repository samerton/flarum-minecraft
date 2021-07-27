<?php

use Flarum\Extend;
use Flarum\Api\Serializer\BasicUserSerializer;
use Flarum\User\Event\Saving;

use Samerton\FlarumMinecraft\Listener\SaveMinecraftFields;

return [
    (new Extend\Frontend('forum'))
        ->js(__DIR__.'/js/dist/forum.js'),
    (new Extend\ApiSerializer(BasicUserSerializer::class))
        ->attribute('mcname', function($serializer, $user, $attributes) {
            return $user->mcname;
        })
        ->attribute('uuid', function($serializer, $user, $attributes) {
            return $user->uuid;
        }),
    (new Extend\Event)
        ->listen(Saving::class, SaveMinecraftFields::class),
];
