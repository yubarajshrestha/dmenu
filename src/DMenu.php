<?php
namespace YubarajShrestha\DMenu;

use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use YubarajShrestha\DMenu\Exceptions\DMenuException;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use YubarajShrestha\DMenu\Interfaces\DMenuInterface;

class DMenu
{

	/** @var integer */
	public $id;

    /** @var string */
    public $title;

    /** @var string */
    public $url;

    /** @var string */
    public $model;

    /** @var integer */
    public $perPage;

    /** @var \Illuminate\Support\Collection */
    public $items;

    public function __construct($resolver)
    {
        $this->id = Str::slug($resolver['name']);
        $this->title = $resolver['name'];
        $this->url = $resolver['url'];
        $this->model = urlencode($resolver['model']);
        $this->perPage = (int) $resolver['display-items'];
        $this->items = $this->resolveItems($resolver['model'] . '@getMenuItems');
    }

    protected function resolveItems($resolver): Collection
    {
        $resolver = Arr::wrap($resolver);
        $paginator = app()->call(
            array_shift($resolver), [$this->perPage]
        );
        return collect($paginator->items())->map(function ($dMenu) {
            return $this->castToFeedItem($dMenu);
        });
    }

    protected function castToFeedItem($dMenu): MenuItems
    {
        if (is_array($dMenu)) {
            $dMenu = new MenuItems($dMenu);
        }

        if ($dMenu instanceof MenuItems) {
            $dMenu->validate();
        }

        if (! $dMenu instanceof DMenuInterface) {
            throw DMenuException::notFeedable($dMenu);
        }

        $menuItem = $dMenu->dMenu();

        if (! $menuItem instanceof MenuItems) {
            throw DMenuException::notAFeedItem($menuItem);
        }

        $menuItem->validate();
        
        return $menuItem;
    }

}
