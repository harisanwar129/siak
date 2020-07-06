
@extends('layout.master')
@section('content')
  <div class="main">
      <div class="main-content">
          <div class="container-flud">
              <div class="row">
                  <div class="col-md-12">
                  <div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Data Siswa</h3>
                  <div class="navbar-btn navbar-btn-right">
                  <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                        Import Excel
                      </a>
                  <a href="/siswa/exportExcel" class="btn btn-sm btn-primary">Export Ke Excel</a>
                  <a href="/siswa/exportPdf" class="btn btn-sm btn-primary">Export Ke Pdf</a>
					<a type="button"class="btn btn-primary" title="Upgrade to Pro" data-toggle="modal" data-target="#importExcel"><i class="fa fa-plus"></i> <span>Tambah Data</span></a>
				</div>

								</div>
								<div class="panel-body">
									<table id="datatable" class="table table-hover" >
										<thead>
											<tr>
												<th >Nama Lengkap</th>
                        <th >Jenis Kelamin</th>
                        <th >Agama</th>
                        <th >Alamat</th>
                        <th >Rata</th>
                        <th >Opsi</th>
											</tr>
										</thead>
										<tbody>
									
										</tbody>
									</table>
								</div>
							</div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!!Form::open(['route'=>'siswa.import','class'=>'form-horizontal','enctype'=>'multipart/form-data'])!!}

        {!!Form::file('data_siswa')!!}
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-sm btn-primary" value="Import">
        </form>
      </div>
    </div>
  </div>
</div>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="/siswa/create" method="POST" enctype="multipart/form-data">
      {{csrf_field()}}

          <div class="form-group{{$errors->has('nama_depan') ? 'has-error': ''}}">
            <label for="namaDepan">Nama depan</label>
            <input name="nama_depan"type="text" class="form-control" id="NamaDepan" aria-describedby="emailHelp" placeholder="Nama Depan" value="{{old('nama_depan')}}" required>
            @if($errors->has('nama_depan'))
            <span class="help-block">{{$errors->first('nama_depan')}}</span>
            @endif
          </div>

          <div class="form-group{{$errors->has('nama_belakang') ? 'has-error': ''}}">
            <label for="namaBelakang">Nama Belakang</label>
            <input name="nama_belakang" type="text" class="form-control" id="NamaBelakang" aria-describedby="emailHelp" placeholder="Nama Belakang" value="{{old('nama_belakang')}}" required>
             @if($errors->has('nama_belakang'))
            <span class="help-block">{{$errors->first('nama_belakang')}}</span>
            @endif
          </div>
          <div class="form-group{{$errors->has('email') ? 'has-error': ''}}">
            <label for="email">Email</label>
            <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="email" value="{{old('email')}}" required>
            @if($errors->has('email'))
            <span class="help-block">{{$errors->first('email')}}</span>
            @endif 
          </div>
          <div class="form-group{{$errors->has('jenis_kelamin') ? 'has-error': ''}}">
            <label for="exampleFormControlSelect1">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
              <option value="Laki-laki"{{(old('jenis_kelamin') =='Laki-laki') ? 'selected':''}}>Laki-Laki</option>
              <option value="Perempuan"{{(old('jenis_kelamin') =='Perempuan') ? 'selected':''}}>Perempuan</option>
         @if($errors->has('jenis_kelamin'))
            <span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
            @endif
            </select>
         </div>
         <div class="form-group{{$errors->has('agama') ? 'has-error': ''}}">
            <label for="agama">Agama</label>
            <input name="agama" type="text" class="form-control" id="agama" aria-describedby="emailHelp" placeholder="Agama" value="{{old('agama')}}" required>
            @if($errors->has('agama'))
            <span class="help-block">{{$errors->first('agama')}}</span>
            @endif 
          </div>

         <div class="form-group{{$errors->has('alamat') ? 'has-error': ''}}">
            <label for="exampleFormControlTextarea1">Alamat</label>
            <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3" required>{{old('alamat')}}</textarea>
            @if($errors->has('alamat'))
            <span class="help-block">{{$errors->first('alamat')}}</span>
            @endif 
          </div>
          
     
      <div class="form-group{{$errors->has('avatar') ? 'has-error': ''}}">
            <label for="exampleFormControlTextarea1">Avatar</label>
            <input type="file" name="avatar"class="form-control" value="{{old('avatar')}}" required>
            @if($errors->has('avatar'))
            <span class="help-block">{{$errors->first('avatar')}}</span>
            @endif 
          </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
      </div>
    </div>
  </div>
</div>              
@stop

@section('footer')
 <script>
 $(document).ready(function(){
$('#datatable').DataTable({
  processing:true,
  serverside:true,
  ajax:"{{route('ajax.get.data.siswa')}}",
  columns:[
    {data:'nama_lengkap',name:'nama_lengkap'},
    {data:'jenis_kelamin',name:'jenis_kelamin'},
    {data:'agama',name:'agama'},
    {data:'alamat',name:'alamat'},
    {data:'rata2_nilai',name:'rata2_nilai'},
    {data:'aksi',name:'aksi'}
  ]
});

        $('.delete').click(function(){
            var siswa_id=$(this).attr('siswa-id');
            swal({
          title: "Yakin??",
          text: "Apaakah anda yakin akan menghapus data dengan "+siswa_id+"??",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
           window.location="/siswa/"+siswa_id+"/delete";
          } else {
            swal("Your imaginary file is safe!");
          }
        });
        });
        });
 </script>

 @stop
