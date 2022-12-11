<!-- Modal Popup untuk Delete -->
<div class="modal fade" id="del{{ $penilaian->id_penilaian }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                    <h5>
                        <center>Yakin Hapus Data : <strong> {{ $penilaian->nama_penilaian }} ?</strong></center>
                    </h5>
                </div>
            </div>
            <div class="modal-footer">

                <form action="{{ route('penilaians.destroy', $penilaian->id_penilaian) }}" method="POST">
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
<div class="modal fade" id="edit{{ $penilaian->id_penilaian }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content text-dark">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Penilaian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('penilaians.update',['penilaian' => $penilaian->id_penilaian]) }}" method="POST">

                    @method('PATCH')
                    @csrf

                    <div class="card shadow mb-4">
                        <div class="card-body" style="text-align: left">
                            <div class="form-group col-md-12">
                                <label>Pilih User :</label>
                                <select class="form-control selectpicker" data-live-search="true" name="id_pelanggan" required="">
                                    <option value="" disabled selected>- Pilih User -</option>

                                    @foreach ($users as $id_user => $nama_user)
                                    <option value="{{ $id_user }}" @if($id_user==$penilaian->id_user)
                                        selected
                                        @endif
                                        >{{ $nama_user }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Nama Penilaian :</label>
                                <input type="text" class="form-control" placeholder="" name="nama_penilaian" value="{{ $penilaian->nama_penilaian }}" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Deskripsi :</label>
                                <input type="text" class="form-control" placeholder="" name="deskripsi" value="{{ $penilaian->deskripsi }}" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Status :</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" checked name="status" id="status" value="Proses" @if($penilaian->status == 'Proses')
                                    checked
                                    @endif
                                    >
                                    <label class="form-check-label" for="inlineRadio1">Proses</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="status" value="Selesai" @if($penilaian->status == 'Selesai')
                                    checked
                                    @endif
                                    >
                                    <label class="form-check-label" for="inlineRadio2">Selesai</label>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Keterangan :</label>
                                <input type="text" class="form-control" placeholder="" name="keterangan" value="{{ $penilaian->keterangan }}" required>
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