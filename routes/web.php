<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
/**
 * User credentials protected routes
 */
$router->group(['middleware' => 'auth:api'], function () use ($router) {
    $router->get('/active-user', 'UserController@user');
    $router->get('/logout', 'UserController@logout');
});
$router->group(['middleware' => 'client.credentials'], function () use ($router) {
    /**
     * Routes for client microservice
     */
    $router->get('/clients', 'ClientController@index');
    $router->post('/clients', 'ClientController@store');
    $router->get('/clients/{client}', 'ClientController@show');
    $router->put('/clients/{client}', 'ClientController@update');
    $router->patch('/clients/{client}', 'ClientController@update');
    $router->delete('/clients/{client}', 'ClientController@destroy');
    
    $router->get('/departments', 'DepartmentController@index');
    $router->post('/departments', 'DepartmentController@store');
    $router->get('/departments/{dept}', 'DepartmentController@show');
    $router->put('/departments/{dept}', 'DepartmentController@update');
    $router->patch('/departments/{dept}', 'DepartmentController@update');
    $router->delete('/departments/{dept}', 'DepartmentController@destroy');
   
    $router->get('/client-category', 'ClientCategoryController@index');
    $router->post('/client-category', 'ClientCategoryController@store');
    $router->get('/client-category/{category}', 'ClientCategoryController@show');
    $router->put('/client-category/{category}', 'ClientCategoryController@update');
    $router->patch('/client-category/{category}', 'ClientCategoryController@update');
    $router->delete('/client-category/{category}', 'ClientCategoryController@destroy');

    $router->get('/contacts', 'ContactController@index');
    $router->post('/contacts', 'ContactController@store');
    $router->get('/contacts/{contact}', 'ContactController@show');
    $router->put('/contacts/{contact}', 'ContactController@update');
    $router->patch('/contacts/{contact}', 'ContactController@update');
    $router->delete('/contacts/{contact}', 'ContactController@destroy');

    $router->get('/departments-groupings', 'DepartmentsGroupingController@index');
    $router->post('/departments-groupings', 'DepartmentsGroupingController@store');
    $router->get('/departments-groupings/{group}', 'DepartmentsGroupingController@show');
    $router->put('/departments-groupings/{group}', 'DepartmentsGroupingController@update');
    $router->patch('/departments-groupings/{group}', 'DepartmentsGroupingController@update');
    $router->delete('/departments-groupings/{group}', 'DepartmentsGroupingController@destroy');

    $router->get('/modules', 'ModuleController@index');
    $router->post('/modules', 'ModuleController@store');
    $router->get('/modules/{module}', 'ModuleController@show');
    $router->put('/modules/{module}', 'ModuleController@update');
    $router->patch('/modules/{module}', 'ModuleController@update');
    $router->delete('/modules/{module}', 'ModuleController@destroy');

    $router->get('/sub-departments', 'SubDepartmentController@index');
    $router->post('/sub-departments', 'SubDepartmentController@store');
    $router->get('/sub-departments/{sub_dept}', 'SubDepartmentController@show');
    $router->put('/sub-departments/{sub_dept}', 'SubDepartmentController@update');
    $router->patch('/sub-departments/{sub_dept}', 'SubDepartmentController@update');
    $router->delete('/sub-departments/{sub_dept}', 'SubDepartmentController@destroy');

    $router->get('/subsidiaries', 'SubsidiaryController@index');
    $router->post('/subsidiaries', 'SubsidiaryController@store');
    $router->get('/subsidiaries/{subsidiary}', 'SubsidiaryController@show');
    $router->put('/subsidiaries/{subsidiary}', 'SubsidiaryController@update');
    $router->patch('/subsidiaries/{subsidiary}', 'SubsidiaryController@update');
    $router->delete('/subsidiaries/{subsidiary}', 'SubsidiaryController@destroy');

    /**
     * Routes for users microservice
     */
    $router->get('/users', 'UserController@index');
    $router->post('/users', 'UserController@store');
    $router->get('/users/{user}', 'UserController@show');
    $router->put('/users/{user}', 'UserController@update');
    $router->patch('/users/{user}', 'UserController@update');
    $router->delete('/users/{user}', 'UserController@destroy');

    /**
     * Routes for assets microservice
     */
    $router->get('/axles', 'AxleController@index');
    $router->post('/axles', 'AxleController@store');
    $router->get('/axles/{axle}', 'AxleController@show');
    $router->put('/axles/{axle}', 'AxleController@update');
    $router->patch('/axles/{axle}', 'AxleController@update');
    $router->delete('/axles/{axle}', 'AxleController@destroy');

    $router->get('/client-logs', 'ClientLogController@index');  
    $router->post('/client-logs', 'ClientLogController@store');
    $router->get('/client-logs/{client_log}', 'ClientLogController@show');
    $router->put('/client-logs/{client_log}', 'ClientLogController@update');
    $router->patch('/client-logs/{client_log}', 'ClientLogController@update');
    $router->delete('/client-logs/{client_log}', 'ClientLogController@destroy');

    $router->get('/states', 'StateController@index');
    $router->post('/states', 'StateController@store');
    $router->get('/states/{state}', 'StateController@show');
    $router->put('/states/{state}', 'StateController@update');
    $router->patch('/states/{state}', 'StateController@update');
    $router->delete('/states/{state}', 'StateController@destroy');

    $router->get('/tags', 'TagController@index');   
    $router->post('/tags', 'TagController@store');
    $router->get('/tags/{tag}', 'TagController@show');
    $router->put('/tags/{tag}', 'TagController@update');
    $router->patch('/tags/{tag}', 'TagController@update');
    $router->delete('/tags/{tag}', 'TagController@destroy');

    $router->get('/tag-types', 'TagTypeController@index');   
    $router->post('/tag-types', 'TagTypeController@store');
    $router->get('/tag-types/{tag_type}', 'TagTypeController@show');
    $router->put('/tag-types/{tag_type}', 'TagTypeController@update');
    $router->patch('/tag-types/{tag_type}', 'TagTypeController@update');
    $router->delete('/tag-types/{tag_type}', 'TagTypeController@destroy');

    $router->get('/vehicles', 'VehicleController@index');
    $router->post('/vehicles', 'VehicleController@store');
    $router->get('/vehicles/{vehicle}', 'VehicleController@show');
    $router->put('/vehicles/{vehicle}', 'VehicleController@update');
    $router->patch('/vehicles/{vehicle}', 'VehicleController@update');
    $router->delete('/vehicles/{vehicle}', 'VehicleController@destroy');

    $router->get('/vehicle-dumps', 'VehicleExcelDumpController@index');
    $router->post('/vehicle-dumps', 'VehicleExcelDumpController@store');
    $router->get('/vehicle-dumps/{dump}', 'VehicleExcelDumpController@show');
    $router->put('/vehicle-dumps/{dump}', 'VehicleExcelDumpController@update');
    $router->patch('/vehicle-dumps/{dump}', 'VehicleExcelDumpController@update');
    $router->delete('/vehicle-dumps/{dump}', 'VehicleExcelDumpController@destroy');

    $router->get('/vehicle-status', 'VehicleExcelDumpController@index');
    $router->post('/vehicle-status', 'VehicleExcelDumpController@store');
    $router->get('/vehicle-status/{status}', 'VehicleExcelDumpController@show');
    $router->put('/vehicle-status/{status}', 'VehicleExcelDumpController@update');
    $router->patch('/vehicle-status/{status}', 'VehicleExcelDumpController@update');
    $router->delete('/vehicle-status/{status}', 'VehicleExcelDumpController@destroy');

        /**
     * Routes for transaction microservice
     */
    $router->get('/accounts', 'AccountController@index');
    $router->post('/accounts', 'AccountController@store');
    $router->get('/accounts/{account}', 'AccountController@show');
    $router->put('/accounts/{account}', 'AccountController@update');
    $router->patch('/accounts/{account}', 'AccountController@update');
    $router->delete('/accounts/{account}', 'AccountController@destroy');


    $router->get('/accounts-balances', 'AccountsBalanceController@index');
    $router->post('/accounts-balances', 'AccountsBalanceController@store');
    $router->get('/accounts-balances/{accounts_balance}', 'AccountsBalanceController@show');
    $router->put('/accounts-balances/{accounts_balance}', 'AccountsBalanceController@update');
    $router->patch('/accounts-balances/{accounts_balance}', 'AccountsBalanceController@update');
    $router->delete('/accounts-balances/{accounts_balance}', 'AccountsBalanceController@destroy');


    $router->get('/citations', 'CitationController@index');
    $router->post('/citations', 'CitationController@store');
    $router->get('/citations/{citation}', 'CitationController@show');
    $router->put('/citations/{citation}', 'CitationController@update');
    $router->patch('/citations/{citation}', 'CitationController@update');
    $router->delete('/citations/{citation}', 'CitationController@destroy');

    
    $router->get('/client-invoices', 'ClientInvoiceController@index');
    $router->post('/client-invoices', 'ClientInvoiceController@store');
    $router->get('/client-invoices/{client_invoice}', 'ClientInvoiceController@show');
    $router->put('/client-invoices/{client_invoice}', 'ClientInvoiceController@update');
    $router->patch('/client-invoices/{client_invoice}', 'ClientInvoiceController@update');
    $router->delete('/client-invoices/{client_invoice}', 'ClientInvoiceController@destroy');

    $router->get('/transactions', 'TransactionsController@index');
    $router->post('/transactions', 'TransactionsController@store');
    $router->get('/transactions/{dealer_invoice}', 'TransactionsController@show');
    $router->put('/transactions/{dealer_invoice}', 'TransactionsController@update');
    $router->patch('/transactions/{dealer_invoice}', 'TransactionsController@update');
    $router->delete('/transactions/{dealer_invoice}', 'TransactionsController@destroy');

    $router->get('/excel-dumps', 'ExcelDumpController@index');
    $router->post('/excel-dumps', 'ExcelDumpController@store');
    $router->get('/excel-dumps/{excel_dump}', 'ExcelDumpController@show');
    $router->put('/excel-dumps/{excel_dump}', 'ExcelDumpController@update');
    $router->patch('/excel-dumps/{excel_dump}', 'ExcelDumpController@update');
    $router->delete('/excel-dumps/{excel_dump}', 'ExcelDumpController@destroy');


    $router->get('/invoie-months', 'InvoieMonthController@index');
    $router->post('/invoie-months', 'InvoieMonthController@store');
    $router->get('/invoie-months/{invoie_month}', 'InvoieMonthController@show');
    $router->put('/invoie-months/{invoie_month}', 'InvoieMonthController@update');
    $router->patch('/invoie-months/{invoie_month}', 'InvoieMonthController@update');
    $router->delete('/invoie-months/{invoie_month}', 'InvoieMonthController@destroy');


    $router->get('/lp-matcher-specials', 'LpMatcherSpecialController@index');
    $router->post('/lp-matcher-specials', 'LpMatcherSpecialController@store');
    $router->get('/lp-matcher-specials/{lp_matcher_special}', 'LpMatcherSpecialController@show');
    $router->put('/lp-matcher-specials/{lp_matcher_special}', 'LpMatcherSpecialController@update');
    $router->patch('/lp-matcher-specials/{lp_matcher_special}', 'LpMatcherSpecialController@update');
    $router->delete('/lp-matcher-specials/{lp_matcher_special}', 'LpMatcherSpecialController@destroy');


    $router->get('/lp-matchers', 'LpMatcherController@index');
    $router->post('/lp-matchers', 'LpMatcherController@store');
    $router->get('/lp-matchers/{lp_matcher}', 'LpMatcherController@show');
    $router->put('/lp-matchers/{lp_matcher}', 'LpMatcherController@update');
    $router->patch('/lp-matchers/{lp_matcher}', 'LpMatcherController@update');
    $router->delete('/lp-matchers/{lp_matcher}', 'LpMatcherController@destroy');

    $router->get('/member-search-logs', 'MemberSearchLogController@index');
    $router->post('/member-search-logs', 'MemberSearchLogController@store');
    $router->get('/member-search-logs/{member_search_log}', 'MemberSearchLogController@show');
    $router->put('/member-search-logs/{member_search_log}', 'MemberSearchLogController@update');
    $router->patch('/member-search-logs/{member_search_log}', 'MemberSearchLogController@update');
    $router->delete('/member-search-logs/{member_search_log}', 'MemberSearchLogController@destroy');

    $router->get('/report-types', 'ReportTypeController@index');
    $router->post('/report-types', 'ReportTypeController@store');
    $router->get('/report-types/{report_type}', 'ReportTypeController@show');
    $router->put('/report-types/{report_type}', 'ReportTypeController@update');
    $router->patch('/report-types/{report_type}', 'ReportTypeController@update');
    $router->delete('/report-types/{report_type}', 'ReportTypeController@destroy');
    
    $router->get('/report-invoices', 'ReportController@index');
    $router->post('/report-invoices', 'ReportController@store');
    $router->get('/report-invoices/{trucking_invoice}', 'ReportController@show');
    $router->put('/report-invoices/{trucking_invoice}', 'ReportController@update');
    $router->patch('/report-invoices/{trucking_invoice}', 'ReportController@update');
    $router->delete('/report-invoices/{trucking_invoice}', 'ReportController@destroy');

    $router->get('/weekly-reports', 'WeeklyReportController@index');
    $router->post('/weekly-reports', 'WeeklyReportController@store');
    $router->get('/weekly-reports    /{weekly_report}', 'WeeklyReportController@show');
    $router->put('/weekly-reports/{weekly_report}', 'WeeklyReportController@update');
    $router->patch('/weekly-reports/{weekly_report}', 'WeeklyReportController@update');
    $router->delete('/weekly-reports/{weekly_report}', 'WeeklyReportController@destroy');

    $router->get('/weeks', 'WeekController@index');
    $router->post('/weeks', 'WeekController@store');
    $router->get('/weeks/{week}', 'WeekController@show');
    $router->put('/weeks/{week}', 'WeekController@update');
    $router->patch('/weeks/{week}', 'WeekController@update');
    $router->delete('/weeks/{week}', 'WeekController@destroy');
});

