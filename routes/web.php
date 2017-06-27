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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

//Route::get('/home', 'HomeController@index');

Route::get('/auth', 'MainController@auth')->middleware('guest');
Route::get('/not_found', 'MainController@nf404');

Route::group(['middleware' => 'auth'], function(){
    
    // Home
    Route::get('', 'MainController@index');

    // Admin Mode
    Route::get('/advanzer-admin', 'MainController@admin');

    // HTML Theme Blur Admin Template
    Route::group(['prefix' => 'theme'], function () {
    
        Route::get('/back_top', 'View\ThemeController@backTop');
        Route::get('/ba_sidebar', 'View\ThemeController@baSidebar');
        Route::get('/ba_wizard', 'View\ThemeController@baWizard');
        Route::get('/content_top', 'View\ThemeController@contentTop');
        Route::get('/msg_center', 'View\ThemeController@msgCenter');
        Route::get('/page_top', 'View\ThemeController@pageTop');
        Route::get('/progress_bar_round', 'View\ThemeController@progressBarRound');

        // General Modals
        Route::get('/success_modal/{msg}', 'View\ThemeController@main_successModal');
        Route::get('/danger_modal/{msg}', 'View\ThemeController@main_dangerModal');

        // User mode componets
        Route::group(['prefix' => 'modules'], function () {

            Route::group(['prefix' => 'user'], function () {

                Route::get('/get_bosses', 'UserController@admin_getBosses');                
                
            });

            Route::group(['prefix' => 'evaluation'], function () {
                
                Route::get('/information', 'EvaluationController@main_information');
            
            });

            Route::group(['prefix' => 'letter'], function () {
                
                /* Views -------------------- */
                Route::get('/information', 'LetterController@main_information');

                // New Letter
                Route::get('/solicitar_carta', 'LetterController@main_getNewLetter');
                Route::get('/solicitar', 'LetterController@main_getNewLetterForm');

                // Show
                Route::get('/mostrar_carta', 'LetterController@main_showRequestLetter');
                Route::get('/carta', 'LetterController@main_getRequestLetterForm');
                
                // Tables
                Route::get('/cartas', 'LetterController@main_cartas');
                Route::get('/cartas_realizadas', 'LetterController@main_tablaCartasRealizadas');                

                /* Resources -------------------- */

                // Save Data
                Route::post('/store_new_letter', 'LetterController@main_storeNewLetter');

                // Tables
                Route::get('/get_requests_letter', 'LetterController@main_getRequestsLetter');

                // Show
                Route::get('/get_letter_detail/{id_request}', 'LetterController@main_getRequestLetter');
            
            });

            Route::group(['prefix' => 'vacations'], function () {
                
                /* Views -------------------- */

                Route::get('/information', 'VacationController@main_information');
                Route::get('/days_for_year', 'VacationController@main_tablaDiasPorAnio');
                Route::get('/days_available', 'VacationController@main_tablaDiasDisponibles');

                // New Vacations Request
                Route::get('/solicitar_vacaciones', 'VacationController@main_getNewVacationRequestLetter');
                Route::get('/solicitar', 'VacationController@main_getNewVacationRequestLetterForm');

                // Show
                Route::get('/mostrar_solicitud_recibida', 'VacationController@main_showRequestReceived');
                Route::get('/mostrar_solicitud_propia', 'VacationController@main_showOwnRequest');
                Route::get('/recibida', 'VacationController@main_getRequestReceivedForm');
                Route::get('/propia', 'VacationController@main_getOwnRequestForm');

                // Tables
                Route::get('/solicitudes', 'VacationController@main_solicitudes');
                Route::get('/solicitudes_realizadas', 'VacationController@main_tablaSolicitudesRealizadas');
                Route::get('/solicitudes_recibidas', 'VacationController@main_tablaSolicitudesRecibidas');

                /* Resources -------------------- */

                // Save Data
                Route::post('/store_new_request', 'VacationController@main_storeNewVacationRequestLetter');

                // Show
                Route::get('/get_request_received/{id_request}', 'VacationController@main_getRequestReceived');
                Route::get('/get_own_request/{id_request}', 'VacationController@main_getOwnRequest');

                // Tables
                Route::get('/get_own_requests', 'VacationController@main_getOwnRequests');
                Route::get('/get_requests_received', 'VacationController@main_getRequestsReceived');

                /*** Actions on absences ***/
                
                Route::get('/accept_request/{id_request}', 'VacationController@main_acceptRequest'); // Accept request
                
                Route::post('/reject_request', 'VacationController@main_rejectRequest'); // Reject request

            });

            Route::group(['prefix' => 'absence'], function () {

                /* Views -------------------- */

                Route::get('/information', 'AbsenceController@main_information');

                // New Absence
                Route::get('/solicitar_permiso_de_ausencia', 'AbsenceController@main_getNewAbsence');
                Route::get('/solicitar', 'AbsenceController@main_getAbsenceForm');

                // Show
                Route::get('/mostrar_solicitud_recibida', 'AbsenceController@main_showRequestReceived');
                Route::get('/mostrar_solicitud_propia', 'AbsenceController@main_showOwnRequest');
                Route::get('/recibida', 'AbsenceController@main_getRequestReceivedForm');
                Route::get('/propia', 'AbsenceController@main_getOwnRequestForm');

                // Tables
                Route::get('/solicitudes', 'AbsenceController@main_solicitudes');
                Route::get('/solicitudes_realizadas', 'AbsenceController@main_tablaSolicitudesRealizadas');
                Route::get('/solicitudes_recibidas', 'AbsenceController@main_tablaSolicitudesRecibidas');
                Route::get('/tabla_ocacions', 'AbsenceController@main_tablaOcacion');

                /*** Modals ***/
                Route::get('/comprobante_medico/{id_absence}', 'AbsenceController@main_getComprobanteModal');

                /* Resources -------------------- */
               
                // Tables
                Route::get('/get_ocacions', 'AbsenceController@main_getOcacions');
                Route::get('/get_own_requests', 'AbsenceController@main_getOwnRequests');
                Route::get('/get_requests_received', 'AbsenceController@main_getRequestsReceived');

                // Show
                Route::get('/get_absence_received/{id_absence}', 'AbsenceController@main_getRequestReceived');
                Route::get('/get_own_absence/{id_absence}', 'AbsenceController@main_getOwnRequest');

                // Save Data
                Route::post('/store_new_absence', 'AbsenceController@main_storeNewAbsence');

                /*** Actions on absences ***/
                
                Route::get('/accept_absence/{id_absence}', 'AbsenceController@main_acceptAbsence'); // Accept request
                
                Route::post('/reject_absence', 'AbsenceController@main_rejectAbsence'); // Reject request
            
            });

        });

    });

    // Admin mode componets
    Route::group(['prefix' => 'admin-theme'], function () {
    
        Route::get('/back_top', 'View\ThemeController@admin_backTop');
        Route::get('/ba_sidebar', 'View\ThemeController@admin_baSidebar');
        Route::get('/ba_wizard', 'View\ThemeController@admin_baWizard');
        Route::get('/content_top', 'View\ThemeController@admin_contentTop');
        Route::get('/msg_center', 'View\ThemeController@admin_msgCenter');
        Route::get('/page_top', 'View\ThemeController@admin_pageTop');
        Route::get('/progress_bar_round', 'View\ThemeController@admin_progressBarRound');

        Route::group(['prefix' => 'modules'], function () {
            
            Route::group(['prefix' => 'user'], function () {

                // Users Admin Views
                Route::get('/usuarios_activos', 'UserController@admin_usuariosActivos');
                Route::get('/tabla_usuarios_activos', 'UserController@admin_tablaUsuariosActivos');
                Route::get('/usuarios_inactivos', 'UserController@admin_usuariosInactivos');
                Route::get('/tabla_usuarios_inactivos', 'UserController@admin_tablaUsuariosInactivos');
                Route::get('/agregar_usuario', 'UserController@admin_getNewUserForm');
            
                // Users Admin
                Route::get('/users_active', 'UserController@admin_getUsersActive');
                Route::get('/users_deactive', 'UserController@admin_getUsersDeactive');
                Route::get('/get_bosses', 'UserController@admin_getBosses');
                Route::post('/save_new_user', 'UserController@admin_saveNewUser');
                
            });

            Route::group(['prefix' => 'permission'], function () {
                
                // Permissions Admin Views
                Route::get('/lista_permisos', 'PermissionController@admin_listaPermisos');
                Route::get('/tabla_permisos', 'PermissionController@admin_tablaUsuariosPermisos');

                // Permissions Admin
                Route::get('/list_permissions', 'PermissionController@admin_getListPermissions');

                // Permissions By Area
                Route::get('/lista_permisos_por_area', 'PermissionController@admin_listaPermisosPorArea');
                Route::get('/tabla_permisos_por_area', 'PermissionController@admin_tablaUsuariosPermisosPorArea');
                Route::get('/list_permissions_by_area', 'PermissionController@admin_getListPermissionsByArea');
                Route::get('/permisos_por_area/{id}', 'PermissionController@admin_getPermissionsByArea');
                
                // Permissions By Position
                Route::get('/lista_permisos_por_posicion', 'PermissionController@admin_listaPermisosPorPosicion');
                Route::get('/tabla_permisos_por_posicion', 'PermissionController@admin_tablaUsuariosPermisosPorPosicion');
                Route::get('/list_permissions_by_position', 'PermissionController@admin_getListPermissionsByPosition');
                Route::get('/permisos_por_posicion/{id}', 'PermissionController@admin_getPermissionsByPosition');
            });

            Route::group(['prefix' => 'area'], function () {
                
                // Areas Admin
                Route::get('/areas_activas', 'AreaController@admin_getAreasActive');
               
            });

            Route::group(['prefix' => 'track'], function () {
            
                // Tracks Admin
                Route::get('/tracks_activos', 'TrackController@admin_getTracksActive');
               
            });

            Route::group(['prefix' => 'position'], function () {
            
                // Tracks Admin
                Route::get('/posiciones_activas/{id}', 'PositionController@admin_getPositionsActiveByTrack');
               
            });

            Route::group(['prefix' => 'direction'], function () {
            
                // Directions Admin
                Route::get('/direccion_por_area/{id}', 'DirectionController@admin_findDirectionUsingArea');
               
            });

        });

    });
});