# iArticles

[![GitHub stars](https://img.shields.io/github/stars/yubarajshrestha/laravel-module.svg)](https://github.com/yubarajshrestha/iarticles/stargazers)
[![Latest Stable Version](https://poser.pugx.org/yubarajshrestha/iarticles/v/stable)](https://packagist.org/packages/yubarajshrestha/iarticles)
[![Total Downloads](https://poser.pugx.org/yubarajshrestha/iarticles/downloads)](https://packagist.org/packages/yubarajshrestha/iarticles)
[![License](https://poser.pugx.org/yubarajshrestha/iarticles/license)](https://packagist.org/packages/yubarajshrestha/iarticles)

**Dynamic Menu by the name, generates the dynamice pages with minor code playing.**

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

#### Step 4: Implement DMenuInterface to your Model and configure as follows
```php
use YubarajShrestha\DMenu\DMenuInterface;
use YubarajShrestha\DMenu\MenuItems;
class YourModel implements InstantArticle {


    /** 
     * Instant Article
     * @return Collection of YourModel
     */
    public static function getFeedItems()
    {
        return YourModel::latest()->get()->take(25);
    }

    /** 
     * Filter Feed Data
     * @return iArticle Object
     */
    public function iArticle()
    {
        return Articles::create([
            'id' => $this->id, // required | integer
            'title' => $this->name, // required | string
            'subtitle' => '', // nullable | string
            'kicker' => $this->kicker, // nullable | string
            'summary' => '', // required | string
            'description' => '', // required | string
            'cover' => '', // nullable | string
            'updated' => '', // required | date
            'published' => Carbon::parse($this->created_at), // required | date
            'link' => '', // full url to item...
            'author' => '' // nullable | email | string
        ]);
    }
}
```

#### Step 5: Awesome
1. Your project is now ready to go :+1:.
# Publish Materials
	`php artisan vendor:publish --tag=dmenu --force`