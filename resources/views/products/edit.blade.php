@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('products.create') }}" class="btn btn-primary">Thêm mới</a>

    <h2>Chỉnh sửa</h2>
    <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Tên sản phẩm</label>
            <input type="text" class="form-control" id="name" name="name"  value="{{ $product->name }}">
            @error('name')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Giá</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}">
            @error('price')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Số lượng</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $product->quantity }}">
            @error('quantity')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Danh mục</label>
               @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
            <select class="form-control" id="category_id" name="category_id">
                <option value="">-- Chọn danh mục --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-3">
            <label for="image" class="form-label">Hình ảnh</label>
            <input type="file" class="form-control" id="image" name="image">
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        @if ($product->image)
            <div class="mb-3">
                <img src="{{ asset('storage/' . $product->image) }}" alt="Hình ảnh sản phẩm" width="150">
            </div>
        @endif
        
        <div class="mb-3">
            <label for="description" class="form-label">Mô tả</label>
            <input type="text" class="form-control" id="description" name="description" value="{{ $product->description }}">
            @error('name')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Trạng thái</label>
            <select name="status" class="form-control">
                <option value="1"{{ $product->status == 1 ? 'selected' : '' }}>Hoạt động</option>
                <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Tạm dừng</option>
            </select>
            @error('status')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Cập nhập sản phẩm</button>
    </form>
</div>
@endsection
