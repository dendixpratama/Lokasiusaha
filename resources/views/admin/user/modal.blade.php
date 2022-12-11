<!-- Modal Popup untuk Delete -->
<div class="modal fade" id="del{{ $user->id_user }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        <center>Yakin Hapus Data dengan Nama : <strong> {{ $user->nama_user }} ?</strong></center>
                    </h5>
                </div>
            </div>
            <div class="modal-footer">

                <form action="{{ route('users.destroy', $user->id_user) }}" method="POST">
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
<div class="modal fade" id="edit{{ $user->id_user }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content text-dark">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('users.update',['user' => $user->id_user]) }}" method="POST">

                    @method('PATCH')
                    @csrf

                    <div class="card shadow mb-4">
                        <div class="card-body" style="text-align: left">
                            <div class="form-group col-md-12">
                                <label>Nama :</label>
                                <input type="text" class="form-control" placeholder="" name="nama_user" value="{{ $user->nama_user }}" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Telepon :</label>
                                <input type="number" class="form-control" placeholder="" name="telepon" value="{{ $user->telepon }}" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Email :</label>
                                <input type="email" required="" class="form-control" placeholder="" name="email" value="{{ $user->email }}">
                            </div>
                            <div class="form-group col-md-12">
                                <label>Username :</label>
                                <input type="text" class="form-control" placeholder="" name="username" value="{{ $user->username }}" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="pwd">Password :</label>
                                <input type="password" class="form-control" id="password" placeholder="" name="password" value="{{ $usern->password }}">
                            </div>
                            <div class="form-group col-md-12">
                                <label>Status :</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" checked name="status" id="status" value="Aktif" @if($user->status == 'Aktif')
                                    checked
                                    @endif
                                    >
                                    <label class="form-check-label" for="inlineRadio1">Aktif</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="status" value="Tidak Aktif" @if($user->status == 'Tidak Aktif')
                                    checked
                                    @endif
                                    >
                                    <label class="form-check-label" for="inlineRadio2">Tidak Aktif</label>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Keterangan :</label>
                                <input type="text" class="form-control" placeholder="" name="keterangan" value="{{ $user->keterangan }}">
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