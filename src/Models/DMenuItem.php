<?php
namespace YubarajShrestha\DMenu\Models;

use Illuminate\Database\Eloquent\Model;

/**
* Model of the table tasks.
*/
class DMenuItem extends Model
{
    protected $table = 'dmenu_items';
    protected $fillable = ['menu_id', 'name', 'model', 'link', 'parameters', 'target', 'parent_id', 'order', 'enabled'];

    protected $with = ['children'];

    protected $casts = [
        'enabled' => 'boolean'
    ];

    public function menu()
    {
        return $this->belongsTo(DMenu::class);
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id')->with('children')->orderby('order');
    }

    public function itemsChildren($parentId)
    {
        return $this->whereParentId($parentId);
    }
}