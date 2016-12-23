<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/* =========== ROUTES FOR SEASON ===========  */
Route::resource('seasons', 'SeasonController');
/*Route::get('/seasons/create', 'SeasonController@create');
Route::get('/season/{season_id}', 'SeasonController@show');
Route::get('/seasons', 'SeasonController@index');
Route::get('/season/{season_id}/edit', 'SeasonController@edit');
Route::delete('/season/{season_id}', 'SeasonController@destroy');
Route::get('/seasons_json', 'SeasonController@json');*/
/* =========== END ROUTES FOR SEASON ===========  */

/* =========== ROUTES FOR WEEK ===========  */
Route::resource('weeks', 'WeekController');
/*Route::get('/weeks/create', 'WeekController@create');
Route::get('/week/{week_id}', 'WeekController@show');
Route::get('/weeks', 'WeekController@index');
Route::get('/week/{week_id}/edit', 'WeekController@edit');
Route::delete('/week/{week_id}', 'WeekController@destroy');
Route::get('/weeks_json', 'WeekController@json');*/
/* =========== END ROUTES FOR WEEK ===========  */

/* =========== ROUTES FOR TEAM ===========  */
Route::resource('teams', 'TeamController');
/*Route::get('/teams/create', 'TeamController@create');
Route::get('/team/{team_id}', 'TeamController@show');
Route::get('/teams', 'TeamController@index');
Route::get('/team/{team_id}/edit', 'TeamController@edit');
Route::delete('/team/{team_id}', 'TeamController@destroy');
Route::get('/teams_json', 'TeamController@json');*/
/* =========== END ROUTES FOR TEAM ===========  */

/* =========== ROUTES FOR PLAYER ===========  */
Route::resource('players', 'PlayerController');
/*Route::get('/players/create', 'PlayerController@create');
Route::get('/player/{player_id}', 'PlayerController@show');
Route::get('/players', 'PlayerController@index');
Route::get('/player/{player_id}/edit', 'PlayerController@edit');
Route::delete('/player/{player_id}', 'PlayerController@destroy');
Route::get('/players_json', 'PlayerController@json');*/
/* =========== END ROUTES FOR PLAYER ===========  */

/* =========== ROUTES FOR ADDRESS ===========  */
Route::resource('addresses', 'AddressController');
/*Route::get('/addresses/create', 'AddressController@create');
Route::get('/address/{address_id}', 'AddressController@show');
Route::get('/addresses', 'AddressController@index');
Route::get('/address/{address_id}/edit', 'AddressController@edit');
Route::delete('/address/{address_id}', 'AddressController@destroy');
Route::get('/addresses_json', 'AddressController@json');*/
/* =========== END ROUTES FOR ADDRESS ===========  */

/* =========== ROUTES FOR RANKING ===========  */
Route::resource('rankings', 'RankingController');
/*Route::get('/rankings/create', 'RankingController@create');
Route::get('/ranking/{ranking_id}', 'RankingController@show');
Route::get('/rankings', 'RankingController@index');
Route::get('/ranking/{ranking_id}/edit', 'RankingController@edit');
Route::delete('/ranking/{ranking_id}', 'RankingController@destroy');*/
Route::get('/rankings_json', 'RankingController@json');
/* =========== END ROUTES FOR RANKING ===========  */