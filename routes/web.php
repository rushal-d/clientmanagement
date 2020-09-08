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

Route::get('/', 'Auth\LoginController@showLoginForm');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('/');
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'permissionmiddleware', 'web']], function () {

/*User management roles------ENTRUST*/
Route::resource('role', 'RoleController');
Route::resource('permission', 'PermissionController');
Route::post('/permission/add', 'PermissionController@add')->name('permission.add');
Route::post('/permission/addmenu', 'PermissionController@displayNameStore')->name('permission.addmenu');
Route::resource('user', 'UserController');
Route::resource('assignrole', 'AssignRoleController');

/*New Menu*/
Route::get('menu', 'MenuController@index')->name('menu-index');
Route::post('menu/store', 'MenuController@store')->name('menu-store');
Route::post('menu/buildMenu', 'MenuController@buildMenu')->name('menu-build-menu');
Route::post('menu/delete', 'MenuController@destroy')->name('menu-delete');
Route::get('menu/search', 'MenuController@search')->name('menu-search');
Route::post('menu/displayNameStore', 'MenuController@displayNameStore')->name('display-name-store');

//my routes
// Route::resource('clients', 'PostsController');
// Route::resource('categories', 'CategoryController');
// Route::resource('servtypes', 'ServtypeController');
// Route::resource('services', 'ServiceController');

/*Category Routes*/
Route::get('/category', 'CategoryController@index')->name('category.index');
Route::get('/category/create', 'CategoryController@create')->name('category.create');
Route::post('/category/store', 'CategoryController@store')->name('category.store');
Route::get('/category/show/{id}', 'CategoryController@show')->name('category.show');
Route::get('/category/edit/{id}', 'CategoryController@edit')->name('category.edit');
Route::patch('/category/update/{id}', 'CategoryController@update')->name('category.update');
Route::get('/category/destroy/{id}', 'CategoryController@destroy')->name('category.destroy');
Route::post('/category/phone', 'CategoryController@phone')->name('category.phone');
Route::post('/category/sendSMS', 'CategoryController@sendSMS')->name('category.sendSMS');

/*Client Routes*/
Route::get('/client', 'ClientController@index')->name('client.index');
Route::get('/client/create', 'ClientController@create')->name('client.create');
Route::post('/client/store', 'ClientController@store')->name('client.store');
Route::get('/client/show/{id}', 'ClientController@show')->name('client.show');
Route::get('/client/edit/{id}', 'ClientController@edit')->name('client.edit');
Route::patch('/client/update/{id}', 'ClientController@update')->name('client.update');
Route::get('/client/destroy/{id}', 'ClientController@destroy')->name('client.destroy');

/*Servicetype Routes*/
Route::get('/servicetype', 'ServicetypeController@index')->name('servicetype.index');
Route::get('/servicetype/create', 'ServicetypeController@create')->name('servicetype.create');
Route::post('/servicetype/store', 'ServicetypeController@store')->name('servicetype.store');
Route::get('/servicetype/show/{id}', 'ServicetypeController@show')->name('servicetype.show');
Route::get('/servicetype/edit/{id}', 'ServicetypeController@edit')->name('servicetype.edit');
Route::patch('/servicetype/update/{id}', 'ServicetypeController@update')->name('servicetype.update');
Route::get('/servicetype/destroy/{id}', 'ServicetypeController@destroy')->name('servicetype.destroy');

/*Services Routes*/
Route::get('/service', 'ServiceController@index')->name('service.index');
Route::get('/service/create', 'ServiceController@create')->name('service.create');
Route::post('/service/store', 'ServiceController@store')->name('service.store');
Route::get('/service/show', 'ServiceController@show')->name('service.show');
Route::get('/service/invoice/{id}', 'ServiceController@invoice')->name('service.invoice');
Route::get('/service/edit/{id}', 'ServiceController@edit')->name('service.edit');
Route::patch('/service/update/{id}', 'ServiceController@update')->name('service.update');
Route::get('/service/destroy/{id}', 'ServiceController@destroy')->name('service.destroy');
Route::get('/service/bulkinvoice/', 'ServiceController@bulkInvoice')->name('service.bulkinvoice');
Route::get('/service/bulkedit/', 'ServiceController@bulkEdit')->name('service.bulkedit');
Route::patch('/service/bulkupdate', 'ServiceController@bulkUpdate')->name('service.bulkupdate');
Route::get('/service/addservice', 'ServiceController@addService')->name('service.addservice');
Route::post('service/saveservice', 'ServiceController@saveService')->name('service.saveservice');
Route::get('/service/bulkdelete', 'ServiceController@bulkDelete')->name('service.bulkdelete');
Route::get('/service/pdf', 'ServiceController@pdf')->name('service.pdf');


Route::get('/quotation', 'QuotationController@index')->name('quotation.index');
Route::get('/quotation/finalized', 'QuotationController@finalized')->name('quotation.finalized');
Route::get('/quotation/create', 'QuotationController@create')->name('quotation.create');
Route::post('/quotation/store', 'QuotationController@store')->name('quotation.store');
Route::get('/quotation/show/{id}', 'QuotationController@show')->name('quotation.show');
Route::get('quotation/showByQuotation', 'QuotationController@showByQuotation')->name('quotation.showbyquotation');
Route::get('/quotation/invoice/{id}', 'QuotationController@invoice')->name('quotation.invoice');
Route::get('/quotation/groupinvoice', 'QuotationController@groupInvoice')->name('quotation.groupinvoice');
Route::get('/quotation/edit/{id}', 'QuotationController@edit')->name('quotation.edit');
Route::get('/quotation/bulkedit', 'QuotationController@bulkEdit')->name('quotation.bulkedit');
Route::PATCH('/quotation/bulkupdate', 'QuotationController@bulkUpdate')->name('quotation.bulkupdate');
Route::get('/quotation/update/{id}', 'QuotationController@update')->name('quotation.update');
Route::get('/quotation/updatequotation', 'QuotationController@updateQuotation')->name('quotation.updatequotation');
Route::get('/quotation/destroy{id}', 'QuotationController@destroy')->name('quotation.destroy');
Route::get('/quotation/addquotation', 'QuotationController@addquotation')->name('quotation.addquotation');
Route::post('/quotation/savequotation', 'QuotationController@savequotation')->name('quotation.savequotation');
Route::get('/quotation/addtoservices', 'QuotationController@addToServices')->name('quotation.addtoservices');
Route::POST('/quotation/storetoservices', 'QuotationController@storeToServices')->name('quotation.storetoservices');
Route::get('/quotation/finalizedquotation', 'QuotationController@finalizedquotation')->name('quotation.finalizedquotation');
Route::get('/quotation/showfinalizedquotation', 'QuotationController@showfinalizedquotation')->name('quotation.showfinalizedquotation');
Route::get('/quotation/bulkdelete', 'QuotationController@bulkDelete')->name('quotation.bulkdelete');
Route::get('/quotation/bulkeditfinalized', 'QuotationController@bulkEditFinalized')->name('quotation.bulkeditfinalized');
Route::PATCH('/quotation/bulkupdatefinalized', 'QuotationController@bulkUpdateFinalized')->name('quotation.bulkupdatefinalized');
Route::get('/quotation/pdf', 'QuotationController@pdf')->name('quotation.pdf');

});



Route::get('form-index', function () {
    return view('form.index');
});

Route::get('form-create', function () {
    return view('form.create');
});

Route::get('form-show', function () {
    return view('form.show');
});
Route::get('chalani-index', function () {
    return view('chalani.index');
});

Route::get('chalani-create', function () {
    return view('chalani.create');
});

Route::get('chalani-show', function () {
    return view('chalani.show');
});
