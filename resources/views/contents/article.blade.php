@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-lg-12">
      
      @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $message }}</strong>
        </div>
      @endif

      @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button> 
          <strong>{{ $message }}</strong>
        </div>
      @endif
      
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data Artikel</h6>
        </div>
        <div class="card-body">
          <button id="ADD_DATA" class="btn btn-outline-primary btn-sm" style="margin-bottom: 20px"><i class="fas fa-plus"></i> Add Data</button>
          <div class="row">
            <div class="col-lg-12">
              <table class="table table-bordered table-striped">
                <thead>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Isi</th>
                  <th>Slug</th>
                  <th>Tag</th>
                  <th>Created Date</th>
                  <th>Modified Date</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  @foreach ($data as $item => $row)
                  <tr>
                    <td>{{ $item+1 }}</td>
                    <td>{{ $row->judul }}</td>
                    <td>{{ $row->isi }}</td>
                    <td>{{ $row->slug }}</td>
                    <td>{{ $row->tag }}</td>
                    <td>{{ date('d F Y', strtotime($row->created_date)) }}</td>
                    <td>{{ date('d F Y', strtotime($row->modified_date)) }}</td>
                    <td>
                      <a href="/artikel/{{$row->id}}" class="btn btn-sm btn-primary"><i class="fas fa-search"></i> </a>
                      <a href="/artikel/{{$row->id}}/edit" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> </a>
                      <form action="/artikel/{{$row->id}}" method="POST" style="display: inline">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete ?')"><i class="fas fa-trash"></i> </button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>

</div>
<div class="modal fade" id="ADD_MODAL">
  <div class="modal-dialog">
    <form action="/artikel" method="post">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Data</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>JUDUL</label>
                <input type="text" class="form-control" name="judul">
              </div>
              <div class="form-group">
                <label>ISI</label>
                <textarea class="form-control" name="isi" rows="4"></textarea>
              </div>
              <div class="form-group">
                <label>SLUG</label>
                <input type="text" class="form-control" name="slug" readonly>
              </div>
              <div class="form-group">
                <label>TAGS</label>
                <input type="text" class="form-control" name="tag">
              </div>
              <div class="form-group">
                <label>USER</label>
                <select name="id_user" class="form-control">
                  @foreach ($data_user as $item => $row)
                      <option value="{{ $row->id }}">{{ $row->nama }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </div>
    </form>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endsection
@push('scripts')
<script>
  Swal.fire({
      title: 'Berhasil!',
      text: 'Memasangkan script sweet alert',
      icon: 'success',
      confirmButtonText: 'Cool'
  });

  $(function(){
    $("#ADD_DATA").click(function(){
      $("#ADD_MODAL").modal('show');
    });

    $("[name='judul']").keyup(function(){
      var str = $("[name='judul']").val();
      var res = str.split(' ').join('-').toLowerCase();
      $("[name='slug']").val(res);
    })
  });
</script>
@endpush