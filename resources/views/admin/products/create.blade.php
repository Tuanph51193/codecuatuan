@extends('admin.layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('products.create') }}" class="btn btn-primary">Thêm mới</a>

    <h2>Thêm sản phẩm mới</h2>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Tên sản phẩm</label>
            <input type="text" class="form-control" id="name" name="name" >
            @error('name')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Giá</label>
            <input type="number" class="form-control" id="price" name="price" >
            @error('price')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Số lượng</label>
            <input type="number" class="form-control" id="quantity" name="quantity" >
            @error('quantity')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Danh mục</label>
            <select class="form-control" id="category_id" name="category_id" >
                <option value="">-- Chọn danh mục --</option>
                
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            
            </select>
            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
        @endif    
        
        
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Hình ảnh</label>
            <input type="file" class="form-control" id="image" name="image">
            @error('image')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Mô tả</label>
            <input type="text" class="form-control" id="description" name="description" >
            @error('description')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror
     
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Trạng thái</label>
            
            <select class="form-control" id="status" name="status">
                <option value="1">Hoạt động</option>
                <option value="0">Tạm dừng</option>
            </select>
            
        </div>
        <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
    </form>
</div>
@endsection
