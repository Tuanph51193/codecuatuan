@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Danh sách sản phẩm</h2>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Thêm mới</a>
        <table class="table" border="1">
            <form method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Tìm kiếm..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-outline-secondary">Tìm kiếm</button>
                </div>
            </form>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Hình ảnh</th>
                    <th>Danh mục</th>
                    <th>Description</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $product->image) }}" width="150">

                        </td>
                        

                        <td>{{ $product->category_name ?? 'Chưa có danh mục' }}</td>
                        <td>{{ $product->description }}</td>
                        <td>
                            <span class="badge {{ $product->status ? 'bg-success' : 'bg-secondary' }}">
                                {{ $product->status ? 'Hoạt động' : 'Tạm dừng' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary">Sửa</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick=" return confirm('Bạn chắc chứ')">Xóa</button>
                            </form>

                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-info">Xem</a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
    </div>
@endsection
