@extends('layout.v_template')
@section('title','Penilaian | Lokasi Usaha')
@section('mnpenilaian','active')

@section('content')
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        @include('layout.topbar') 

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"><strong>Data Detail</strong></h1>
            </div>

            <!-- Content Row -->
            <div class="row">
            	 <div class="container">
			        <a href="javascript.void(0)" class="btn btn-primary" data-target="#ModalAdd" data-toggle="modal"><i class="fa fa-plus"></i> Tambah Detail</a>
			        <br><br>
			         <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                              @if(session()->has('pesan'))
                                <div class="alert alert-success">
                                  {{ session()->get('pesan')}}
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                              @endif
                            <div class="table-responsive">
                                <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>No</th>
                                            <th>Penilaian</th>
                                            <th>Lokasi</th>
                                            <th>Kriteria</th>
                                            <th>Catatan</th>
                                            <th class="text-center">Menu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($details as $detail)
                                        <tr>
                                            <td class="text-center">{{$loop->iteration}}</td>
                                            <td>{{$detail->id_penilaian}}</td>
                                            <td>{{$detail->id_lokasi}}</td>
                                            <td>Kriteria 1: {{$detail->kriteria1}}, Kriteria 2: {{$detail->kriteria2}}, Kriteria 3: {{$detail->kriteria3}}, Kriteria 4: {{$detail->kriteria4}}<br>
                                                Kriteria 5: {{$detail->kriteria5}}, Kriteria 6: {{$detail->kriteria6}}, Kriteria 7: {{$detail->kriteria7}}</td>
                                            <td>{{$detail->catatan}}</td>
                                            <td class="text-center">
                                                <div>
                                                  <a href="#edit{{ $detail->id_detail }}" data-toggle="modal" class="btn btn-warning" ><i class="fa fa-edit"></i></a>

                                                  <a href="#del{{ $detail->id_detail }}" data-toggle="modal" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                  @include('admin.detail.modal')
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
			    </div>
            </div>
        </div>
    </div>
    <!-- End of Main Content -->


<!-- Modal Popup untuk Add-->
<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content text-dark">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <div class="modal-body text-dark">
                <form action="{{ route('details.store') }}" method="POST">
                      @csrf

                     <div class="card shadow mb-4">
                        <div class="card-body text-dark">
                            <div class="form-group col-md-12">
                                <label>Pilih Penilaian :</label>
                                <input type="text" class="form-control" placeholder="" name="id_penilaian" value="" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Pilih Lokasi :</label>
                                <input type="text" class="form-control" placeholder="" name="id_lokasi" value="" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Kriteria 1 :</label>
                                <input type="text" class="form-control" placeholder="" name="kriteria1" value="" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Kriteria 2 :</label>
                                <input type="text" class="form-control" placeholder="" name="kriteria2" value="" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Kriteria 3 :</label>
                                <input type="text" class="form-control" placeholder="" name="kriteria3" value="" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Kriteria 4 :</label>
                                <input type="text" class="form-control" placeholder="" name="kriteria4" value="" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Kriteria 5 :</label>
                                <input type="text" class="form-control" placeholder="" name="kriteria5" value="" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Kriteria 6 :</label>
                                <input type="text" class="form-control" placeholder="" name="kriteria6" value="" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Kriteria 7 :</label>
                                <input type="text" class="form-control" placeholder="" name="kriteria7" value="" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Catatan :</label>
                                <input type="text" class="form-control" placeholder="" id="catatan"  name="catatan" >
                            </div>
                        </div>
                    </div>

                  <div class="modal-footer">
                      <button class="btn btn-success " type="submit">
                          Simpan
                      </button>

                      <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
                          Batal
                      </button>
                  </div>

              </form>

            </div>
        </div>
    </div>
</div>
<!-- /.modal -->


    @include('layout.footer') 

</div>
<!-- End of Content Wrapper -->
@endsection