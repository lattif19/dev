
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>S2P-App</title>
    <link rel="shortcut icon" href="/img/new.ico">
    <!-- Bootstrap core CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/pricing.css" rel="stylesheet">
  </head>

  <body>

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
      <nav class="my-2 my-md-0 mr-md-3">
        <!-- Example single danger button -->
          <div class="btn-group">
            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{ Auth::user()->email }}
            </button>
            
            <div class="dropdown-menu">
              <a class="dropdown-item" href="/profile/{{ auth()->user()->id }}">Profile</a>
              @if(in_array(auth()->user()->id , explode(",",env("ADMIN_SYSTEM"))))
                <a class="dropdown-item" href="/main/administrator">Administrator</a>
              @endif
              <hr>
              <a class="dropdown-item" href="/logout">Logout</a>
            </div>
          </div>
      </nav>
    </div>

   <div class="pricing-header px-2 py-2 pt-md-2 pb-md-2 mx-auto text-center">
    
    </div> 

    {{-- <div class="container"> --}}
    <div class="row d-flex justify-content-center">
      <div class="card-deck mb-12 text-center">
        
        @if(DB::table("modul")->where("id", 1)->get()[0]->keterangan == "Aktif")
          @can("pegawaiHrd")
            <div class="card mb-4 box-shadow">
              <div class="card-header">
                <h4 class="my-0 font-weight-normal">Managemen Pegawai</h4>
              </div>
              <div class="card-body">
                <a href="/pegawai/jakarta">
                    <span class="material-icons" style="font-size: 190px;"> manage_accounts </span>
                </a>
              </div>
            </div>
          @endcan

          @can("pegawaiAdmin")
            <div class="card mb-4 box-shadow">
              <div class="card-header">
                <h4 class="my-0 font-weight-normal">Managemen Pegawai</h4>
              </div>
              <div class="card-body">
                <a href="/pegawai/jakarta">
                    <span class="material-icons" style="font-size: 190px;"> manage_accounts </span>
                </a>
              </div>
            </div>
          @endcan
        @endif
        
        @if(isJakarta())
          @if(DB::table("modul")->where("id", 3)->get()[0]->keterangan == "Aktif")
              @can("lemburUser")
              <div class="card mb-4 box-shadow">
                <div class="card-header">
                  <h4 class="my-0 font-weight-normal">Pengajuan Lembur</h4>
                </div>
                <div class="card-body">
                  <a href="/lembur">
                    <span class="material-icons" style="font-size: 190px;">access_time</span>
                  </a>
                </div>
              </div>
              @endcan

              @can("pegawaiAdmin")
              <div class="card mb-4 box-shadow">
                <div class="card-header">
                  <h4 class="my-0 font-weight-normal">Pengajuan Lembur</h4>
                </div>
                <div class="card-body">
                  <a href="/lembur">
                    <span class="material-icons" style="font-size: 190px;">access_time</span>
                  </a>
                </div>
              </div>
              @endcan

              @can("pegawaiHrd")
              <div class="card mb-4 box-shadow">
                <div class="card-header">
                  <h4 class="my-0 font-weight-normal">Pengajuan Lembur</h4>
                </div>
                <div class="card-body">
                  <a href="/lembur">
                    <span class="material-icons" style="font-size: 190px;">access_time</span>
                  </a>
                </div>
              </div>
              @endcan

              @can("pegawaiApprove")
              <div class="card mb-4 box-shadow">
                <div class="card-header">
                  <h4 class="my-0 font-weight-normal">Pengajuan Lembur</h4>
                </div>
                <div class="card-body">
                  <a href="/lembur">
                    <span class="material-icons" style="font-size: 190px;">access_time</span>
                  </a>
                </div>
              </div>
              @endcan
          @endif
        @endif

        
        
        @if(isJakarta())
          @if(DB::table("modul")->where("id", 2)->get()[0]->keterangan == "Aktif")
              @can("lemburUser")
                <div class="card mb-4 box-shadow">
                  <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Presensi & Absensi</h4>
                  </div>
                  <div class="card-body">
                    <a href="/absen">
                      <span class="material-icons" style="font-size: 190px;">co_present</span>
                    </a>
                  </div>
                </div>
              @endcan

              @can("pegawaiAdmin")
                <div class="card mb-4 box-shadow">
                  <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Presensi & Absensi</h4>
                  </div>
                  <div class="card-body">
                    <a href="/absen">
                      <span class="material-icons" style="font-size: 190px;">co_present</span>
                    </a>
                  </div>
                </div>
              @endcan

              @can("pegawaiHrd")
                <div class="card mb-4 box-shadow">
                  <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Presensi & Absensi</h4>
                  </div>
                  <div class="card-body">
                    <a href="/absen">
                      <span class="material-icons" style="font-size: 190px;">co_present</span>
                    </a>
                  </div>
                </div>
              @endcan

              @can("pegawaiApprove")
                <div class="card mb-4 box-shadow">
                  <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Presensi & Absensi</h4>
                  </div>
                  <div class="card-body">
                    <a href="/absen">
                      <span class="material-icons" style="font-size: 190px;">co_present</span>
                    </a>
                  </div>
                </div>
              @endcan
          @endif
        @endif
        
        
      </div>
    </div>

    <div class="row d-flex justify-content-center">
      <div class="card-deck mb-12 text-center">

          @if(DB::table("modul")->where("id", 4)->get()[0]->keterangan == "Aktif")
            @can("pegawaiHrd")
            <div class="card mb-4 box-shadow">
                <div class="card-header">
                  <h4 class="my-0 font-weight-normal">Kendaraan</h4>
                </div>
                <div class="card-body">
                  <a href="/kendaraan">
                    <span class="material-icons" style="font-size: 190px;">minor_crash</span>
                  </a>
                </div>
              </div>
            @endcan

            @can("pegawaiAdmin")
            <div class="card mb-4 box-shadow">
                <div class="card-header">
                  <h4 class="my-0 font-weight-normal">Kendaraan</h4>
                </div>
                <div class="card-body">
                  <a href="/kendaraan">
                    <span class="material-icons" style="font-size: 190px;">minor_crash</span>
                  </a>
                </div>
              </div>
            @endcan
          @endif
          
          @if(DB::table("modul")->where("id", 6)->get()[0]->keterangan == "Aktif")
            <div class="card mb-4 box-shadow">
              <div class="card-header d-flex justify-content-between">
                <h4 class="my-0 font-weight-normal">Reminder</h4>
              </div>
              <div class="card-body">
                <a href="/reminder/dashboard">
                  <span class="material-icons" style="font-size: 190px;">alarm</span>
                  
                </a>
              </div>
            </div>
          @endif

          @if(DB::table("modul")->where("id", 5)->get()[0]->keterangan == "Aktif")
          <div class="card mb-4 box-shadow">
            <div class="card-header d-flex justify-content-between">
              @if(total_pengumuman(auth()->user()->id) > 0)
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger text-light">
                  {{ total_pengumuman(auth()->user()->id) }}
                </span>
              @endif
              <h4 class="my-0 font-weight-normal">Pengumuman & Slip Gaji</h4>
              </div>
              <div class="card-body">
                <a href="/pengumuman">
                  <span class="material-icons" style="font-size: 190px;">archive</span>
                  
                </a>
              </div>
            </div>
          @endif

      </div>

      <footer class="pt-4 my-md-5 pt-md-5 border-top">
        <div class="row">
        </div>
      </footer>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="/js/vendor/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/vendor/holder.min.js"></script>
    <script>
      Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
      });
    </script>
  </body>
</html>
