@extends('layout.master')
@section('content')
<div class="main">
      <div class="main-content">
          <div class="container-flud">
              <div class="row">
                  <div class="col-md-6">
                    <div class="panel">
                        <div class="panel-heading">
                                <h3 class="panel-title">Rangking 5 Besar</h3>   
                                        <div class="panel-body">
                                            <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                             <th >Rangking</th>
                                                             <th >Nama</th>
                                                             <th >Nilai</th>
                                                        </tr>
                                                    </thead>
                                                          <tbody>
                                                          @php
                                                                $ranking=1;
                                                          @endphp
                                                          @foreach(ranking5Besar() as $s)
                                                            <tr>
                                                                <td>{{$ranking}}</td>
                                                                <td>{{$s->nama_lengkap()}}</td>
                                                                <td>{{$s->rataRataNilai}}</td>
                                                            </tr>
                                                            @php
                                                                $ranking++;
                                                            @endphp
                                                            @endforeach
                                                         </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                       </div>
                                         <div class="col-md-3">
                                                    <div class="metric">
                                                        <span class="icon"><i class="fa fa-user"></i></span>
                                                        <p>
                                                            <span class="number">{{totalSiswa()}}</span>
                                                            <span class="title">Total Siswa</span>
                                                        </p>
                                                 </div>
								            </div>
                                            <div class="col-md-3">
                                                    <div class="metric">
                                                        <span class="icon"><i class="fa fa-user"></i></span>
                                                        <p>
                                                            <span class="number">{{totalGuru()}}</span>
                                                            <span class="title">Total Guru</span>
                                                        </p>
                                                 </div>
								            </div>
                                     </div>
                                </div>
                          </div>
                    </div>
                   @stop
                   