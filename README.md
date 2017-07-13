Usage:

1. Add service provider in config/app.php
```php
PS\Gravatar\GravatarServiceProvider::class,
```
2. Use
```php
PS\Gravatar::generate(Auth::user()->email, ['s' => 200]);
```

For all options check [Gravatar docs](https://gravatar.com).
