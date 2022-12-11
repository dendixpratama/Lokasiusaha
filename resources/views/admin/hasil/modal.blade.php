<!-- Modal Popup untuk Delete -->
<div class="modal fade" id="del{{ $hasil->id_hasil }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
				<h5><center>Yakin Hapus Data : <strong> {{ $hasil->id_hasil }} ?</strong></center></h5> 
            </div> 
			</div>
            <div class="modal-footer">

                <form action="{{ route('hasils.destroy', $hasil->id_hasil) }}"
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
    <div class="modal fade" id="edit{{ $hasil->id_hasil }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content text-dark">
                 <div class="modal-header">
                    <h5 class="modal-title">Edit Data Hasil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                <div class="modal-body">
                  <form action="{{ route('hasils.update',['hasil' => $hasil->id_hasil]) }}" method="POST">

                    @method('PATCH')
                    @csrf

                    <div class="card shadow mb-4">
                        <div class="card-body" style="text-align: left">
                            <div class="form-group col-md-12">
                                <label>Pilih Penilaian :</label>
                                <input type="text" class="form-control" placeholder="" name="id_penilaian" value="{{ $hasil->id_penilaian }}" required>
                            </div>

                            {{-- <div class="form-group col-md-12">
                                <label>Pilih Penilaian :</label>
                                <select class="form-control selectpicker" data-live-search="true" name="id_penilaian" required="">
                                 <option value="" disabled selected>- Pilih Penilaian -</option>
                              
                                 @foreach ($penilaians as $id_penilaian => $nama_penilaian)
                                 <option value="{{ $id_penilaian }}" 
                                 @if($id_penilaian == $penilaian->id_penilaian)
                                 selected
                                 @endif
                                 >{{ $nama_penilaian }}</option>
                                 @endforeach
                              </select>
                            </div>  --}}

                            <div class="form-group col-md-12">
                                <label>Pilih Lokasi :</label>
                                <input type="text" class="form-control" placeholder="" name="id_lokasi" value="{{ $hasil->id_lokasi }}" required>
                            </div>

                            {{-- <div class="form-group col-md-12">
                                <label>Pilih Lokasi :</label>
                                <select class="form-control selectpicker" data-live-search="true" name="id_lokasi" required="">
                                 <option value="" disabled selected>- Pilih Lokasi -</option>
                              
                                 @foreach ($lokasis as $id_lokasi => $nama_lokasi)
                                 <option value="{{ $id_lokasi }}" 
                                 @if($id_lokasi == $penilaian->id_lokasi)
                                 selected
                                 @endif
                                 >{{ $nama_lokasi }}</option>
                                 @endforeach
                              </select>
                            </div>  --}}

                            <div class="form-group col-md-12">
                                <label>Rekapitulasi :</label>
                                <input type="text" class="form-control" placeholder="" name="rekapitulasi" value="{{ $hasil->rekapitulasi }}" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Bobot :</label>
                                <input type="text" class="form-control" placeholder="" name="bobot" value="{{ $hasil->bobot }}" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Hasil :</label>
                                <input type="text" class="form-control" placeholder="" name="hasil" value="{{ $hasil->hasil }}" required>
                            </div>
                            
                            <div class="form-group col-md-12">
                                <label>Keterangan :</label>
                                <input type="text" class="form-control" placeholder="" name="keterangan" value="{{ $hasil->keterangan }}" >
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