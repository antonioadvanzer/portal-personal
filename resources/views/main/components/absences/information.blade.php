<div class="row-fluid">
  <div class="col-xlg-3 col-lg-12 col-sm-6 col-sm-6">
    <div ba-panel ba-panel-class="banner-column-panel">
      <div class="banner">
        <div class="large-banner-wrapper">
          <img ng-src="@{{::( 'app/permisos_de_ausencia/2-2.jpg' | appImage )}}" alt=""/>
        </div>
        <div class="banner-text-wrapper">
          <div class="banner-text">
            <h1>Permisos de Ausencia</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="typography-document-samples row-fluid">
    
  <div class="col-xlg-3 col-lg-12  col-md-6 col-sm-6">
    <div ba-panel ba-panel-class="with-scroll more-text-widget" ba-panel-title="descripción">
      <div class="section-block light-text">
        <p>La ausencia a tus labores de la cual haya conocimiento con antelación podrá ser autorizada como permiso (con goce o sin goce de sueldo) de acuerdo a los lineamientos que a continuación se describen.  
        </p>
      </div>
    </div>
  </div>

  <div class="col-xlg-3 col-lg-12  col-md-6 col-sm-6">
    <div ba-panel ba-panel-class="with-scroll more-text-widget" ba-panel-title="Lineamientos">

      <div class="section-block bold-text" align="left">
        
        <ul type="1" class="">
          <li>Ausencias Justificadas
            
            <div class="section-block light-text">
              
              <ul type="a">
                <li>Las situaciones previstas por Capital Humano dentro de las cuales se podrá autorizar un permiso de ausencia justificada serán las siguientes: 
                <br><br>
                <div include-with-scope="theme/modules/absence/tabla_ocacions"></div>
                <br><br>
                </li>
                <li>Procedimiento:

                  <ul type="i">
                    <li>Ingresar a tu Portal Personal, llena la Solicitud de Ausencia y enviala a autorización con tu Superior Inmediato o Líder de Proyecto.</li>
                    <li>Una vez autorizada por tu Superior Inmediato o Líder de Proyecto pasará a validación a Capital Humano.</li>
                    <li>Contando con ambas autorizaciones, serás notificado vía correo electrónico.</li>
                  </ul>

                </li>  
              </ul>
            
            </div>
          
          </li>
          <li>Ausencias por Enfermedad
            
            <div class="section-block light-text">
              
              <ul type="a">
                <li>Si se trata de Incapacidad por parte del IMSS, deberás subir a la solicitud de Ausencia, el comprobante expedido por el Instituto para que proceda el pago de tus días de ausencia.</li>
                <li>Si se trata de Ausencia por enfermedad y la atención fue de forma particular deberás subir a la Solicitud de Ausencia, el comprobante médico para que proceda el pago de tus días de ausencia.</li>
                <li>Procedimiento:

                  <ul type="i">
                    <li>Deberás ingresar a tu Portal Personal, llenar y enviar la Solicitud de Ausencia, marcando como motivo "Enfermedad".</li>
                    <li>Deberás subir en el campo correspondiente, el comprobante médico que justifique tus días de ausencia.</li>
                    <li>Tu Superior Inmediato/Líder de Proyecto y Capital Humano serán notificados de los días, enfermedad y comprobante de la misma vía correo electrónico.</li>
                  </ul>

                </li>
              </ul>
            
            </div>

          </li>
          <li>Otras Ausencias

            <div class="section-block light-text">
              
              <ul type="a">
                <li>En el caso que requirieras ausentarte con antelación de tus labores por una situación específica y justificada y el motivo no sea contemplado dentro del punto anterior, deberás primeramente considerar solicitar los días de ausencia vía vacaciones.</li>
                <li>En caso de no contar con días disponibles deberás llenar la Solicitud de Ausencia y los días solicitados serán sin goce de sueldo.</li>
                <li>El periodo máximo de Permiso de Ausencia es de 5 días.</li>
                <li>Procedimiento:
                  <ul type="i">
                    <li>Deberás ingresar a tu Portal Personal, llenar y enviar la Solicitud de Ausencia marcando como motivo "Otros", especificar el motivo y detallar en el campo de Observaciones el motivo de la ausencia.</li>
                    <li>Una vez autorizada por tu Superior Inmediato/Líder de Proyecto pasará a validación a Capital Humano.</li>
                    <li>Una vez que cuentes con las autorizaciones requeridas, serás notificado vía correo electrónico si fue autorizado o no el permiso.</li>
                  </ul>
                </li>
              </ul>
            
            </div>

          </li>
        </ul>

      </div>

      <div class="section-block regular-text">
        <p>
        Cualquier situación no expuesta en esta Política, deberás verificarlo con Capital Humano.
        </p>
      </div>
      
    </div>
  </div>
    
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

</div>