@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h2>Chi tiết sản phẩm</h2>
        <table class="table">
            <tr>
                <th>ID:</th>
                <td>{{ $product->id }}</td>
            </tr>
            <tr>
                <th>Tên sản phẩm:</th>
                <td>{{ $product->name }}</td>
            </tr>
            <tr>
                <th>Giá:</th>
                <td>{{ number_format($product->price) }} VND</td>
            </tr>
            <tr>
                <th>Số lượng:</th>
                <td>{{ $product->quantity }}</td>
            </tr>
            <tr>
                <th>Danh mục:</th>
                <td>{{ $product->category_id }}</td>
            </tr>
            <tr>
                <th>Hình ảnh:</th>
                <td>{{ $product->image }} 
                    @if ($product->image)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="Hình ảnh sản phẩm" width="150">
                    </div>
                @endif
                </td>
            </tr>
            
            <tr>
                <th>description:</th>
                <td>{{ $product->description }}</td>
            </tr>
            <tr>
                <th>Trạng thái:</th>
                <td>
                    @if($product->status)
                        <span class="badge bg-success">Hoạt động</span>
                    @else
                        <span class="badge bg-danger">Tạm dừng</span>
                    @endif
                </td>
            </tr>
        </table>
        <a href="{{ route('products.index') }}" class="btn btn-primary">Quay lại</a>
    </div>
@endsection
