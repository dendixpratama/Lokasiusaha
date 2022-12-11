@extends('layout.v_template')
@section('title','Penilaian | Lokasi Usaha')
@section('mnpenilaian','active')

@section('content')
<div class="card">
    <div class="card-body">
        <a href="javascript.void(0)" class="btn btn-primary btn-sm" data-target="#ModalAdd" data-toggle="modal"><i class="fa fa-plus"></i> Tambah Data Penilaian</a>
        <br>
        <hr>
        @if(session()->has('pesan'))
        <div class="alert alert-success">
            {{ session()->get('pesan')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="table-responsive">
            <h4>Data Penilaian: </h4>
            <table class="table" id="dataTable">
                <thead class="table-primary">
                    <tr>
                        <th width="3%">No</th>
                        <th width="15%">Tanggal</th>
                        <th width="35%">Nama Penilaian</th>
                        <th width="45%">Deskripsi Penilaian</th>
                        <th class="text-center" width="5%">Menu</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($penilaians as $penilaian)
                    <tr>
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td><small>{{WKT($penilaian->tanggal)}} jam {{$penilaian->jam}} Wib</td>
                        <td><small>
                                {{$penilaian->nama_penilaian}} <br>Pengguna:
                                {{getUser($penilaian->id_user)}} | {{$penilaian->id_user}}
                        <td><small>
                                {{$penilaian->deskripsi}} Status {{$penilaian->status}}
                                <br>{{$penilaian->keterangan}}
                        </td>

                        <td class="text-center">
                            <div>
                                <a href="/detail/{{ $penilaian->id_penilaian }}"><i class="mdi mdi-eye text-info" title="Detail"></i></a><br>
                                <a href="#edit{{ $penilaian->id_penilaian }}" data-toggle="modal"><i class="mdi mdi-border-color text-warning" title="Ubah"></i></a>
                                <a href="#del{{ $penilaian->id_penilaian }}" data-toggle="modal"><i class="mdi mdi-close-box text-danger" title="Hapus"></i></a>
                                @include('admin.penilaian.modal')
                            </div>
                        </td>
                    </tr>
                    @empty
                    <td colspan="8" class="text-center">Tidak ada data...</td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Popup untuk Add-->
<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content text-dark">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Penilaian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-dark">
                <form action="{{ route('penilaians.store') }}" method="POST">
                    @csrf
                    <div class="card shadow mb-4">
                        <div class="card-body text-dark">
                            <div class="form-group col-md-12">
                                <label>Pilih User :</label>
                                <select class="form-control selectpicker" data-live-search="true" name="id_pelanggan" required="">
                                    <option value="" disabled selected>- Pilih User -</option>
                                    @foreach ($users as $id_user => $nama_user)
                                    <option value="{{ $id_user }}">{{ $nama_user }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Nama Penilaian :</label>
                                <input type="text" class="form-control" placeholder="" name="nama_penilaian" value="" required />
                            </div>
                            <div class="form-group col-md-12">
                                <label>Deskripsi :</label>
                                <input type="text" class="form-control" placeholder="" name="deskripsi" value="" required />
                            </div>
                            <div class="form-group col-md-12">
                                <label>Status :</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" checked name="status" id="status" value="Proses">
                                    <label class="form-check-label" for="inlineRadio1">Proses</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="status" value="Selesai">
                                    <label class="form-check-label" for="inlineRadio2">Selesai</label>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Keterangan :</label>
                                <input type="text" class="form-control" placeholder="" name="keterangan" />
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-success " type="submit">
                            Simpan
                        </button>
                        <button type="reset" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->

<!-- End of Content Wrapper -->
@endsection