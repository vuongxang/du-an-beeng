@extends('backend.master')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Quản lý Topic</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Topic</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
   <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Danh sách Topic</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Mô tả</th>
                    <th>Ảnh</th>
                    <th>Chi tiết</th>
                    <th>Show menu</th>
                    <th><a href="{{ route('topic.create') }}" class="btn btn-sm btn-success">Thêm mới</a></th>
                  </tr>
                  </thead>
                    <tbody>
                        @foreach ($models as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->desc}}</td>
                                <td><img src="{{$item->image}}" alt=""></td>
                                <td><a href="{{route('topic.show',$item->id)}}" class="btn btn-success">Show</a></td>
                                <td>
                                    {{ $item->show_menu==1?"có":"không" }}
                                </td>
                                <td class="text-center">
                                    <a href="{{route('topic.edit',$item->id)}}" class="fas fa-edit text-success"></a>
                                    <form action="{{route('topic.destroy',$item->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn"><i class="fas fa-times text-danger"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                       
                    </tbody>
                    
                </table>
                {{$models->links()}}
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
@endsection