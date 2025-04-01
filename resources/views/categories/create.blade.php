@extends('layouts.app')

@section('title', 'Thêm mới danh mục')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Thêm danh mục</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Tên danh mục</label>
                <input type="text" name="name" class="form-control">
                @error('name')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Trạng thái</label>
                <select name="status" class="form-control">
                    <option value="1">Hoạt động</option>
                    <option value="0">Tạm dừng</option>
                </select>
                @error('status')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Thêm danh mục</button>
        </form>
    </div>
</div>
@endsection
