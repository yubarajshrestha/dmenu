# dMenu

[![GitHub stars](https://img.shields.io/github/stars/yubarajshrestha/dmenu)](https://img.shields.io/github/stars/yubarajshrestha/dmenu)
[![Latest Stable Version](https://poser.pugx.org/yubarajshrestha/dmenu/v/stable)](https://packagist.org/packages/yubarajshrestha/dmenu)
[![Total Downloads](https://poser.pugx.org/yubarajshrestha/dmenu/downloads)](https://packagist.org/packages/yubarajshrestha/dmenu)
[![License](https://poser.pugx.org/yubarajshrestha/dmenu/license)](https://packagist.org/packages/yubarajshrestha/dmenu)

**Dynamic Menu (dMenu) by the name, generates the dynamice pages with minor code playing.**

> Dynamic menu has been one of the most used module in every project. With few initial setup configurations you'll be able to use dynamic menu builder.

### How to?
#### Step 1: Install package

Install package by executing the command.

```shell
composer require yubarajshrestha/dmenu
```

#### Step 2: Publish Vendor Files
You need to have some files and don't worry it's quite easy. You just want to execute the command now.

```shell
php artisan vendor:publish --tag=dmenu
```
You'll find a `dmenu` config file, few migrations files and yes views that you can play with as per your requirement.

#### Step 3: Implement DMenuInterface to your Model and configure as follows
```php
use YubarajShrestha\DMenu\DMenuInterface;
use YubarajShrestha\DMenu\MenuItems;
class YourModel implements DMenuInterface {


    /** 
     * Menu Items
     * @return Collection of YourModel
     */
    public static function getMenuItems()
    {
        return YourModel::latest()->get()->take(25);
    }

    /** 
     * Filter Menu Item
     * @return dMenu Object
     */
    public function dMenu()
    {
        return MenuItems::create([
            'id' => $this->id,
            'title' => $this->name,
            'link' => '', // full path...
        ]);
    }
}
```

#### Step 4: Awesome
Your project is now ready to go :+1:.