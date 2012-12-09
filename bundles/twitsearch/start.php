<?php

Autoloader::namespaces(array(
	'Twitsearch\Model' => Bundle::path('twitsearch').'models'.DS,
	'Twitsearch'       => Bundle::path('twitsearch').'libraries'.DS,
));

Autoloader::map(array(
	'Orchestra' => Bundle::path('twitsearch').'twitsearch'.EXT,
));