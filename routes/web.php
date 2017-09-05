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

/* Static Functions */
Route::group(['prefix' => 'advanzer/service'], function () {
    
    // Increment days
    Route::get('/refresh_vacations', 'VacationController@service_calculateVacations');

    // Take days off
    Route::get('/consume_days', 'VacationController@service_removeDaysVacations');
});

// HTML Theme Blur Admin Template
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
        
        Route::get('/main', 'MainController@mainView');
        Route::get('/home', 'MainController@mainViewHome');

        // General Modals
        Route::get('/success_modal/{msg}', 'View\ThemeController@main_successModal');
        Route::get('/danger_modal/{msg}', 'View\ThemeController@main_dangerModal');

        // User mode componets
        Route::group(['prefix' => 'modules'], function () {

            Route::group(['prefix' => 'user'], function () {

                // Views
                Route::get('/get_bosses', 'UserController@admin_getBosses');
                Route::get('/get_profile', 'UserController@main_getPersonalInformationForm');
                Route::get('/tabla_personal_a_cargo', 'UserController@main_tablaPersonalACargo');

                // Resources
                Route::get('/get_directors', 'UserController@main_getDirectors');
                Route::get('/get_authorizers', 'UserController@main_getAuthorizers');
                
                Route::get('/users_employed/{id_user}', 'UserController@main_getUsersEmployed');

            });

            Route::group(['prefix' => 'area'], function () {
                Route::get('/areas_activas', 'AreaController@admin_getAreasActive');
            });

            Route::group(['prefix' => 'track'], function () {
                Route::get('/tracks_activos', 'TrackController@admin_getListTracks');
            });

            Route::group(['prefix' => 'position'], function () {
                Route::get('/posiciones_activas_por_track/{id}', 'PositionController@admin_getPositionsActiveByTrack');
            });

            Route::group(['prefix' => 'evaluation'], function () {
                
                Route::get('/information', 'EvaluationController@main_information');
            
            });

            Route::group(['prefix' => 'requisition'], function () {
                
                /* Views -------------------- */
                Route::get('/information', 'RequisitionController@main_information');

                // New Requisition
                Route::get('/solicitar_requisicion', 'RequisitionController@main_getNewRequisition');
                Route::get('/solicitar', 'RequisitionController@main_getRequisitionForm');

                // Show
                Route::get('/mostrar_requisicion_recibida', 'RequisitionController@main_showRequestReceived');
                Route::get('/mostrar_requisicion_propia', 'RequisitionController@main_showOwnRequest');
                Route::get('/recibida', 'RequisitionController@main_getRequestReceivedForm');
                Route::get('/propia', 'RequisitionController@main_getOwnRequestForm');

                // Tables
                Route::get('/requisiciones_realizadas', 'RequisitionController@main_requisicionesRealizadas');
                Route::get('/requisiciones_recibidas', 'RequisitionController@main_requisicionesRecibidas');
                Route::get('/tabla_requisiciones_realizadas', 'RequisitionController@main_tablaRequisicionesRealizadas');
                Route::get('/tabla_requisiciones_recibidas', 'RequisitionController@main_tablaRequisicionesRecibidas');

                /* Resources -------------------- */

                // Tables
                Route::get('/get_own_requests', 'RequisitionController@main_getOwnRequests');
                Route::get('/get_requests_received', 'RequisitionController@main_getRequestsReceived');

                // Show
                Route::get('/get_request_received/{id_requisition}', 'RequisitionController@main_getRequestReceived');
                Route::get('/get_own_request/{id_requisition}', 'RequisitionController@main_getOwnRequest');

                // Save Data
                Route::post('/store_new_requisition', 'RequisitionController@main_storeNewRequestRequisition');
                
                /*** Actions request ***/
                
                Route::get('/accept_requisition/{id_request}', 'RequisitionController@main_acceptRequisition'); // Accept request
                Route::get('/auth_requisition/{id_request}', 'RequisitionController@main_authRequisition'); // Accept request
                Route::post('/reject_requisition', 'RequisitionController@main_rejectRequisition'); // Reject request

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
                Route::get('/cartas_realizadas', 'LetterController@main_tablaCartas');
                
                Route::get('/vista_cartas', 'LetterController@main_viewCartas');
                Route::get('/tabla_cartas', 'LetterController@main_tableCartas');

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
                Route::get('/solicitudes_realizadas', 'VacationController@main_solicitudesRealizadas');
                Route::get('/solicitudes_recibidas', 'VacationController@main_solicitudesRecibidas');
                Route::get('/tabla_solicitudes_enviadas', 'VacationController@main_tablaSolicitudesRealizadas');
                Route::get('/tabla_solicitudes_percibidas', 'VacationController@main_tablaSolicitudesRecibidas');

                /* Blade */
                Route::get('/vista_solicitudes_realizadas', 'VacationController@main_viewSolicitudesRealizadas');
                Route::get('/tabla_solicitudes_realizadas', 'VacationController@main_tableSolicitudesRealizadas');
                Route::get('/vista_solicitudes_recibidas', 'VacationController@main_viewSolicitudesRecibidas');
                Route::get('/tabla_solicitudes_recibidas', 'VacationController@main_tableSolicitudesRecibidas');

                /* Resources -------------------- */

                // Save Data
                Route::post('/store_new_request', 'VacationController@main_storeNewVacationRequest');

                // Show
                Route::get('/get_request_received/{id_request}', 'VacationController@main_getRequestReceived');
                Route::get('/get_own_request/{id_request}', 'VacationController@main_getOwnRequest');

                // Tables
                Route::get('/get_own_requests', 'VacationController@main_getOwnRequests');
                Route::get('/get_requests_received', 'VacationController@main_getRequestsReceived');

                /*** Actions request ***/
                
                Route::get('/accept_request/{id_request}', 'VacationController@main_acceptRequest'); // Accept request
                
                Route::post('/reject_request', 'VacationController@main_rejectRequest'); // Reject request

                /* Days information */

                Route::get('/get_total_days', 'VacationController@main_getTotalDays'); // Total days available

                Route::get('/get_days_to_expire', 'VacationController@main_getVacationsToExpirate'); // Days to expire

                Route::get('/get_days_in_requests', 'VacationController@get_getDaysInRequests'); // Days to expire

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
                Route::get('/solicitudes_realizadas', 'AbsenceController@main_solicitudesRealizadas');
                Route::get('/solicitudes_recibidas', 'AbsenceController@main_solicitudesRecibidas');
                Route::get('/tabla_solicitudes_enviadas', 'AbsenceController@main_tablaSolicitudesRealizadas');
                Route::get('/tabla_solicitudes_percibidas', 'AbsenceController@main_tablaSolicitudesRecibidas');
                Route::get('/tabla_ocacions', 'AbsenceController@main_tablaOcasion');

                /* Blade */
                Route::get('/vista_solicitudes_realizadas', 'AbsenceController@main_viewSolicitudesRealizadas');
                Route::get('/tabla_solicitudes_realizadas', 'AbsenceController@main_tableSolicitudesRealizadas');
                Route::get('/vista_solicitudes_recibidas', 'AbsenceController@main_viewSolicitudesRecibidas');
                Route::get('/tabla_solicitudes_recibidas', 'AbsenceController@main_tableSolicitudesRecibidas');

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
                
                // Accept request
                Route::get('/accept_absence/{id_absence}', 'AbsenceController@main_acceptAbsence');
                
                // Reject request
                Route::post('/reject_absence', 'AbsenceController@main_rejectAbsence');
            
            });

        });

    });

    // Admin mode componets
    Route::group(['prefix' => 'admin-theme', 'middleware' => 'admin'], function () {
    
        Route::get('/back_top', 'View\ThemeController@admin_backTop');
        Route::get('/ba_sidebar', 'View\ThemeController@admin_baSidebar');
        Route::get('/ba_wizard', 'View\ThemeController@admin_baWizard');
        Route::get('/content_top', 'View\ThemeController@admin_contentTop');
        Route::get('/msg_center', 'View\ThemeController@admin_msgCenter');
        Route::get('/page_top', 'View\ThemeController@admin_pageTop');
        Route::get('/progress_bar_round', 'View\ThemeController@admin_progressBarRound');

        Route::group(['prefix' => 'modules'], function () {
            
            Route::group(['prefix' => 'user'], function () {

                /* Users Admin Views -------------------- */
                
                // Tables
                Route::get('/usuarios_activos', 'UserController@admin_usuariosActivos');
                Route::get('/tabla_usuarios_activos', 'UserController@admin_tablaUsuariosActivos');
                Route::get('/usuarios_inactivos', 'UserController@admin_usuariosInactivos');
                Route::get('/tabla_usuarios_inactivos', 'UserController@admin_tablaUsuariosInactivos');
                Route::get('/tabla_personal_a_cargo', 'UserController@admin_tablaPersonalACargo');
                
                // New
                Route::get('/agregar_usuario', 'UserController@admin_getNewUserForm');

                // Edit
                Route::get('/ver_usuario', 'UserController@admin_showUserEditForm');
            
                /* Users Admin Resources -------------------- */
                
                Route::get('/users_active', 'UserController@admin_getUsersActive');
                Route::get('/users_deactive', 'UserController@admin_getUsersDeactive');
                Route::get('/get_bosses', 'UserController@admin_getBosses');
                Route::get('/get_directors', 'UserController@main_getDirectors');
                Route::get('/get_authorizers', 'UserController@main_getAuthorizers');
                Route::post('/save_new_user', 'UserController@admin_saveNewUser');
                Route::post('/update_user', 'UserController@admin_updateUser');
                Route::get('/users_employed/{id_user}', 'UserController@main_getUsersEmployed');

                // Edit
                Route::get('/get_user/{id_user}', 'UserController@admin_getUserDetail');

                // Search if a nomina exists
                Route::get('/exists_nomina/{number_nomina}', 'UserController@main_existNomina');

                // Search if a email address exists
                Route::get('/exists_email/{email_address}', 'UserController@main_existEmail');
                
            });

            Route::group(['prefix' => 'permission'], function () {
                
                /* Permissions Admin Views -------------------- */
                
                // Permissions table
                Route::get('/lista_permisos', 'PermissionController@admin_listaPermisos');
                Route::get('/tabla_permisos', 'PermissionController@admin_tablaUsuariosPermisos');

                // Permissions By Area
                Route::get('/lista_permisos_por_area', 'PermissionController@admin_listaPermisosPorArea');
                Route::get('/tabla_permisos_por_area', 'PermissionController@admin_tablaUsuariosPermisosPorArea');
                Route::get('/list_permissions_by_area', 'PermissionController@admin_getListPermissionsByArea');
                Route::get('/permisos_por_area/{id}', 'PermissionController@admin_getPermissionsByArea');
                
                // Permissions By Position
                Route::get('/lista_permisos_por_posicion', 'PermissionController@admin_listaPermisosPorPosicion');
                Route::get('/tabla_permisos_por_posicion', 'PermissionController@admin_tablaUsuariosPermisosPorPosicion');
                
                /* Permissions Admin Resources -------------------- */

                // Permissions Admin
                Route::get('/list_permissions', 'PermissionController@admin_getListPermissions');
                Route::get('/list_permissions_by_position', 'PermissionController@admin_getListPermissionsByPosition');
                Route::get('/permisos_por_posicion/{id}', 'PermissionController@admin_getPermissionsByPosition');
            });

            Route::group(['prefix' => 'level'], function () {

                /* Levels Admin Views -------------------- */

                /* Levels Admin Resources -------------------- */

                // Levels table
                Route::get('/list_levels', 'LevelController@admin_getListLevels');
            });

            Route::group(['prefix' => 'direction'], function () {
                
                /* Directions Admin Views -------------------- */
                
                // Directions table
                Route::get('/lista_direcciones', 'DirectionController@admin_listaDirecciones');
                Route::get('/tabla_direcciones', 'DirectionController@admin_tablaDirecciones');
                Route::get('/tabla_areas_por_direccion', 'DirectionController@admin_tablaAreasPorDireccion');

                // New
                Route::get('/crear_direccion', 'DirectionController@admin_getNewDirection');
                Route::get('/agregar', 'DirectionController@admin_getNewDirectionForm');

                // Edit
                Route::get('/ver_direccion', 'DirectionController@admin_showDirection');
                Route::get('/direccion', 'DirectionController@admin_getDirectionForm');

                /* Directions Admin Resources -------------------- */

                // Directions table
                Route::get('/list_directions', 'DirectionController@admin_getListDirections');
                Route::get('/direccion_por_area/{id_area}', 'DirectionController@admin_findDirectionUsingArea');
                Route::get('/areas_by_direction/{id_direction}', 'DirectionController@admin_getAreasByDirection');

                // Save Data
                Route::post('/store_new_direction', 'DirectionController@admin_storeNewDirection');

                // Edit
                Route::get('/get_direction/{id_direction}', 'DirectionController@admin_getDirectionDetail');
               
                // Update Data
                Route::post('/update_direction', 'DirectionController@admin_updateDirection');

                // Delete
                Route::get('/delete_direction/{id_direction}', 'DirectionController@admin_deleteDirection');

            });

            Route::group(['prefix' => 'area'], function () {
                
                /* Areas Admin Views -------------------- */
                
                // Areas table
                Route::get('/lista_areas', 'AreaController@admin_listaAreas');
                Route::get('/tabla_areas', 'AreaController@admin_tablaAreas');

                // New
                Route::get('/crear_area', 'AreaController@admin_getNewArea');
                Route::get('/agregar', 'AreaController@admin_getNewAreaForm');

                // Edit
                Route::get('/ver_area', 'AreaController@admin_showArea');
                Route::get('/area', 'AreaController@admin_getAreaForm');

                /* Areas Admin Resources -------------------- */

                // Areas Admin
                Route::get('/list_areas', 'AreaController@admin_getListAreas');
                Route::get('/areas_activas', 'AreaController@admin_getAreasActive');

                // Save
                Route::post('/store_new_area', 'AreaController@admin_storeNewArea');

                 // Edit
                Route::get('/get_area/{id_area}', 'AreaController@admin_getAreaDetail');
               
                // Update 
                Route::post('/update_area', 'AreaController@admin_updateArea');

                // Delete
                Route::get('/delete_area/{id_area}', 'AreaController@admin_deleteArea');
               
            });

            Route::group(['prefix' => 'position'], function () {

                /* Positions Admin Views -------------------- */
                
                // Positions table
                Route::get('/lista_posiciones', 'PositionController@admin_listaPosiciones');
                Route::get('/tabla_posiciones', 'PositionController@admin_tablaPosiciones');

                // New
                Route::get('/crear_posicion', 'PositionController@admin_getNewPosicion');
                Route::get('/agregar', 'PositionController@admin_getNewPosicionForm');

                // Edit
                Route::get('/ver_posicion', 'PositionController@admin_showPosition');
                Route::get('/posicion', 'PositionController@admin_getPositionForm');

                /* Positions Admin Resources -------------------- */

                // Positions Admin
                Route::get('/list_positions', 'PositionController@admin_getListPositions');
                Route::get('/posiciones_activas', 'PositionController@admin_getPositionActive');

                // Positions list by Track
                Route::get('/posiciones_activas_por_track/{id}', 'PositionController@admin_getPositionsActiveByTrack');

                // Tracks list by Position
                Route::get('/track_by_position/{id}', 'PositionController@admin_getTracksByPosition');

                // Save
                Route::post('/store_new_position', 'PositionController@admin_storeNewPosition');

                 // Edit
                Route::get('/get_position/{id_position}', 'PositionController@admin_getPositionDetail');
               
                // Update 
                Route::post('/update_position', 'PositionController@admin_updatePosition');

                // Delete
                Route::get('/delete_position/{id_position}', 'PositionController@admin_deletePosition');
               
            });

            Route::group(['prefix' => 'track'], function () {

                /* Tracks Admin Views -------------------- */
                
                // Tracks table
                Route::get('/lista_tracks', 'TrackController@admin_listaTracks');
                Route::get('/tabla_tracks', 'TrackController@admin_tablaTracks');
                Route::get('/tabla_posiciones_por_track', 'TrackController@admin_tablaPosicionesPorTrack');

                // New
                Route::get('/crear_track', 'TrackController@admin_getNewTrack');
                Route::get('/agregar', 'TrackController@admin_getNewTrackForm');

                // Edit
                Route::get('/ver_track', 'TrackController@admin_showTrack');
                Route::get('/track', 'TrackController@admin_getTrackForm');

                /* Tracks Admin Resources -------------------- */

                // Tracks table
                Route::get('/positions_by_track/{id_track}', 'TrackController@admin_getPositionsByTrack');

                // Tracks Admin
                Route::get('/tracks_activos', 'TrackController@admin_getListTracks');

                // Save Data
                Route::post('/store_new_track', 'TrackController@admin_storeNewTrack');

                // Edit
                Route::get('/get_track/{id_track}', 'TrackController@admin_getTrackDetail');

                // Update Data
                Route::post('/update_track', 'TrackController@admin_updateTrack');

                // Delete
                Route::get('/delete_track/{id_track}', 'TrackController@admin_deleteTrack');
               
            });

            Route::group(['prefix' => 'request'], function () {
                
                /* Requests Admin Views -------------------- */

                /* Requests */
                Route::get('/todas_las_solicitudes', 'RequestController@admin_allRequests');
                Route::get('/solicitudes_canceladas', 'RequestController@admin_canceledRequests');
                Route::get('/solicitudes_enviadas', 'RequestController@admin_sendedRequests');
                Route::get('/solicitudes_aceptadas', 'RequestController@admin_aceptedRequests');
                Route::get('/solicitudes_rechazadas', 'RequestController@admin_rejectedRequests');
                Route::get('/solicitudes_autorizadas', 'RequestController@admin_authorizedRequests');
                Route::get('/lista_todas_las_solicitudes', 'RequestController@admin_tableAllRequests');
                Route::get('/lista_solicitudes_canceladas', 'RequestController@admin_tableCanceledRequests');
                Route::get('/lista_solicitudes_enviadas', 'RequestController@admin_tableSendedRequests');
                Route::get('/lista_solicitudes_aceptadas', 'RequestController@admin_tableAceptedRequests');
                Route::get('/lista_solicitudes_rechazadas', 'RequestController@admin_tableRejectedRequests');
                Route::get('/lista_solicitudes_autorizadas', 'RequestController@admin_tableAuthorizedRequests');

                Route::get('/lista_solicitudes_por_usuario', 'RequestController@admin_requestsByUser');

                /* Letter */
                //Route::get('/todas_las_cartas', 'RequestController@admin_allLetter');

                Route::get('/lista_cartas_solicitadas_por_usuario', 'RequestController@admin_letterByUser');

                // Show
                Route::get('/mostrar_solicitud', 'RequestController@admin_showRequest');
                Route::get('/solicitada', 'RequestController@admin_getRequestForm');
                
                Route::get('/solicitada_por_usuario', 'RequestController@admin_getRequestByUserForm');

                Route::get('/carta_solicitada_por_usuario', 'RequestController@admin_getLetterByUserForm');

                /* Requests Admin Resources -------------------- */

                // Table

                /* Request */
                Route::get('/get_all_requests', 'RequestController@admin_getAllRequests');
                Route::get('/get_canceled_requests', 'RequestController@admin_getCanceledRequests');
                Route::get('/get_sended_requests', 'RequestController@admin_getSendedRequests');
                Route::get('/get_acepted_requests', 'RequestController@admin_getAceptedRequests');
                Route::get('/get_rejected_requests', 'RequestController@admin_getRejectedRequests');
                Route::get('/get_authorized_requests', 'RequestController@admin_getAuthorizedRequests');
                Route::get('/get_all_requests_by_user/{id_user}', 'RequestController@admin_getAllRequestsByUser');

                /* Letter */
                //Route::get('/get_all_letter', 'LetterController@admin_getAllLetter');
                Route::get('/get_all_letter_by_user/{id_user}', 'RequestController@admin_getAllLetterByUser');

                // Show
                Route::get('/get_request/{id_request}', 'RequestController@admin_getRequest');

                Route::get('/get_letter/{id_letter}', 'RequestController@admin_getLetter');

                // Accept request
                Route::get('/auth_request/{id_request}', 'RequestController@admin_authRequest');

                // Reject request
                Route::post('/reject_request', 'RequestController@admin_rejectRequest');

                // Cancel request
                Route::get('/cancel_request/{id_request}', 'RequestController@admin_cancelRequest');
            });

            Route::group(['prefix' => 'vacations'], function () {
                
                /* Vacations Admin Views -------------------- */

                // Days table
                Route::get('/lista_dias_por_usuario', 'VacationController@admin_tableAccumulatedDays');

                /* Vacations Admin Resources -------------------- */

                // Days by user
                Route::get('/list_days_by_user/{id_user}', 'VacationController@admin_getAccumulatedDaysByUser');

                // Calculate dates
                Route::get('/calcular_fechas/{fecha}', 'VacationController@admin_calculaFechas');
                //Route::get('/insertar_dias', 'VacationController@admin_insertarVacaciones');
                
            });

        });

    });
});