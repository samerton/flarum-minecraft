<?php

namespace Samerton\FlarumMinecraft\Listener;

use Flarum\User\Event\Saving;
use Illuminate\Support\Arr;

class SaveMinecraftFields {
    public function handle(Saving $event) {
        $user = $event->user;
        $data = $event->data;
        $actor = $event->actor;

        $isSelf = $actor->id === $user->id;
        $canEdit = $actor->can('edit', $user);
        $attributes = Arr::get($data, 'attributes', []);

        if (isset($attributes['mcname'])) {
            if (!$isSelf) {
                $actor->assertPermission($canEdit);
            }
            $user->mcname = $attributes['mcname'];
        }

        if (isset($attributes['uuid'])) {
            if (!$isSelf) {
                $actor->assertPermission($canEdit);
            }
            $user->uuid = $attributes['uuid'];
        }

        if (isset($attributes['mcname']) || isset($attributes['uuid'])) {
            $user->save();
        }
    }
}
