<div id="report-form" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Reportar</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" id="report-item-id">
        <p>Porque motivo pretende reportar este item?</p>
        <textarea id="report-description" style="overflow:auto;resize:vertical" class="form-control" rows="2" ></textarea>
      </div>
      <div class="modal-footer">
        <button onclick="submitReport({$ID});" type="button" class="pull-right btn btn-primary" data-dismiss="modal"><span class="glyphicon glyphicon-flag"></span>Reportar</button>
        <span class="pull-right">&nbsp;</span>
        <button type="button" class="pull-right btn btn-primary" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cancelar</button>
      </div>
    </div>
  </div>
</div>
