<?php
namespace YubarajShrestha\DMenu\Interfaces;

interface DMenuInterface
{
	/**  */
	public function getMenuItems($items);
	
    /**
     * @return array|\YubarajShrestha\DMenu\DMenuInterface
     */
    public function dMenu();
}
