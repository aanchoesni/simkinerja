<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('guest.login');
});
Route::group(array('before' => 'auth'), function () {
	Route::get('dashboard', 'HomeController@dashboard');
	Route::resource('kinerja','KinerjasController');
	Route::resource('profile','ProfilesController');
	Route::get('editpassword', array('as'=>'home.editpassword', 'uses'=>'HomeController@editPassword'));
    Route::post('updatepassword', array('as'=>'home.updatepassword', 'uses'=>'HomeController@updatePassword'));
    //Route::get('indexkepala',array('as'=>'kepala.indexkelapa','uses'=>'KinerjasController@indexkepala'));
    Route::get('laporanhariini', array('as'=>'laporanhariini', 'uses'=>'KinerjasController@exporthariini'));
    Route::get('laporansemua', array('as'=>'laporansemua', 'uses'=>'KinerjasController@exportsemua'));
    Route::get('laporanperfilter', array('as'=>'laporanperfilter', 'uses'=>'KinerjasController@exportperfilter'));
    Route::get('laporanbulan', array('as'=>'laporanbulan', 'uses'=>'KinerjasController@exportperbulan'));
    Route::get('laporanbulan2', array('as'=>'laporanbulan2', 'uses'=>'KinerjasController@exportperbulan2'));

    Route::get('kerjaall', array('as'=>'kerjaall', 'uses'=>'KinerjasController@indexall'));
    Route::get('kerjahariini', array('as'=>'kerjahariini', 'uses'=>'KinerjasController@indexhariini'));
    Route::get('kerjaper', array('as'=>'kerjaper', 'uses'=>'KinerjasController@indexper'));
    Route::get('kerjabulan', array('as'=>'kerjabulan', 'uses'=>'KinerjasController@indexbulan'));
    Route::get('kerjabulan2', array('as'=>'kerjabulan2', 'uses'=>'KinerjasController@indexbulan2'));

    Route::get('upload', array('as'=>'upload', 'uses'=>'KinerjasController@upload'));
    Route::get('download/{data}', array('as' => 'download', 'uses' => 'KerjasController@downloadfile'));
    Route::get('intemplate', array('as'=>'intemplate', 'uses'=>'TemplatesController@intemplate'));
    Route::get('downloadtemplate/{data}', array('as' => 'downloadtemplate', 'uses' => 'TemplatesController@downloadtemplate'));
	// Route::get('download/{$filed}','KinerjasController@downloadfile');

	Route::group(array('prefix'=>'admin', 'before'=>'admin'), function()
	{
		Route::resource('group','GroupController');
	});
	Route::group(array('prefix'=>'kasubbag', 'before'=>'kasubbag'), function()
	{
		Route::get('indexkasubbag', array('as'=>'kasubbag.kerja.indexkasubbag','uses'=>'KerjasController@indexkasubbag'));
	});
	Route::group(array('prefix'=>'admin', 'before'=>'admin & kepala'), function()
	{
		Route::get('peruniti', array('as'=>'admin.tujab.peruniti', 'uses'=>'TujabsController@perunit'));
		Route::resource('jabatan','JabatansController');
		Route::resource('unit','UnitsController');
		Route::resource('unitkerja','UnitkerjasController');
		Route::resource('tujab','TujabsController');
		Route::resource('satuan','SatuansController');
		Route::resource('template','TemplatesController');
	});
	Route::group(array('prefix'=>'admin', 'before'=>'admin & kepala & kasubbag'), function()
	{
		Route::resource('karyawan','KaryawansController');
		Route::resource('kerja','KerjasController');		
		Route::put('kerja/notvalidasi/{id}', array('as' => 'admin.kerja.notvalidasi', 'uses' => 'KerjasController@notvalidasi'));
		Route::put('kerja/validasi/{id}', array('as' => 'admin.kerja.validasi', 'uses' => 'KerjasController@validasi'));
		Route::get('cekstatus', array('as'=>'cekstatus', 'uses'=>'KerjasController@cekstatus'));
		// Route::get('cekstatus', 'KerjasController@cekstatus');
	});
});
Route::get('login', array('guest.login', 'uses'=>'GuestController@login'));
Route::post('authenticate', 'HomeController@authenticate');
Route::get('logout', 'HomeController@logout');
Route::get('activate', array('as'=>'user.activate', 'uses'=>'KaryawansController@activate'));
Route::get('forgot', array('as'=>'guest.forgot', 'uses'=>'GuestController@forgotPassword'));
Route::post('sendresetcode', array('as'=>'guest.sendresetcode', 'uses'=>'GuestController@sendResetCode'));
Route::get('reset', array('as'=>'guest.createnewpassword', 'uses'=>'GuestController@createNewPassword'));
Route::post('reset', array('as'=>'guest.storenewpassword', 'uses'=>'GuestController@storeNewPassword'));
?>