@extends('layouts.admain')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Category</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i></a>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary d-inline-block">Danh mục</h6>
            <div class="float-right">
                <a href="/admin/category/add" class="btn btn-success">Thêm mới <i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên </th>
                            <th>id Cha</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cat as $i)
                        <tr>
                            <td>{{$i->ten}}</td>
                            <td>{{$i->parent_id}}</td>
                            <td><a href="/admin/category/edit/{{$i->id}}">Sửa</a> | <a href="/admin/category/delete/{{$i->id}}">Xóa</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection