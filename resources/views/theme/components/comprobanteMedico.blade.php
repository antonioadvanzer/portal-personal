<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" ng-click="$dismiss()" aria-label="Close">
      <em class="ion-ios-close-empty sn-link-close"></em>
    </button>
    <h4 class="modal-title">Comprobante</h4>
  </div>
  <div class="modal-body">
      @if($ext == 'pdf')
      <iframe src='http://docs.google.com/gview?url={{$file}}&embedded=true' width='100%' height='600'></iframe>
      @else
      <img src="{{$file}}">
      @endif
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-primary" ng-click="$dismiss()">OK</button>
  </div>
</div>