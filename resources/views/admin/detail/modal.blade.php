<!-- Modal Popup untuk Delete -->
<div class="modal fade" id="del{{ $detail->id_detail }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
				<h5><center>Yakin Hapus Data : <strong> {{ $detail->id_detail }} ?</strong></center></h5> 
            </div> 
			</div>
            <div class="modal-footer">

                <form action="{{ route('details.destroy', $detail->id_detail) }}"
                    method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger ml-3">Delete</button>
                </form>

                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
            </div>
			
        </div>
    </div>
</div>
<!-- /.modal -->
<div class="modal fade" id="del2{{ $detail->id_detail }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
				<h5><center>Yakin Hapus Data : <strong> {{ $detail->id_detail }} ?</strong></center></h5> 
            </div> 
			</div>
            <div class="modal-footer">

                <form action="{{ route('details.analisacpihapus', $detail->id_detail) }}"
                    method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger ml-3">Delete</button>
                </form>

                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
            </div>
			
        </div>
    </div>
</div>
<!-- Modal Popup untuk Edit -->
    <div class="modal fade" id="edit{{ $detail->id_detail }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content text-dark">
                 <div class="modal-header">
                    <h5 class="modal-title">Edit Data Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                <div class="modal-body">
                  <form action="{{ route('details.update',['detail' => $detail->id_detail]) }}" method="POST">

                    @method('PATCH')
                    @csrf

                    <div class="card shadow mb-4">
                        <div class="card-body" style="text-align: left">
                            <div class="form-group col-md-12">
                                <label>Pilih Penilaian :</label>
                                <input type="text" class="form-control" placeholder="" name="id_penilaian" value="{{ $detail->id_penilaian }}" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Pilih Lokasi :</label>
                                <input type="text" class="form-control" placeholder="" name="id_lokasi" value="{{ $detail->id_lokasi }}" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Kriteria 1 :</label>
                                <input type="text" class="form-control" placeholder="" name="kriteria1" value="{{ $detail->kriteria1 }}" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Kriteria 2 :</label>
                                <input type="text" class="form-control" placeholder="" name="kriteria2" value="{{ $detail->kriteria2 }}" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Kriteria 3 :</label>
                                <input type="text" class="form-control" placeholder="" name="kriteria3" value="{{ $detail->kriteria3 }}" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Kriteria 4 :</label>
                                <input type="text" class="form-control" placeholder="" name="kriteria4" value="{{ $detail->kriteria4 }}" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Kriteria 5 :</label>
                                <input type="text" class="form-control" placeholder="" name="kriteria5" value="{{ $detail->kriteria5 }}" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Kriteria 6 :</label>
                                <input type="text" class="form-control" placeholder="" name="kriteria6" value="{{ $detail->kriteria6 }}" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Kriteria  7:</label>
                                <input type="text" class="form-control" placeholder="" name="kriteria7" value="{{ $detail->kriteria7 }}" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Catatan :</label>
                                <input type="text" class="form-control" placeholder="" name="catatan" value="{{ $detail->catatan }}" >
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