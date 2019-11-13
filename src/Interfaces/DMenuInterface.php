<?php
namespace YubarajShrestha\DMenu\Interfaces;

interface DMenuInterface
{

	/**  */
	public function getMenuItems();
	
    /**
     * @return array|\YubarajShrestha\DMenu\DMenuInterface
     */
    public function dMenu();
}
