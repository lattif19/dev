@extends('layout.main')
@include('pegawai.sidebar.menu')

@section('container')
        <div class="container-fluid px-4">
            <h1 class="mt-4">{{ $title }}</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">PT Sumber Segara Primadaya</li>
            </ol>


            {{-- <div class="row"> --}}
                <div class="content">
                    <div class="box">
                        <div class="navbar box-header">
                            <a href="#" class="btn btn-primary" data-toggle="modal" 
                            data-target="#exampleModalCenter">Tambah Jabatan</a>
                            <div class="col-lg-3">
                              <form class="row">
                                  <div class="col-md-8" style="padding-right: 0px">
                                      <input class="form-control" type="search" placeholder="Nama.." aria-label="Nama.." name="cari" value="{{ request()->cari }}">
                                  </div>
                                  <div class="col-md-3">
                                      <button class="btn btn-dark text-white" type="submit">Search</button>
                                  </div>
                              </form>
                          </div> 
                        </div>
                      <div class="box-body table-respon"> 
                        <table class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Aksi</th>
                              </tr>
                            </thead>
                            <tbody>

                            
                            @foreach ($jabatan as $p)    
                                <tr>
                                    <th scope="row" width="50px">{{ $p->id }}</th>
                                    <th scope="col">{{ $p->nama }}</th>
                                    <th scope="col">{{ $p->keterangan }}</th>
                                    <th scope="col" width="100px">
                                        <a href="#" data-toggle="modal" 
                                                    data-target="#rubah{{ $p->id }}">Edit</a>
                                    </th>

                                    <div class="modal fade" id="rubah{{ $p->id }}" tabindex="-1" role="dialog" 
                                        aria-labelledby="rubah{{ $p->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="rubah{{ $p->id }}">Edit Jabatan</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                            
                                            <form action="/jabatan" method="post">
                                              @method('put')
                                              @csrf
                                                <div class="form-group mb-3">
                                                    <label for="nik" class='mb-2'>Nama</label>
                                                    <input type="text" class="form-control" name="nama" 
                                                        value="{{ $p->nama }}">
                                                </div>
                                
                                                <div class="form-group mb-3">
                                                  <label for="nama" class='mb-2'>Keterangan</label>
                                                  <textarea name="keterangan" id=""rows="10" 
                                                   class="form-control">{{ $p->keterangan }}</textarea>
                                                </div>
                                                
                                              </div>
                                                <div class="modal-footer">
                                                  <input type="hidden" name="id" value="{{ $p->id }}">
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                  <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </form>
                                      </div>
                                    </div>
                                  </div>
                                </tr>
                            @endforeach

                            </tbody>
                            <tfoot>
                              <tr>
                                <td colspan="5"> {{ $jabatan->withQueryString()->links() }}</td>
                              </tr>
                            </tfoot>
                        </table>
                       </div>    
                    </div>
                </div>
            {{-- </div> --}}
        </div>



        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Menambah Jabatan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    
                    <form method="post" action="/jabatan">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="nama" class='mb-2'>Nama</label>
                            <input type="text" class="form-control" id="nama" 
                                    placeholder="contoh : 'Supervisor' "
                                    name="nama">
                        </div>
        
                        <div class="form-group mb-3">
                          <label for="nama" class='mb-2'>Keterangan</label>
                          <textarea name="keterangan" id=""rows="10" class="form-control" 
                                    placeholder="contoh : 'Jabatan Supervisor' "></textarea>
                        </div>
                        
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
              </div>
            </div>
          </div>

@if(session()->has('success'))
  <div class="alert alert-success" role="alert">
      {{ session('success') }}
  </div>
@endif
@if(session()->has('error'))
  <div class="alert alert-danger" role="alert">
    {{ session('error') }}
  </div>
@endif

@endsection

