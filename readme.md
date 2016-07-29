# Easy Sweet Alert Messages for Laravel

## Installation

First, pull in the package through Composer.

```javascript
"require": {
    "germey/sweetalert": "dev-master"
}
```

If using Laravel 5, include the service provider within `config/app.php`.

```php
'providers' => [
    Germey\SweetAlert\SweetAlertServiceProvider::class
];
```

And, for convenience, add a facade alias to this same file at the bottom:

```php
'aliases' => [
    'SweetAlert' => Germey\SweetAlert\SweetAlert::class
];
```

## Usage

### With the Facade

Within your controllers, before you perform a redirect...

```php
public function store()
{
    SweetAlert::message('Robots are working!');

    return Redirect::home();
}
```

### With the Helper

- `alert($message = null, $title = '')`

In addition to the previous listed methods you can also just use the helper
function without specifying any message type. Doing so is similar to:

- `alert()->message('Message', 'Optional Title')`

Like with the Facade we can use the helper with the same methods:

```php
alert()->message('Message', 'Optional Title');
alert()->basic('Basic Message', 'Mandatory Title');
alert()->info('Info Message', 'Optional Title');
alert()->success('Success Message', 'Optional Title');
alert()->error('Error Message', 'Optional Title');
alert()->warning('Warning Message', 'Optional Title');

alert()->basic('Basic Message', 'Mandatory Title')
    ->autoclose(3500);

alert()->error('Error Message', 'Optional Title')
    ->persistent('Close');
```

Within your controllers, before you perform a redirect...

```php
/**
 * Destroy the user's session (logout).
 *
 * @return Response
 */
public function destroy()
{
    Auth::logout();

    alert()->success('You have been logged out.', 'Good bye!');

    return home();
}
```

For a general information alert, just do: `alert('Some message');` (same as `alert()->message('Some message');`).

By default, all alerts will dismiss after a sensible default number of seconds.

But no fear, if you need to specify a different time you can:

```php
    // -> Remember!, the number is set in milliseconds
    alert('Hello World!')->autoclose(3000);
```

Also, if you need the alert to be persistent on the page until the user dismiss it by pressing the alert confirmation button:

```php
    // -> The text will appear in the button
    alert('Hello World!')->persistent("Close this");
```

Finally, to display the alert in the browser, you may use (or modify) the view that is included with this package. Simply include it to your layout view:

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/sweetalert.css">
</head>
<body>

    <div class="container">
        <p>Welcome to my website...</p>
    </div>

    <script src="js/sweetalert.min.js"></script>

    <!-- Include this after the sweet alert js file -->
    @include('sweetalert::alert')

</body>
</html>
```


