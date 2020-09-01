
<div class="modal fade" id="modaltipeuser">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Karya Tulis</h4>
      </div>
      <div class="modal-body">
        <input type="text" class="form-control" id="karyatulismodal" name="karyatulismodal" placeholder="Karya Tulis">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btnsimpankaryatulis">Save changes</button>
      </div>
    </div>

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Karya Tulis</h4>
      </div>
      <div class="modal-body">
        <input type="text" class="form-control" id="karyatulismodal" name="karyatulismodal" placeholder="Karya Tulis">
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="modalkorwil">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tipe User</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Format 1</label>
          <div class="col-sm-9">
            <div class="input-group">
              <div class="input-group-btn">
                <select class="form-control select2" id="kodeformat1" name="format1" class="btn btn-warning dropdown-toggle" onchange="embuh()">
                  <option value=''>Pilih</option>
                  <option value='huruf'>Huruf</option>
                  <option value='tanggal'>Tanggal</option>
                  <option value='no'>No Urut</option>
                </select>

                <input type="text" class="form-control" id="texthuruf1" name="texthuruf" style="visibility:hidden">
              </div>
              <!-- /btn-group -->
            </div>
          </div>
        </div>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Format 2</label>
          <div class="col-sm-9">
            <div class="input-group">
              <div class="input-group-btn">
                <select class="form-control select2" id="format2" name="kota" class="btn btn-warning dropdown-toggle" onchange="embuhb()">
                <option value=''>Pilih</option>
                  <option value='huruf'>Huruf</option>
                  <option value='tanggal'>Tanggal</option>
                  <option value='no'>No Urut</option>
                </select>

                <input type="text" class="form-control" id="texthuruf2" name="texthuruf" style="visibility:hidden">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Format 3</label>
          <div class="col-sm-9">
            <div class="input-group">
              <div class="input-group-btn">
                <select class="form-control select2" id="format3" name="kota" class="btn btn-warning dropdown-toggle"  onchange="embuhc()">
                <option value=''>Pilih</option>
                  <option value='huruf'>Huruf</option>
                  <option value='tanggal'>Tanggal</option>
                  <option value='no'>No Urut</option>
                </select>

                <input type="text" class="form-control" id="texthuruf3" name="texthuruf" style="visibility:hidden">
              </div>
              <!-- /btn-group -->
            </div>
          </div>
        </div>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Penghubung</label>
          <div class="col-sm-9">
            <select class="form-control select2" id="penghubung" name="penghubung" style="width: 100%;" onchange="embuhhub()">
              <option value=''>Pilih</option>
              <option value='-'>-</option>
              <option value='.'>.</option>
              <option value=''>Tanpa Penghubung</option>
            </select>
          </div>
        </div>         
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Kode Final</label>
          <div class="col-sm-9">
            <div id ="kodefinal"></div>
            <input type="text" class="form-control" id="final" name="final" >
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btnsimpankodekorwil">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

