import app from 'flarum/app';
import User from 'flarum/models/User';

app.initializers.add('samerton/flarum-minecraft', function () {
  User.prototype.avatarUrl = function () {
    const avatarUrl = this.attribute('avatarUrl');
    const uuid = this.attribute('uuid');

    if (avatarUrl) {
      return avatarUrl;
    }

    return "https://crafatar.com/avatars/" + uuid + "?size=128&overlay";
  };
});
