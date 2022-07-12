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

Auth::routes(['register' => false]);

/*
 * Everything below here requires a logged in user
 */
Route::group(['middleware' => ['auth']], function () {

    /*
     * Admin Routes
     */
    Route::group(['middleware' => ['role:super-admin'], 'prefix' => 'admin'], function () {
        Route::resource('agents', Admin\AgentManagement::class);
        Route::resource('articles', Admin\ArticleManagement::class);
        Route::resource('branches', Admin\BranchManagement::class);
        Route::resource('developers', Admin\DeveloperManagement::class);
        Route::resource('developer-regions', Admin\DeveloperRegionManagement::class);
        Route::resource('developments', Admin\DevelopmentManagement::class);
        Route::resource('pages', Admin\PageManagement::class);
        Route::resource('users', Admin\UserManagement::class);
        Route::get('/properties', Admin\PropertyOverview::class)->name('properties.overview');
        Route::get('/reports', Admin\ReportingOverview::class)->name('reports.overview');
        Route::get('/stats', Admin\StatsDashboardController::class)->name('stats.overview');
        Route::get('/reports/profile-completeness', Admin\Reports\ProfileCompleteness::class)->name('reports.profile-completeness');
        Route::get('/reports/recently-created-properties', Admin\Reports\RecentlyCreatedProperties::class)->name('reports.recently-created-properties');
        Route::get('/reports/property-detail/{property}', Admin\Reports\PropertyDetailReport::class)->name('reports.property-detail');
    });
    Route::resource('roles', Admin\RolesManagement::class)->only(['index', 'store', 'edit', 'update', 'destroy']);
    Route::resource('permissions', Admin\PermissionsManagement::class)->only(['index', 'store', 'destroy']);

    /*
     * Business User Routes
     */
    Route::get('accounts', AccountSelection::class)->name('account.selection');

    // Developers
    Route::get('developer-dashboard/{developer}', Developers\DeveloperDashboard::class)->name('developer.dashboard');
    Route::name('developer.')->group(function () {
        Route::get('developer/{developer}/account', 'Developers\Account@index')->name('account');
        Route::put('developer/{developer}/account', 'Developers\Account@update')->name('account.update');

        Route::resource('developer/{developer}/regions', Developers\Regions::class)->only(['index', 'update']);
        Route::get('developer/{developer}/developments', Developers\Developments::class)->name('developments');
    });

    // Developments
    Route::get('development-dashboard/{development}', Developments\DevelopmentDashboard::class)->name('development.dashboard');
    Route::name('development.')->group(function () {
        Route::get('development/{development}/account', 'Developments\Account@index')->name('account');
        Route::put('development/{development}/account', 'Developments\Account@update')->name('account.update');

        Route::resource('development/{development}/enquiries', Developments\Enquiries::class)->only(['index', 'show']);
        Route::resource('development/{development}/adverts', Developments\Adverts::class);
        Route::match(['get', 'post'], 'development/{development}/create-profile', Developments\CreateProfile::class)->name('create-profile');
        Route::resource('development/{development}/profiles', Developments\Profiles::class);

        Route::match(['get', 'post'], 'development/{development}/profile-inventory/{profile}', Developments\ProfileInventory::class)->name('profile-inventory');
    });

    // Agents
    Route::get('agent-dashboard/{agent}', Agents\AgentDashboard::class)->name('agent.dashboard');
    Route::name('agent.')->group(function() {
        // TODO: build this out with the sections we need
    });

    // Branches
    Route::get('branch-dashboard/{branch}', Branches\BranchDashboard::class)->name('branch.dashboard');
    Route::name('branch.')->group(function() {
        // TODO: build this out with the sections we need
    });

    Route::get('/', HomeController::class)->name('home');
});
