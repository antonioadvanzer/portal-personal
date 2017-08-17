@extends('layout.main')

@section('css')
  <!-- build:css({.tmp/serve,src}) styles/app.css -->
  <!-- inject:css -->
  {{--<link rel="stylesheet" href="{{ URL::to('app/main.css') }}">--}}
    @if(Auth::user()->company == 1)
    <link rel="stylesheet" href="{{ URL::to('css/advanzer/main.css') }}">
    @elseif(Auth::user()->company == 2)
    <link rel="stylesheet" href="{{ URL::to('css/entuizer/main.css') }}">
    @endif
  <!-- endinject -->
  <!-- endbuild -->
@endsection

@section('content')

<div ng-init="{{ $components }}"></div>
<div ng-init="{{ $user }}"></div>

<input id="permissions" type="hidden" value="{{ $permissions }}"/>

<div class="body-bg"></div>
<main ng-if="$pageFinishedLoading" ng-class="{ 'menu-collapsed': $baSidebarService.isMenuCollapsed() }">

  <ba-sidebar></ba-sidebar>
  <page-top></page-top>

  <div class="al-main">
    <div class="al-content">
      <content-top></content-top>
      <div ui-view autoscroll="true" autoscroll-body-top></div>
    </div>
  </div>

  <footer class="al-footer clearfix">
    <!--<div class="al-footer-right">Created with <i class="ion-heart"></i></div>-->
    <div class="al-footer-main clearfix">
      <!--<div class="al-copy">Advanzer/Entuizer 2017</div>-->
        <div class="al-copy">{{ PortalPersonal::getSiteInformation() }}</div>
      <!--<ul class="al-share clearfix">
        <li><i class="socicon socicon-facebook"></i></li>
        <li><i class="socicon socicon-twitter"></i></li>
        <li><i class="socicon socicon-google"></i></li>
        <li><i class="socicon socicon-github"></i></li>
      </ul>-->
    </div>
  </footer>

  <back-top></back-top>
</main>

<!--<div id="preloader" ng-show="!$pageFinishedLoading">
  <div></div>
</div>-->

<div id="plc" ng-show="!$pageFinishedLoading">
  <!--<img src="http://upload.wikimedia.org/wikipedia/commons/thumb/a/aa/Logo_Google_2013_Official.svg/251px-Logo_Google_2013_Official.svg.png" alt="Google Logo" />-->
    @if(Auth::user()->company == 1)
    <img src="{{ URL::to('assets/img/logos/AD_logo.png') }}" width="30%" style="">
    @elseif(Auth::user()->company == 2)
    <img src="{{ URL::to('assets/img/logos/EN_logo.png') }}" width="30%" style="">
    @endif
  <br><br><br>
  <h2>Bienvenido</h2>
  <div class="preloader">
    <i>.</i>
    <i>.</i>
    <i>.</i>
  </div>
</div>

