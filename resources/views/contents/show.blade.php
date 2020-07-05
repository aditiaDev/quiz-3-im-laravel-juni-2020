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
            <div class="col-lg-6">
                <table class="table table-bordered">
                    <tbody>
                        @foreach ($data as $item => $row)
                        <tr>
                            <td class="text-right"><b>Judul</b></td>
                            <td>{{$row->judul}}</td>
                        </tr>
                        <tr>
                            <td class="text-right"><b>Isi</b></td>
                            <td>{{$row->isi}}</td>
                        </tr>
                        <tr>
                            <td class="text-right"><b>Slug</b></td>
                            <td>{{$row->slug}}</td>
                        </tr>
                        <tr>
                            <td class="text-right"><b>Tags</b></td>
                            <td>
                                @foreach ($tags as $tag)
                                    <button class="btn btn-sm btn-success">{{$tag}}</button>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td class="text-right"><b>Created Date</b></td>
                            <td>{{date('d F Y H:i:s', strtotime($row->created_date))}}</td>
                        </tr>
                        <tr>
                            <td class="text-right"><b>Modified Date</b></td>
                            <td>{{date('d F Y H:i:s', strtotime($row->modified_date))}}</td>
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

@endsection