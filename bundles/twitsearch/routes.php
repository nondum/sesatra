<?php

Route::get('(:bundle)', function()
{
    return 'Welcome to the Admin bundle!';
});
Route::get('(:bundle)/run', 'twitsearch::tweets@run');
Route::get('(:bundle)/populate', 'twitsearch::tweets@populate');
// Route::post('(:bundle)/preview', 'gravvy::preview@preview');

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