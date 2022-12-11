<!-- Modal Popup untuk Delete -->
<div class="modal fade" id="del{{ $admin->id_admin }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
		
			<div class="container-fluid">
				<h5><center>Yakin Hapus Data dengan Nama : <strong> {{ $admin->nama_admin }} ?</strong></center></h5> 
            </div> 
			</div>
            <div class="modal-footer">
                <form action="/admin/delete/{{ $admin->id_admin }}" method="GET">
                    @method('GET')
                    @csrf
                    <button type="submit" class="btn btn-danger ml-3">Delete</button>
                </form>
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->

<!-- Modal Popup untuk Edit -->
    <div class="modal fade" id="edit{{ $admin->id_admin }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content text-dark">
                 <div class="modal-header">
                    <h5 class="modal-title">Edit Data Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                <div class="modal-body">
                  <form action="/bakso/{{ $admin->id_admin }}" method="POST">
                    @method('POST')
                    @csrf

                    <div class="card shadow mb-4">
                        <div class="card-body" style="text-align: left">
                            <div class="form-group col-md-12">
                                <label>Nama :</label>
                                <input type="text" class="form-control" placeholder="" name="nama_admin" value="{{ $admin->nama_admin }}" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Telepon :</label>
                                <input type="number" class="form-control" placeholder="" name="telepon" value="{{ $admin->telepon }}" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Email :</label>
                                <input type="email" required="" class="form-control" placeholder="" name="email" value="{{ $admin->email }}">
                            </div>
                            <div class="form-group col-md-12">
                                <label>Username :</label>
                                <input type="text" class="form-control" placeholder="" name="username" value="{{ $admin->username }}" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="pwd">Password :</label>
                                <input type="password"  class="form-control" id="password" placeholder="" name="password" value="{{ $admin->password }}">
                            </div>
                            <div class="form-group col-md-12">
                                <label>Status :</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" checked name="status" id="status" value="Aktif"
                                        @if($admin->status == 'Aktif')
                                            checked
                                        @endif
                                    >
                                    <label class="form-check-label" for="inlineRadio1">Aktif</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="status" value="Tidak Aktif"
                                    @if($admin->status == 'Tidak Aktif')
                                            checked
                                        @endif
                                        >
                                    <label class="form-check-label" for="inlineRadio2">Tidak Aktif</label>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Keterangan :</label>
                                <input type="text" class="form-control" placeholder="" name="keterangan" value="{{ $admin->keterangan }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Simpan</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Batal</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal -->