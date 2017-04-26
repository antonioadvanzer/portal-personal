/**
 * @author Antonio Baez
 * created on 15.03.2017
 */
(function () {
  'use strict';

  angular.module('PortalPersonal.modules.permisos_de_ausencia')
      .controller('PermisosDeAusenciaModuleCtrl', PermisosDeAusenciaModuleCtrl);

  /** @ngInject */
  function PermisosDeAusenciaModuleCtrl($scope, $filter, editableOptions, editableThemes) {
  	$scope.tamanioTablaSolicitudes = 10;

    $scope.solicitudesPropias = [
      {
        id: 1,
        folio: '123123',
        tipo: 'bnvnbnvb',
        fecha: 'fdgrtrgr',
        autorizador: 'dfgdfgdh',
        dias: 'fefewerw',
        desde: 'asdasds',
        hasta: 'asdasd',
        estado: 'sdasd'
      },
      {
        id: 2,
        folio: '123123',
        tipo: 'bnvnbnvb',
        fecha: 'fdgrtrgr',
        autorizador: 'dfgdfgdh',
        dias: 'fefewerw',
        desde: 'asdasds',
        hasta: 'asdasd',
        estado: 'sdasd'
      },
      {
        id: 3,
        folio: '123123',
        tipo: 'bnvnbnvb',
        fecha: 'fdgrtrgr',
        autorizador: 'dfgdfgdh',
        dias: 'fefewerw',
        desde: 'asdasds',
        hasta: 'asdasd',
        estado: 'sdasd'
      },
      {
        id: 4,
        folio: '123123',
        tipo: 'bnvnbnvb',
        fecha: 'fdgrtrgr',
        autorizador: 'dfgdfgdh',
        dias: 'fefewerw',
        desde: 'asdasds',
        hasta: 'asdasd',
        estado: 'sdasd'
      },
      {
        id: 5,
        folio: '123123',
        tipo: 'bnvnbnvb',
        fecha: 'fdgrtrgr',
        autorizador: 'dfgdfgdh',
        dias: 'fefewerw',
        desde: 'asdasds',
        hasta: 'asdasd',
        estado: 'sdasd'
      },
      {
        id: 6,
        folio: '123123',
        tipo: 'bnvnbnvb',
        fecha: 'fdgrtrgr',
        autorizador: 'dfgdfgdh',
        dias: 'fefewerw',
        desde: 'asdasds',
        hasta: 'asdasd',
        estado: 'sdasd'
      }
    ];

    $scope.solicitudesRecibidas = [
      {
        id: 1,
        folio: '123123',
        tipo: 'bnvnbnvb',
        fecha: 'fdgrtrgr',
        colaborador: 'dfgdfgdh',
        dias: 'fefewerw',
        desde: 'asdasds',
        hasta: 'asdasd',
        estado: 'sdasd'
      },
      {
        id: 2,
        folio: '123123',
        tipo: 'bnvnbnvb',
        fecha: 'fdgrtrgr',
        colaborador: 'dfgdfgdh',
        dias: 'fefewerw',
        desde: 'asdasds',
        hasta: 'asdasd',
        estado: 'sdasd'
      },
      {
        id: 3,
        folio: '123123',
        tipo: 'bnvnbnvb',
        fecha: 'fdgrtrgr',
        colaborador: 'dfgdfgdh',
        dias: 'fefewerw',
        desde: 'asdasds',
        hasta: 'asdasd',
        estado: 'sdasd'
      },
      {
        id: 4,
        folio: '123123',
        tipo: 'bnvnbnvb',
        fecha: 'fdgrtrgr',
        colaborador: 'dfgdfgdh',
        dias: 'fefewerw',
        desde: 'asdasds',
        hasta: 'asdasd',
        estado: 'sdasd'
      },
      {
        id: 5,
        folio: '123123',
        tipo: 'bnvnbnvb',
        fecha: 'fdgrtrgr',
        colaborador: 'dfgdfgdh',
        dias: 'fefewerw',
        desde: 'asdasds',
        hasta: 'asdasd',
        estado: 'sdasd'
      },
      {
        id: 6,
        folio: '123123',
        tipo: 'bnvnbnvb',
        fecha: 'fdgrtrgr',
        colaborador: 'dfgdfgdh',
        dias: 'fefewerw',
        desde: 'asdasds',
        hasta: 'asdasd',
        estado: 'sdasd'
      },
      {
        id: 7,
        folio: '123123',
        tipo: 'bnvnbnvb',
        fecha: 'fdgrtrgr',
        colaborador: 'dfgdfgdh',
        dias: 'fefewerw',
        desde: 'asdasds',
        hasta: 'asdasd',
        estado: 'sdasd'
      },
      {
        id: 8,
        folio: '123123',
        tipo: 'bnvnbnvb',
        fecha: 'fdgrtrgr',
        colaborador: 'dfgdfgdh',
        dias: 'fefewerw',
        desde: 'asdasds',
        hasta: 'asdasd',
        estado: 'sdasd'
      },
      {
        id: 9,
        folio: '123123',
        tipo: 'bnvnbnvb',
        fecha: 'fdgrtrgr',
        colaborador: 'dfgdfgdh',
        dias: 'fefewerw',
        desde: 'asdasds',
        hasta: 'asdasd',
        estado: 'sdasd'
      },
      {
        id: 10,
        folio: '123123',
        tipo: 'bnvnbnvb',
        fecha: 'fdgrtrgr',
        colaborador: 'dfgdfgdh',
        dias: 'fefewerw',
        desde: 'asdasds',
        hasta: 'asdasd',
        estado: 'sdasd'
      },
      {
        id: 11,
        folio: '123123',
        tipo: 'bnvnbnvb',
        fecha: 'fdgrtrgr',
        colaborador: 'dfgdfgdh',
        dias: 'fefewerw',
        desde: 'asdasds',
        hasta: 'asdasd',
        estado: 'sdasd'
      },
      {
        id: 12,
        folio: '123123',
        tipo: 'bnvnbnvb',
        fecha: 'fdgrtrgr',
        colaborador: 'dfgdfgdh',
        dias: 'fefewerw',
        desde: 'asdasds',
        hasta: 'asdasd',
        estado: 'sdasd'
      },
      {
        id: 13,
        folio: '123123',
        tipo: 'bnvnbnvb',
        fecha: 'fdgrtrgr',
        colaborador: 'dfgdfgdh',
        dias: 'fefewerw',
        desde: 'asdasds',
        hasta: 'asdasd',
        estado: 'sdasd'
      },
      {
        id: 14,
        folio: '123123',
        tipo: 'bnvnbnvb',
        fecha: 'fdgrtrgr',
        colaborador: 'dfgdfgdh',
        dias: 'fefewerw',
        desde: 'asdasds',
        hasta: 'asdasd',
        estado: 'sdasd'
      },
      {
        id: 15,
        folio: '123123',
        tipo: 'bnvnbnvb',
        fecha: 'fdgrtrgr',
        colaborador: 'dfgdfgdh',
        dias: 'fefewerw',
        desde: 'asdasds',
        hasta: 'asdasd',
        estado: 'sdasd'
      },
      {
        id: 16,
        folio: '123123',
        tipo: 'bnvnbnvb',
        fecha: 'fdgrtrgr',
        colaborador: 'dfgdfgdh',
        dias: 'fefewerw',
        desde: 'asdasds',
        hasta: 'asdasd',
        estado: 'sdasd'
      }
    ];
  }

})();