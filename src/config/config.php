<?php

return [
    'route-name' => 'd-menu',
    'routes' => [
    	[
    		'name' => 'Name of Model',
            'url' => 'Default url or null', // nullable | string
    		'model' => 'Path of related model', // App\User
            'display-items' => 5, // default is 5
    	]
    ]
];
