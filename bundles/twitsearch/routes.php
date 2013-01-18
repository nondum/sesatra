<?php

// Route::get('(:bundle)/run', 'twitsearch::tweets@run');
// Route::get('(:bundle)/runall', 'twitsearch::tweets@runAll');
// Route::get('(:bundle)/run/(:any)', 'twitsearch::tweets@run');
// Route::get('(:bundle)/populate', 'twitsearch::tweets@populate');

/*
|--------------------------------------------------------------------------
| Controllers
|--------------------------------------------------------------------------
|
| Detects all controller under Orchestra bundle and register it to routing
 */
Route::controller(array(
	'twitsearch::tweets',
));