
@extends('layout.main')
@include('lembur.sidebar.menu')

@section('container')
<style>
    a{
        text-decoration: none;
    }
</style>
        <div class="container-fluid px-4">
           <h1 class="mt-4"> {{ $title }}</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">PT Sumber Segara Primadaya</li>
            </ol>

            <!-- <div class="row"> -->
                <div class="content">
                    <div class="box">
                        <div class="box-body">
                            
        
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <td width="100px" align="center">No</td>
                                            <td width="300px" >Nama</td>
                                            <td>Periode</td>
                                            <td width="100px" align="center">Hari Biasa</td>
                                            <td width="100px" align="center">Hari Libur</td>
                                            <td width="150px" align="center">Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($pengajuan_lembur) > 0)
                                        @foreach ($pengajuan_lembur as $d)
                                            <tr>
                                                <td align="center">{{ $loop->index+1 }}</td>
                                                <td>
                                                    <a href="/lembur_approve/detail/{{ $d->id }}">
                                                        <strong>{{ $d->nama }}</strong>
                                                    </a>
                                                </td>
                                                <td>{{ $d->periode }}</td>
                                                <td align="center">{{ format_jam($d->total_biasa) }}</td>
                                                <td align="center">{{ format_jam($d->total_libur) }}</td>
                                                <td align="center">
                                                    <a href="#" data-toggle="modal" data-target="#persetujuan{{ $d->id }}">
                                                        <span class="material-icons">
                                                            verified
                                                        </span>
                                                    </a> 
                                                    <a href="/lembur_approve/detail/{{ $d->id }}">
                                                        <span class="material-icons">
                                                            info
                                                        </span>
                                                    </a>
                                                </td>
                                            </tr>





                                            <div class="modal fade" id="persetujuan{{ $d->id }}" tabindex="-1" role="dialog"
                                                aria-labelledby="persetujuan{{ $d->id }}"
                                                aria-hidden="true">
    
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="persetujuan{{ $d->id }}">Persetujuan Lembur</h5>
                                                                <button type="button" class="btn close btn-danger" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="/lembur_aprove/aksi" method="post">
                                                                @csrf
                                                                @method("put")
                                                                    <div class="form-group mt-3">
                                                                        <label for="keterangan" class="mb-3">Keterangan</label>
                                                                        <textarea name="keterangan" class="form-control" rows="5"></textarea>
                                                                    </div>
                                                                    <div class="form-group mt-3">
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="radio" name="status" value="Disetujui" checked>
                                                                            <label class="form-check-label" for="inlineRadio1">Disetujui</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="radio" name="status" value="Dikembalikan">
                                                                            <label class="form-check-label" for="inlineRadio2">Dikembalikan</label>
                                                                        </div>
                                                                    </div>
                                                                        
                                                                <div class="form-group mt-5">
                                                                    <input type="hidden" name="pengajuan_lembur_id" value="{{ $d->id }}">
                                                                    <button class="btn col-lg-2 btn-primary" type="submit"> Submit </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        @endforeach
                                    </tbody>
                                        @else
                                    <tfoot>
                                        <tr>
                                            <td colspan="5"> Tidak Ada Pengajuan</td>
                                        </tr>
                                    </tfoot>
                                        @endif
                                </table>
                            
                        </div>
                    </div>
                </div>
            <!-- </div> -->
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

