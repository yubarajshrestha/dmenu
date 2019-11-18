<?php
namespace YubarajShrestha\DMenu\Models;

use Illuminate\Database\Eloquent\Model;

/**
* Model of the table tasks.
*/
class DMenu extends Model
{

    protected $table = 'dmenus';

    protected $fillable = ['name', 'slug', 'description', 'enabled'];

}