<!-- build:js(src) scripts/vendor.js -->
<!-- bower:js -->
<script src="{{ URL::to('bower_components/jquery/dist/jquery.js') }}"></script>
<script src="{{ URL::to('bower_components/jquery-ui/jquery-ui.js') }}"></script>
<script src="{{ URL::to('bower_components/jquery.easing/js/jquery.easing.js') }}"></script>
<script src="{{ URL::to('bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.js') }}"></script>
<script src="{{ URL::to('bower_components/chart.js/dist/Chart.js') }}"></script>
<script src="{{ URL::to('bower_components/amcharts/dist/amcharts/amcharts.js') }}"></script>
<script src="{{ URL::to('bower_components/amcharts/dist/amcharts/plugins/responsive/responsive.min.js') }}"></script>
<script src="{{ URL::to('bower_components/amcharts/dist/amcharts/serial.js') }}"></script>
<script src="{{ URL::to('bower_components/amcharts/dist/amcharts/funnel.js') }}"></script>
<script src="{{ URL::to('bower_components/amcharts/dist/amcharts/pie.js') }}"></script>
<script src="{{ URL::to('bower_components/amcharts/dist/amcharts/gantt.js') }}"></script>
<script src="{{ URL::to('bower_components/amcharts-stock/dist/amcharts/amstock.js') }}"></script>
<script src="{{ URL::to('bower_components/ammap/dist/ammap/ammap.js') }}"></script>
<script src="{{ URL::to('bower_components/ammap/dist/ammap/maps/js/worldLow.js') }}"></script>
<script src="{{ URL::to('bower_components/angular/angular.js') }}"></script>
<script src="{{ URL::to('bower_components/angular-route/angular-route.js') }}"></script>
<script src="{{ URL::to('bower_components/slimScroll/jquery.slimscroll.js') }}"></script>
<script src="{{ URL::to('bower_components/angular-slimscroll/angular-slimscroll.js') }}"></script>
<script src="{{ URL::to('bower_components/angular-smart-table/dist/smart-table.js') }}"></script>
<script src="{{ URL::to('bower_components/angular-toastr/dist/angular-toastr.tpls.js') }}"></script>
<script src="{{ URL::to('bower_components/angular-touch/angular-touch.js') }}"></script>
<script src="{{ URL::to('bower_components/angular-ui-sortable/sortable.js') }}"></script>
<script src="{{ URL::to('bower_components/bootstrap/js/dropdown.js') }}"></script>
<script src="{{ URL::to('bower_components/bootstrap-select/dist/js/bootstrap-select.js') }}"></script>
<script src="{{ URL::to('bower_components/bootstrap-switch/dist/js/bootstrap-switch.js') }}"></script>
<script src="{{ URL::to('bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js') }}"></script>
<script src="{{ URL::to('bower_components/moment/moment.js') }}"></script>
<script src="{{ URL::to('bower_components/fullcalendar/dist/fullcalendar.js') }}"></script>
<script src="{{ URL::to('bower_components/leaflet/dist/leaflet-src.js') }}"></script>
<script src="{{ URL::to('bower_components/angular-progress-button-styles/dist/angular-progress-button-styles.min.js') }}"></script>
<script src="{{ URL::to('bower_components/angular-ui-router/release/angular-ui-router.js') }}"></script>
<script src="{{ URL::to('bower_components/angular-chart.js/dist/angular-chart.js') }}"></script>
<script src="{{ URL::to('bower_components/chartist/dist/chartist.min.js') }}"></script>
<script src="{{ URL::to('bower_components/angular-chartist.js/dist/angular-chartist.js') }}"></script>
<script src="{{ URL::to('bower_components/eve-raphael/eve.js') }}"></script>
<script src="{{ URL::to('bower_components/raphael/raphael.min.js') }}"></script>
<script src="{{ URL::to('bower_components/mocha/mocha.js') }}"></script>
<script src="{{ URL::to('bower_components/morris.js/morris.js') }}"></script>
<script src="{{ URL::to('bower_components/angular-morris-chart/src/angular-morris-chart.min.js') }}"></script>
<script src="{{ URL::to('bower_components/ionrangeslider/js/ion.rangeSlider.js') }}"></script>
<script src="{{ URL::to('bower_components/angular-bootstrap/ui-bootstrap-tpls.js') }}"></script>
<script src="{{ URL::to('bower_components/angular-animate/angular-animate.js') }}"></script>
<script src="{{ URL::to('bower_components/rangy/rangy-core.js') }}"></script>
<script src="{{ URL::to('bower_components/rangy/rangy-classapplier.js') }}"></script>
<script src="{{ URL::to('bower_components/rangy/rangy-highlighter.js') }}"></script>
<script src="{{ URL::to('bower_components/rangy/rangy-selectionsaverestore.js') }}"></script>
<script src="{{ URL::to('bower_components/rangy/rangy-serializer.js') }}"></script>
<script src="{{ URL::to('bower_components/rangy/rangy-textrange.js') }}"></script>
<script src="{{ URL::to('bower_components/textAngular/dist/textAngular.js') }}"></script>
<script src="{{ URL::to('bower_components/textAngular/dist/textAngular-sanitize.js') }}"></script>
<script src="{{ URL::to('bower_components/textAngular/dist/textAngularSetup.js') }}"></script>
<script src="{{ URL::to('bower_components/angular-xeditable/dist/js/xeditable.js') }}"></script>
<script src="{{ URL::to('bower_components/jstree/dist/jstree.js') }}"></script>
<script src="{{ URL::to('bower_components/ng-js-tree/dist/ngJsTree.js') }}"></script>
<script src="{{ URL::to('bower_components/angular-ui-select/dist/select.js') }}"></script>
<script src="{{ URL::to('bower_components/angular-filereader/angular-filereader.min.js') }}"></script>
<!-- endbower -->
<!-- endbuild -->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>


