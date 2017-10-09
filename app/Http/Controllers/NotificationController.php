<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Permiso;
use App\Models\Permisos_Usuario;
use App\Models\Posicion_Track;
use App\Models\Jefe;
use App\Models\Nivel;
use App\Models\Solicitud;
use App\Models\Vacaciones;
use App\Models\Tipo_Solicitud;
use App\Models\Estados_Solicitud;
use App\Models\Motivos_Ausencia;
use URL;
use Auth;
use PortalPersonal;

class NotificationCotroller extends Controller
{
    // notifications
    private $mainTypeNotifications = array( 
        ['id' => 1,'name' => 'Vacaciones'],
        ['id' => 2,'name' => 'Permisos de Aucencia'],
        ['id' => 3,'name' => 'Requisiciones']
    );
}
