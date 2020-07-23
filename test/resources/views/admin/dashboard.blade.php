@extends('layout.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Dashboard

  </h1>

</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Presensi Kehadiran</h3>
        </div>

    <div class="box-body">
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"></span>

            <div class="info-box-content">
              <span class="info-box-text">Jumlah Pegawai</span>
              <span class="info-box-number">{{$jumlah_pegawai}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"></span>

            <div class="info-box-content">
              <span class="info-box-text">Pegawai On Time</span>
              <span class="info-box-number">{{$onTime}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"></span>

            <div class="info-box-content">
              <span class="info-box-text">Pegawai Telat</span>
              <span class="info-box-number">{{$onTelat}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"></span>

            <div class="info-box-content">
              <span class="info-box-text">Pegawai Absensi</span>
              <span class="info-box-number">{{$onAlpha}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
        </div>

    <div class="row">

    <div class="col-lg-4">

        <div class="box-header">
          <h3 class="box-title">Pegawai On Time</h3>
        </div>
        <div class="box-body">
          <div id="donut-example" style="height: 200px;"></div>
          <span></span>
        </div>
        <!-- /.box-body -->

    </div>
    <div class="col-lg-4">

        <div class="box-header">
          <h3 class="box-title">Pegawai terlambat</h3>
        </div>
        <div class="box-body">
          <div id="donut-example2" style="height: 200px;"></div>
        </div>
        <!-- /.box-body -->

    </div>
    <div class="col-lg-4">

        <div class="box-header">
          <h3 class="box-title">Pegawai Absen</h3>
        </div>
        <div class="box-body">
          <div id="donut-example3" style="height: 200px;"></div>
        </div>

      <!-- /.box-body -->
      </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="box box-warning">
      <div class="box-header">
        <h3 class="box-title">Update Kehadiran pegawai</h3>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-lg-4">
            <label>Check In</label>
            <ul class="timeline" id="timeline-check-in">
              @foreach($posts as $post)
              <li>
                <i class="fa fa-circle-o bg-green"></i>
                  <div class="timeline-item"><p><b>{{$post->nama}}</b>{{$post->waktu_datang}}</p>
                    </div>
                    @endforeach
              </li>
            </ul>
          </div>
          <div class="col-lg-4">
            <label>Check Out</label>
            <ul class="timeline" id="timeline-check-in">
              @foreach($mbuh as $mbuhs)
              <li>
                <i class="fa fa-circle-o bg-green"></i>
                  <div class="timeline-item"><p><b>{{$mbuhs->nama}}</b> {{$mbuhs->waktu_pulang}}</p>
                  </div>
                  @endforeach
              </li>

            </ul>
          </div>
          <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <label>Keterangan</label>
                <div>
                  <small class="label bg-purple">Check Out</small>
                  <label style="margin-left: 10px;">Keluar sebelum waktunya</label>
                </div>
                <div class="margin-top-10">
                  <small class="label bg-blue">Check Out</small>
                  <label style="margin-left: 10px;">Keluar tepat waktu</label>
                </div>
                <div class="margin-top-10">
                  <small class="label bg-orange">Check In&nbsp;&nbsp;&nbsp;</small>
                  <label style="margin-left: 10px;">Hadir terlambat</label>
                </div>
                <div class="margin-top-10">
                  <small class="label bg-green">Check In&nbsp;&nbsp;&nbsp;</small>
                  <label style="margin-left: 10px;">Hadir tepat waktu</label>
                </div>
              </div>
        </div>
      </div>
    </div>
  </div>
</div>

</section>
<!-- /.content -->

@stop
