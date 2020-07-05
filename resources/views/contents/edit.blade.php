@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-lg-12">
      
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data Artikel</h6>
        </div>
        <div class="card-body">
            <div class="row">
              
                <div class="col-md-6">
                    <form action="/artikel/{{$id}}" method="POST">
                    @csrf
                    @method('PUT')
                        @foreach ($data as $item => $row)
                        <div class="form-group">
                            <label>JUDUL</label>
                            <input type="text" class="form-control" name="judul" value="{{$row->judul}}">
                        </div>
                        <div class="form-group">
                            <label>ISI</label>
                            <textarea class="form-control" name="isi" rows="4">{{$row->isi}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>SLUG</label>
                            <input type="text" class="form-control" name="slug" value="{{$row->slug}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>TAGS</label>
                            <input type="text" class="form-control" name="tag" value="{{$row->tag}}">
                        </div>
                        <input type="submit" class="btn btn-info" value="Update">
                        @endforeach
                    </form>
                </div>
            </div>
        </div>
      </div>

    </div>

</div>

@endsection
@push('scripts')
<script>

  $(function(){
    $("[name='judul']").keyup(function(){
      var str = $("[name='judul']").val();
      var res = str.split(' ').join('-').toLowerCase();
      $("[name='slug']").val(res);
    })
  });
</script>
@endpush