<!-- Modules Portal Personal -->

<script src="{{ URL::to('app/modules/modules.module.js') }}"></script>
<script src="{{ URL::to('app/modules/principal/principal.module.js') }}"></script>
<!-- Perfil -->
<script src="{{ URL::to('app/modules/perfil/profile.module.js') }}"></script>
<script src="{{ URL::to('app/modules/perfil/ProfilePageCtrl.js') }}"></script>
<!-- Evaluaciones -->
<script src="{{ URL::to('app/modules/evaluaciones/evaluaciones.module.js') }}"></script>
<script src="{{ URL::to('app/modules/evaluaciones/EvaluacionesModuleCtrl.js') }}"></script>
<!-- Requisiciones -->
<script src="{{ URL::to('app/modules/requisiciones/requisiciones.module.js') }}"></script>
<script src="{{ URL::to('app/modules/requisiciones/RequisicionesModuleCtrl.js') }}"></script>
<!-- Vacaciones -->
<script src="{{ URL::to('app/modules/vacaciones/vacaciones.module.js') }}"></script>
<script src="{{ URL::to('app/modules/vacaciones/VacacionesModuleCtrl.js') }}"></script>
<!-- Permisos de Ausencia -->
<script src="{{ URL::to('app/modules/permisos_de_ausencia/permisos_de_ausencia.module.js') }}"></script>
<script src="{{ URL::to('app/modules/permisos_de_ausencia/PermisosDeAusenciaModuleCtrl.js') }}"></script>
<!-- Cartas y Constancias Laborales -->
<script src="{{ URL::to('app/modules/cartas_y_constancias_laborales/cartas_y_constancias_laborales.module.js') }}"></script>
<script src="{{ URL::to('app/modules/cartas_y_constancias_laborales/CartasYConstanciasLaboralesModuleCtrl.js') }}"></script>
<!-- Directives -->
<script src="{{ URL::to('app/modules/directives/selectpicker.directive.js') }}"></script>
<script src="{{ URL::to('app/modules/directives/input_error.directive.js') }}"></script>
<script src="{{ URL::to('app/modules/directives/validFile.directive.js') }}"></script>
<!-- end Modules-->

