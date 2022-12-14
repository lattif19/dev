
@extends('layout.main')
@include('lembur.sidebar.menu')

@section('container')
<style>
    a{
        text-decoration: none;
    }
</style>
        <div class="container-fluid px-4">
            <div class="row">
                <h1 class="mt-4">{{ $title }}</h1>
            </div>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">PT Sumber Segara Primadaya</li>
            </ol>

            


            <!-- <div class="row"> -->
                <div class="content">
                    <div class="box">
                        <div class="nav justify-content-between box-header">
                            <h2>Riwayat Pengajuan</h2>
                            <div class="col-lg-3">
                                <form class="row">
                                    <div class="col-md-8" style="padding-right: 0px">
                                        <input class="form-control" type="search" placeholder="Periode.." aria-label="Periode.." name="cari" value="{{ request()->cari }}">
                                    </div>
                                    <div class="col-md-3">
                                        <button class="btn btn-dark text-white" type="submit">Search</button>
                                    </div>
                                </form>
                            </div> 
                            {{-- <form action="" class="search-bar">
                                <input type="search" name="cari" value="{{ request()->cari }}" pattern=".*\S.*">
                                <button class="search-btn" type="submit">
                                    <span>Search</span>
                                </button>
                            </form> --}}
                        </div>
                        <div class="box-body table-respon">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <td>Periode</td>
                                        <td>Total Hari Biasa </td>
                                        <td>Total Hari Libur </td>
                                        <td>Keterangan </td>
                                        <td>Status </td>
                                        <td  width="180px" align="center">Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($pengajuanLembur)
                                        @foreach ($pengajuanLembur as $i)
                                            <tr>
                                                <td>
                                                    @if ($i->status == "Belum Diajukan" or $i->status == "Dikembalikan")
                                                        <a href="/lembur/{{  Str::slug($i->periode) }}/{{ $i->id }}">
                                                            <strong>{{ $i->periode }} </strong>
                                                        </a>
                                                    @else
                                                        <a href="/lembur/calculated/{{ $i->id }}/{{  Str::slug($i->periode) }}">
                                                            <strong>{{ $i->periode }} </strong>
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>{{ format_jam($i->total_biasa) }} </td>
                                                <td>{{ format_jam($i->total_libur) }} </td>
                                                <td>{!! ucwords( $i->keterangan ) !!} </td>
                                                <td>
                                                    {{ $i->status }} 
                                                </td>
                                                <td align="center"> 
                                                    @if ($i->status == "Belum Diajukan" or $i->status == "Dikembalikan")
                                                        <a href="/lembur/{{  Str::slug($i->periode) }}/{{ $i->id }}" class="btn btn-info btn-xs">
                                                            <i class="fa fa-info" aria-hidden="true" data-toogle="tooltip" data-placement="top" title="Detail"></i>
                                                        </a>
                                                        <a href="/lembur/calculating/{{ Str::slug($i->periode) }}/{{ $i->id }}" class="btn btn-info btn-xs">
                                                            <i class="fa fa-list-alt" data-toogle="tooltip" data-placement="top" title="summarize"></i>
                                                        </a>
                                                                                                              
                                                    @else
                                                        <a href="/lembur/calculated/{{ $i->id }}/{{  Str::slug($i->periode) }}" class="btn btn-info btn-xs">
                                                            <i class="fa fa-info" aria-hidden="true" data-toogle="tooltip" data-placement="top" title="Detail"></i>
                                                        </a>
                                                    @endif
                                                    <a href="/lembur/print/{{ $i->id }}/{{  Str::slug($i->periode) }}" class="btn btn-primary btn-xs">
                                                        <i class="fa fa-print" data-toogle="tooltip" data-placement="top" title="print"></i>
                                                    </a>
                                                    @if ($i->status == "Diajukan")
                                                    
                                                    <button class="btn btn-danger btn-xs" 
                                                            data-toggle="modal" 
                                                            data-target="#tambahData{{ $i->id }}">
                                                            <i class="fa fa-arrow-circle-left" data-toogle="tooltip" data-placement="top" title="Batalkan Pengajuan"></i>
                                                    </button>


                                                    <div class="modal fade" id="tambahData{{ $i->id }}" tabindex="-1" role="dialog"
                                                    aria-labelledby="tambahData{{ $i->id }}"
                                                    aria-hidden="true">

                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="tambahData{{ $i->id }}">Batal Pengajuan </h5>
                                                                        <button type="button" class="btn close btn-danger" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="/lembur/tarik_pengajuan_lembur" method="POST">
                                                                        @csrf
                                                                        <h4>Apakah Anda Yakin Ingin Membatalkan Pengajuan Lembur ?</h4>
                                                                        <h5>Pengajuan yang akan di Batalkan : <strong>{{ $i->periode }}</strong></h5>
                                                                        <input type="hidden" name="lembur_pengajuan_id" value="{{ $i->id }}">
                                                                        <div class="form-group mt-5">
                                                                            <button class="btn col-lg-2 btn-primary btn-lg" type="submit"> Batal </button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    @endif 
                                                    
                                                </td>
                                            </tr>
                                        @endforeach                                       
                                    @else
                                        <tr>
                                            <td colspan="4">Tidak Ada Data</td>
                                        </tr>
                                    @endif
                                </tbody>
                                @if ($pengajuanLembur)
                                    @if ($pengajuanLembur->count()>10)
                                        <tfoot>
                                            {!! $pengajuanLembur->links() !!}                         
                                        </tfoot>
                                        @endif
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

