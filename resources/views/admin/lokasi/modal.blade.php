<!-- Modal Popup untuk Delete -->
<div class="modal fade" id="del{{ $lokasi->id_lokasi }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
				<h5><center>Yakin Hapus Data dengan Nama : <strong> {{ $lokasi->nama_lokasi }} ?</strong></center></h5> 
            </div> 
			</div>
            <div class="modal-footer">
                <form action="{{ route('lokasis.destroy', $lokasi->id_lokasi) }}"
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

<!-- Modal Popup untuk Edit -->
    <div class="modal fade" id="edit{{ $lokasi->id_lokasi }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content text-dark">
                 <div class="modal-header">
                    <h5 class="modal-title">Edit Data Lokasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                <div class="modal-body">
                  <form action="{{ route('lokasis.update',['lokasi' => $lokasi->id_lokasi]) }}" method="POST" enctype="multipart/form-data">

                    @method('PATCH')
                    @csrf

                    <div class="card shadow mb-4">
                        <div class="card-body" style="text-align: left">
                            <div class="form-group col-md-12">
                                <label>Nama lokasi:</label>
                                <input type="text" class="form-control" placeholder="" name="nama_lokasi" value="{{ $lokasi->nama_lokasi }}" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Deskripsi:</label>
                                <input type="text" class="form-control" placeholder="" name="deskripsi" value="{{ $lokasi->deskripsi }}" required>
                            </div>
                            
                            <div class="form-group col-md-12">
                                <label>Fasilitas :</label>
                                <input type="text" class="form-control" placeholder="" name="fasilitas" value="{{ $lokasi->fasilitas }}" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Alamat :</label>
                                <input type="text" class="form-control" placeholder="" name="alamat" value="{{ $lokasi->alamat }}" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Upload Foto:</label>
                                  <p><img src="{{ url('/ypathfile/'.$lokasi->gambar)}}" width="100" height="100"></p>
                                  * jika tidak akan merubah gambar, abaikan saja.
                                  <input type="file" class="form-control" placeholder="Foto" name="gambar" value="">
                            </div>
                            <div class="form-group col-md-12">
                                <label>Harga :</label>
                                <input type="number" class="form-control" placeholder="" name="harga" value="{{ $lokasi->harga }}" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Status :</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" checked name="status" id="status" value="Tersedia"
                                        @if($lokasi->status == 'Tersedia')
                                            checked
                                        @endif
                                    >
                                    <label class="form-check-label" for="inlineRadio1">Tersedia</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="status" value="Tidak Tersedia"
                                    @if($lokasi->status == 'Tidak Tersedia')
                                            checked
                                        @endif
                                        >
                                    <label class="form-check-label" for="inlineRadio2">Tidak Tersedia</label>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Keterangan :</label>
                                <input type="text" class="form-control" placeholder="Keterangan" name="keterangan" value="{{ $lokasi->keterangan }}" >
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