<!-- build:js({.tmp/serve,.tmp/partials,src}) scripts/app.js -->
<!-- inject:js -->
<script src="{{ URL::to('app/pages/pages.module.js') }}"></script>
<script src="{{ URL::to('app/theme/theme.module.js') }}"></script>
<script src="{{ URL::to('app/pages/charts/charts.module.js') }}"></script>
<script src="{{ URL::to('app/pages/components/components.module.js') }}"></script>
<script src="{{ URL::to('app/pages/dashboard/dashboard.module.js') }}"></script>
<script src="{{ URL::to('app/pages/form/form.module.js') }}"></script>
<script src="{{ URL::to('app/pages/maps/maps.module.js') }}"></script>
<script src="{{ URL::to('app/pages/profile/profile.module.js') }}"></script>
<script src="{{ URL::to('app/pages/tables/tables.module.js') }}"></script>
<script src="{{ URL::to('app/pages/ui/ui.module.js') }}"></script>
<script src="{{ URL::to('app/theme/components/components.module.js') }}"></script>
<script src="{{ URL::to('app/theme/inputs/inputs.module.js') }}"></script>
<script src="{{ URL::to('app/pages/charts/amCharts/amCharts.module.js') }}"></script>
<script src="{{ URL::to('app/pages/charts/chartist/chartist.module.js') }}"></script>
<script src="{{ URL::to('app/pages/charts/chartJs/chartJs.module.js') }}"></script>
<script src="{{ URL::to('app/pages/charts/morris/morris.module.js') }}"></script>
<script src="{{ URL::to('app/pages/components/mail/mail.module.js') }}"></script>
<script src="{{ URL::to('app/pages/components/timeline/timeline.module.js') }}"></script>
<script src="{{ URL::to('app/pages/components/tree/tree.module.js') }}"></script>
<script src="{{ URL::to('app/pages/ui/alerts/alerts.module.js') }}"></script>
<script src="{{ URL::to('app/pages/ui/buttons/buttons.module.js') }}"></script>
<script src="{{ URL::to('app/pages/ui/grid/grid.module.js') }}"></script>
<script src="{{ URL::to('app/pages/ui/icons/icons.module.js') }}"></script>
<script src="{{ URL::to('app/pages/ui/modals/modals.module.js') }}"></script>
<script src="{{ URL::to('app/pages/ui/notifications/notifications.module.js') }}"></script>
<script src="{{ URL::to('app/pages/ui/panels/panels.module.js') }}"></script>
<script src="{{ URL::to('app/pages/ui/progressBars/progressBars.module.js') }}"></script>
<script src="{{ URL::to('app/pages/ui/slider/slider.module.js') }}"></script>
<script src="{{ URL::to('app/pages/ui/tabs/tabs.module.js') }}"></script>
<script src="{{ URL::to('app/pages/ui/typography/typography.module.js') }}"></script>
<script src="{{ URL::to('app/app.js') }}"></script>
<script src="{{ URL::to('app/theme/theme.config.js') }}"></script>
<script src="{{ URL::to('app/theme/theme.configProvider.js') }}"></script>
<script src="{{ URL::to('app/theme/theme.constants.js') }}"></script>
<script src="{{ URL::to('app/theme/theme.run.js') }}"></script>
<script src="{{ URL::to('app/theme/theme.service.js') }}"></script>
<script src="{{ URL::to('app/pages/profile/ProfileModalCtrl.js') }}"></script>
<script src="{{ URL::to('app/pages/profile/ProfilePageCtrl.js') }}"></script>
<script src="{{ URL::to('app/pages/tables/TablesPageCtrl.js') }}"></script>
<script src="{{ URL::to('app/theme/components/toastrLibConfig.js') }}"></script>
<script src="{{ URL::to('app/theme/directives/animatedChange.js') }}"></script>
<script src="{{ URL::to('app/theme/directives/autoExpand.js') }}"></script>
<script src="{{ URL::to('app/theme/directives/autoFocus.js') }}"></script>
<script src="{{ URL::to('app/theme/directives/includeWithScope.js') }}"></script>
<script src="{{ URL::to('app/theme/directives/ionSlider.js') }}"></script>
<script src="{{ URL::to('app/theme/directives/ngFileSelect.js') }}"></script>
<script src="{{ URL::to('app/theme/directives/scrollPosition.js') }}"></script>
<script src="{{ URL::to('app/theme/directives/trackWidth.js') }}"></script>
<script src="{{ URL::to('app/theme/directives/zoomIn.js') }}"></script>
<script src="{{ URL::to('app/theme/services/baProgressModal.js') }}"></script>
<script src="{{ URL::to('app/theme/services/baUtil.js') }}"></script>
<script src="{{ URL::to('app/theme/services/fileReader.js') }}"></script>
<script src="{{ URL::to('app/theme/services/preloader.js') }}"></script>
<script src="{{ URL::to('app/theme/services/stopableInterval.js') }}"></script>
<script src="{{ URL::to('app/pages/charts/chartist/chartistCtrl.js') }}"></script>
<script src="{{ URL::to('app/pages/charts/chartJs/chartJs1DCtrl.js') }}"></script>
<script src="{{ URL::to('app/pages/charts/chartJs/chartJs2DCtrl.js') }}"></script>
<script src="{{ URL::to('app/pages/charts/chartJs/chartJsWaveCtrl.js') }}"></script>
<script src="{{ URL::to('app/pages/charts/morris/morrisCtrl.js') }}"></script>
<script src="{{ URL::to('app/pages/components/mail/mailMessages.js') }}"></script>
<script src="{{ URL::to('app/pages/components/mail/MailTabCtrl.js') }}"></script>
<script src="{{ URL::to('app/pages/components/timeline/TimelineCtrl.js') }}"></script>
<script src="{{ URL::to('app/pages/components/tree/treeCtrl.js') }}"></script>
<script src="{{ URL::to('app/pages/dashboard/blurFeed/blurFeed.directive.js') }}"></script>
<script src="{{ URL::to('app/pages/dashboard/blurFeed/BlurFeedCtrl.js') }}"></script>
<script src="{{ URL::to('app/pages/dashboard/calendar/dashboardCalendar.js') }}"></script>
<script src="{{ URL::to('app/pages/dashboard/dashboardCalendar/dashboardCalendar.directive.js') }}"></script>
<script src="{{ URL::to('app/pages/dashboard/dashboardCalendar/DashboardCalendarCtrl.js') }}"></script>
<script src="{{ URL::to('app/pages/dashboard/dashboardLineChart/dashboardLineChart.directive.js') }}"></script>
<script src="{{ URL::to('app/pages/dashboard/dashboardLineChart/DashboardLineChartCtrl.js') }}"></script>
<script src="{{ URL::to('app/pages/dashboard/dashboardMap/dashboardMap.directive.js') }}"></script>
<script src="{{ URL::to('app/pages/dashboard/dashboardMap/DashboardMapCtrl.js') }}"></script>
<script src="{{ URL::to('app/pages/dashboard/dashboardPieChart/dashboardPieChart.directive.js') }}"></script>
<script src="{{ URL::to('app/pages/dashboard/dashboardPieChart/DashboardPieChartCtrl.js') }}"></script>
<script src="{{ URL::to('app/pages/dashboard/dashboardTodo/dashboardTodo.directive.js') }}"></script>
<script src="{{ URL::to('app/pages/dashboard/dashboardTodo/DashboardTodoCtrl.js') }}"></script>
<script src="{{ URL::to('app/pages/dashboard/pieCharts/dashboardPieChart.js') }}"></script>
<script src="{{ URL::to('app/pages/dashboard/popularApp/popularApp.directive.js') }}"></script>
<script src="{{ URL::to('app/pages/dashboard/trafficChart/trafficChart.directive.js') }}"></script>
<script src="{{ URL::to('app/pages/dashboard/trafficChart/TrafficChartCtrl.js') }}"></script>
<script src="{{ URL::to('app/pages/dashboard/weather/weather.directive.js') }}"></script>
<script src="{{ URL::to('app/pages/dashboard/weather/WeatherCtrl.js') }}"></script>
<script src="{{ URL::to('app/pages/form/wizard/wizrdCtrl.js') }}"></script>
<script src="{{ URL::to('app/pages/maps/google-maps/GmapPageCtrl.js') }}"></script>
<script src="{{ URL::to('app/pages/maps/leaflet/LeafletPageCtrl.js') }}"></script>
<script src="{{ URL::to('app/pages/maps/map-bubbles/MapBubblePageCtrl.js') }}"></script>
<script src="{{ URL::to('app/pages/maps/map-lines/MapLinesPageCtrl.js') }}"></script>
<script src="{{ URL::to('app/pages/ui/buttons/ButtonPageCtrl.js') }}"></script>
<script src="{{ URL::to('app/pages/ui/icons/IconsPageCtrl.js') }}"></script>
<script src="{{ URL::to('app/pages/ui/modals/ModalsPageCtrl.js') }}"></script>
<script src="{{ URL::to('app/pages/ui/notifications/NotificationsPageCtrl.js') }}"></script>
<script src="{{ URL::to('app/theme/components/backTop/backTop.directive.js') }}"></script>
<script src="{{ URL::to('app/theme/components/baPanel/baPanel.directive.js') }}"></script>
<script src="{{ URL::to('app/theme/components/baPanel/baPanel.service.js') }}"></script>
<script src="{{ URL::to('app/theme/components/baPanel/baPanelBlur.directive.js') }}"></script>
<script src="{{ URL::to('app/theme/components/baPanel/baPanelBlurHelper.service.js') }}"></script>
<script src="{{ URL::to('app/theme/components/baPanel/baPanelSelf.directive.js') }}"></script>
<script src="{{ URL::to('app/theme/components/baSidebar/baSidebar.directive.js') }}"></script>
<script src="{{ URL::to('app/theme/components/baSidebar/baSidebar.service.js') }}"></script>
<script src="{{ URL::to('app/theme/components/baSidebar/BaSidebarCtrl.js') }}"></script>
<script src="{{ URL::to('app/theme/components/baSidebar/baSidebarHelpers.directive.js') }}"></script>
<script src="{{ URL::to('app/theme/components/baWizard/baWizard.directive.js') }}"></script>
<script src="{{ URL::to('app/theme/components/baWizard/baWizardCtrl.js') }}"></script>
<script src="{{ URL::to('app/theme/components/baWizard/baWizardStep.directive.js') }}"></script>
<script src="{{ URL::to('app/theme/components/contentTop/contentTop.directive.js') }}"></script>
<script src="{{ URL::to('app/theme/components/msgCenter/msgCenter.directive.js') }}"></script>
<script src="{{ URL::to('app/theme/components/msgCenter/MsgCenterCtrl.js') }}"></script>
<script src="{{ URL::to('app/theme/components/pageTop/pageTop.directive.js') }}"></script>
<script src="{{ URL::to('app/theme/components/progressBarRound/progressBarRound.directive.js') }}"></script>
<script src="{{ URL::to('app/theme/components/widgets/widgets.directive.js') }}"></script>
<script src="{{ URL::to('app/theme/filters/image/appImage.js') }}"></script>
<script src="{{ URL::to('app/theme/filters/image/kameleonImg.js') }}"></script>
<script src="{{ URL::to('app/theme/filters/image/profilePicture.js') }}"></script>
<script src="{{ URL::to('app/theme/filters/text/removeHtml.js') }}"></script>
<script src="{{ URL::to('app/theme/inputs/baSwitcher/baSwitcher.js') }}"></script>
<script src="{{ URL::to('app/pages/charts/amCharts/areaChart/AreaChartCtrl.js') }}"></script>
<script src="{{ URL::to('app/pages/charts/amCharts/barChart/BarChartCtrl.js') }}"></script>
<script src="{{ URL::to('app/pages/charts/amCharts/combinedChart/combinedChartCtrl.js') }}"></script>
<script src="{{ URL::to('app/pages/charts/amCharts/funnelChart/FunnelChartCtrl.js') }}"></script>
<script src="{{ URL::to('app/pages/charts/amCharts/ganttChart/ganttChartCtrl.js') }}"></script>
<script src="{{ URL::to('app/pages/charts/amCharts/lineChart/LineChartCtrl.js') }}"></script>
<script src="{{ URL::to('app/pages/charts/amCharts/pieChart/PieChartCtrl.js') }}"></script>
<script src="{{ URL::to('app/pages/components/mail/composeBox/composeBoxCtrl.js') }}"></script>
<script src="{{ URL::to('app/pages/components/mail/composeBox/composeModal.js') }}"></script>
<script src="{{ URL::to('app/pages/components/mail/detail/MailDetailCtrl.js') }}"></script>
<script src="{{ URL::to('app/pages/components/mail/list/MailListCtrl.js') }}"></script>
<script src="{{ URL::to('app/pages/ui/modals/notifications/NotificationsCtrl.js') }}"></script>
<script src="{{ URL::to('app/pages/ui/modals/progressModal/ProgressModalCtrl.js') }}"></script>
<script src="{{ URL::to('app/theme/components/backTop/lib/jquery.backTop.min.js') }}"></script>
<script src="{{ URL::to('app/pages/form/inputs/widgets/datePickers/datepickerCtrl.js') }}"></script>
<script src="{{ URL::to('app/pages/form/inputs/widgets/datePickers/datepickerpopupCtrl.js') }}"></script>
<script src="{{ URL::to('app/pages/form/inputs/widgets/oldSelect/OldSelectpickerPanelCtrl.js') }}"></script>
<script src="{{ URL::to('app/pages/form/inputs/widgets/oldSelect/selectpicker.directive.js') }}"></script>
<script src="{{ URL::to('app/pages/form/inputs/widgets/oldSwitches/OldSwitchPanelCtrl.js') }}"></script>
<script src="{{ URL::to('app/pages/form/inputs/widgets/oldSwitches/switch.directive.js') }}"></script>
<script src="{{ URL::to('app/pages/form/inputs/widgets/select/GroupSelectpickerOptions.js') }}"></script>
<script src="{{ URL::to('app/pages/form/inputs/widgets/select/SelectpickerPanelCtrl.js') }}"></script>
<script src="{{ URL::to('app/pages/form/inputs/widgets/switches/SwitchDemoPanelCtrl.js') }}"></script>
<script src="{{ URL::to('app/pages/form/inputs/widgets/tagsInput/tagsInput.directive.js') }}"></script>
<!-- endinject -->

<!-- inject:partials -->
<!-- angular templates will be automatically converted in js and inserted here -->
<!-- endinject -->
<!-- endbuild -->

@endsection