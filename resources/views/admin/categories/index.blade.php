@extends('admin.layouts.app')

@section('title', 'Danh sách danh mục')

@section('content')
<div class="container mt-4">
    {{-- Thông báo thành công / lỗi --}}
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Danh sách danh mục</h2>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">Thêm mới</a>
    </div>

    {{-- Form tìm kiếm --}}
    <form method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Tìm kiếm..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-outline-secondary">Tìm kiếm</button>
        </div>
    </form>

    {{-- Bảng danh mục --}}
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Tên danh mục</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $cate)
                    <tr>
                        <td>{{ $cate->id }}</td>
                        <td>{{ $cate->name }}</td>
                        <td>
                            <span class="badge {{ $cate->status ? 'bg-success' : 'bg-secondary' }}">
                                {{ $cate->status ? 'Hoạt động' : 'Tạm dừng' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('categories.edit', $cate->id) }}" class="btn btn-sm btn-primary">Sửa</a>
                            <form action="{{ route('categories.destroy', $cate->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc muốn xóa danh mục này?')">Xóa</button>
                            </form>
                           
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
           
        </table>
        {{$categories->links()}}
    </div>
</div>
@endsection
