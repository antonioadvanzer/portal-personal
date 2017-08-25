<div class="row-fluid">
  <div class="col-xlg-3 col-lg-12 col-sm-6 col-sm-6">
    <div ba-panel ba-panel-class="banner-column-panel">
      <div class="banner">
        <div class="large-banner-wrapper">
          <img ng-src="@{{::( 'app/vacaciones/vacation1.jpg' | appImage )}}" alt=""/>
        </div>
        <div class="banner-text-wrapper">
          <div class="banner-text">
            <h1>Vacaciones</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row-fluid">
  
    <div class="col-xlg-3 col-lg-12  col-md-6 col-sm-6">
        <div ba-panel ba-panel-class="with-scroll more-text-widget" ba-panel-title="Opciones">
          <div class="section-block light-text">
              
            <div class="row btns-row btns-same-width-lg ng-scope">
                <div class="col-sm-6 col-xs-6">
                    <button type="button" class="btn btn-primary btn-with-icon" ng-click="getForm()">
                        <i class="ion-android-open"></i>Solicitar
                    </button>
                </div>
                <div class="col-sm-6 col-xs-6">
                    <button type="button" class="btn btn-primary btn-with-icon" ng-click="getSolicitudes()">
                        <i class="ion-ios-list-outline"></i>Solicitudes
                    </button>
                </div>
            </div>
            
          </div>
        </div>
    </div>
    
  <div class="col-xlg-3 col-lg-12  col-md-6 col-sm-6">
    <div ba-panel ba-panel-class="with-scroll more-text-widget" ba-panel-title="antigüedad">
      <div class="section-block light-text">
        <p>Las vacaciones que generas como empleado de Advanzer/Entuizer son de acuerdo al artículo 76 de la Ley Federal del Trabajo (en rojo los días que te corresponden de acuerdo a tu antigüedad): 
        </p>
      </div>
    </div>
  </div>

  <div class="col-lg-12 col-md-6">
      
    <div ba-panel ba-panel-title="Relación de Dias" ba-panel-class="with-scroll more-text-widget">
      <div include-with-scope="theme/modules/vacations/days_for_year"></div>
      <br><br>
      <div include-with-scope="theme/modules/vacations/days_available"></div>
    </div>
  
  </div>

  <div class="col-xlg-3 col-lg-12  col-md-6 col-sm-6">
    <div ba-panel ba-panel-class="with-scroll more-text-widget" ba-panel-title="Premisas Básicas">
      <div class="section-block light-text lists-widget" align="left">
        <ul type="a" class="">
          <li>Los días que se consideran como hábiles, son los días que laboras de acuerdo a tus condiciones contractuales. Por ejemplo: Si laboras de Lunes a Viernes, los días hábiles son esos 5 y los días Sábado y Domingo no se contabilizan como vacaciones sino como días de descanso.</li>
          <li>Podrás disfrutar de los días proporcionales de vacaciones que te corresponden a partir de los 9 meses de ingreso a la empresa.</li>
          <li>A partir de tu fecha de aniversario cuentas con un período de 18 meses para disfrutar tus días de vacaciones. Los días de vacaciones que no se disfruten dentro del período de 18 meses establecido no se acumularán para el siguiente período y caducarán. Por ningún motivo se pagarán los días no disfrutados.</li>
          <li>La Prima Vacacional será pagada en la segunda quincena del mes que corresponda a tu aniversario de la empresa y corresponde al 25% de los días de vacaciones generados en el período que acabe de cerrar.</li>
          <li>Las vacaciones deberán solicitarse con un período mínimo de 30 días y las autorizaciones que deberás gestionar son las siguientes (según aplique): 
            <ul type="square">
              <li>Si estás en proyecto: El líder de proyecto te autorizará.</li>
              <li>Si no estás en proyecto o eres área administrativa: El superior inmediato de acuerdo a la estructura será quien autorice.</li>
            </ul>
          </li>
          <li>Una vez autorizadas por tu líder/superior, tu solicitud pasará a validación por parte de Capital Humano. Una vez que Capital Humano valide, se te notificará vía correo electrónico.</li>
          <li>Los d&iacute;as mostrados como disponibles, son los dias proporcionales disponibles al día de hoy.</li>
        </ul>
      </div>
    </div>
  </div>

</div>
