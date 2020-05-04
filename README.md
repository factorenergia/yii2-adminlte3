
<p align="center">
  <img src="https://www.factorenergia.com/wp-content/themes/factorenergia/images/logo.png" width="500">
</p>

**``yii2-adminlte3`` is a yii2 extension that makes use of the famous free template AdminLTE3 with Bootstrap4.**

### How to install

Install via composer with:

```
composer require factorenergia/yii2-adminlte3
```
### How to use
On your main view, like `Layout.php` you must register the assets of this extension:

```php

// Top of your view file, Layout is good because most of your app goes inside of it
factorenergia\adminlte\assets\FontAwesomeAsset::register($this);
factorenergia\adminlte\assets\BasicAsset::register($this);

```
