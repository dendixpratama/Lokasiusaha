@extends('layout.v_template')
@section('title','Lokasi | Lokasi Usaha')
@section('mnlokasi','active')

@section('content')
<!-- Content Wrapper -->
        <div class="card">
            <div class="card-body">
                <a href="javascript.void(0)" class="btn btn-primary btn-sm" data-target="#ModalAdd" data-toggle="modal"><i class="fa fa-plus"></i> Tambah Data Lokasi</a>
                <br><hr>
                @if(session()->has('pesan'))
                    <div class="alert alert-success">
                        {{ session()->get('pesan')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="table-responsive">
                <h4>Data Lokasi: </h4>
                <table class="table">
                    <thead class="table-primary">
                        <tr>
                            <th width="3%">No</th>
                            <th width="10%">Gambar</th>
                            <th width="30%">Detail Lokasi</th>
                            <th width="5%">Status</th>
                            <th class="text-center" width="5%">Menu</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($lokasis as $lokasi)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td><img src="{{ url('ypathfile/'.$lokasi->gambar)}}" width="400px" height="400px"></td> 
                            <td>
                                <b>{{$lokasi->nama_lokasi}}</b><br>
                                <small>
                                    Deskripsi: {{$lokasi->deskripsi}}<br>
                                    Fasilitas: {{$lokasi->fasilitas}}<br>
                                    Alamat: {{$lokasi->alamat}}<br>
                                    Keterangan: {{$lokasi->keterangan}}
                                </small>
                            </td>
                            <td>{{$lokasi->status}}</td>
                            <td class="text-center">
                                <div>
                                  <a href="#edit{{ $lokasi->id_lokasi }}" data-toggle="modal"><i class="fa fa-edit text-warning"></i></a>
                                  <a href="#del{{ $lokasi->id_lokasi }}" data-toggle="modal"><i class="fa fa-trash text-danger"></i></a>
                                  @include('admin.lokasi.modal')
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
            <h5 class="modal-title">Tambah Lokasi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>

                <div class="modal-body text-dark">
                    <form action="{{ route('lokasis.store') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                        <div class="card shadow mb-4">
                            <div class="card-body text-dark">
                                <div class="form-group col-md-12">
                                    <label>Nama Lokasi :</label>
                                    <input type="text" class="form-control" placeholder="" name="nama_lokasi" value="" required="">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Deskripsi :</label>
                                    <input type="text" class="form-control" placeholder="" name="deskripsi" value="" required="">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Fasilitas :</label>
                                    <input type="text" class="form-control" placeholder="" name="fasilitas" value="" required="">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Alamat :</label>
                                    <input type="text" class="form-control" placeholder="" name="alamat" required="" >
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Upload Lokasi :</label>
                                    <input type="file" class="form-control" placeholder="" name="gambar" required="" >
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Harga :</label>
                                    <input type="number" class="form-control" placeholder="" name="harga" required="">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Status :</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" checked name="status" id="status" value="Tersedia">
                                        <label class="form-check-label" for="inlineRadio1">Tersedia</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="status" value="Tidak Tersedia">
                                        <label class="form-check-label" for="inlineRadio2">Tidak Tersedia</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Keterangan :</label>
                                    <textarea type="text" class="form-control" placeholder="-" name="keterangan" value="-" required=""></textarea>
                                </div>
                            </div>
                        </div>

                      <div class="modal-footer">
                          <button class="btn btn-success " type="submit">Simpan</button>
                          <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">Batal</button>
                      </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.modal -->

<!-- End of Content Wrapper -->
@endsection