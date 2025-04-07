@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trang chủ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        .table th, .table td {
            vertical-align: middle;
            text-align: center;
        }
        .product-image {
            max-height: 150px;
            object-fit: cover;
            border-radius: 8px;
        }
        .product-name {
            font-size: 16px;
            font-weight: 500;
            color: #333;
            margin-bottom: 5px;
        }
        .product-price {
            font-size: 16px;
            font-weight: bold;
            color: #e74c3c;
        }
        .original-price {
            font-size: 14px;
            color: #999;
            text-decoration: line-through;
            margin-left: 5px;
        }
        .discount {
            font-size: 14px;
            color: #e74c3c;
            margin-left: 5px;
        }
        .rating {
            color: #f1c40f;
            font-size: 14px;
        }
        .badge-shipping {
            font-size: 12px;
            color: #27ae60;
            margin-top: 5px;
        }
        .category {
            font-size: 14px;
            color: #666;
        }
        .table-responsive {
            overflow-x: auto;
        }
        /* Custom Button Styles */
        .custom-btn {
            padding: 12px 24px;
            font-size: 16px;
            font-weight: 500;
            border-radius: 25px;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .custom-btn-primary {
            background-color: #e74c3c; /* Red color inspired by the image */
            border: none;
            color: white;
        }
        .custom-btn-primary:hover {
            background-color: #c0392b;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transform: translateY(-2px);
        }
        .custom-btn-secondary {
            background-color: #f39c12; /* Orange color inspired by the image */
            border: none;
            color: white;
        }
        .custom-btn-secondary:hover {
            background-color: #d35400;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transform: translateY(-2px);
        }
        .btn-container {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container text-center mt-5">
        <h1 class="text-primary">Xin chào đây là trang chủ</h1>
        <p class="lead">Bạn phải đăng nhập để mua hàng</p>
        <div class="btn-container">
            <a href="/login" class="btn custom-btn custom-btn-primary">Đăng nhập</a>
            <a href="/register" class="btn custom-btn custom-btn-secondary">Đăng ký</a>
        </div>
    </div>

    <h2 class="text-center text-primary mt-4">Danh sách sản phẩm</h2>



    <div class="container mt-4">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Danh mục</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>
                                <a href="/login">
                                    <img src="{{ asset('storage/' . $product->image) }}" class="product-image" alt="{{ $product->name }}">
                                </a>
                            </td>
                            <td>
                                <div class="product-name">{{ $product->name }}</div>
                               
                            </td>
                            <td>
                                <div class="product-price">
                                    {{ number_format($product->price) }} VNĐ
                                   
                                </div>
                            </td>
                            <td class="category">
                                {{ $product->category->name ?? 'Không có danh mục' }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $products->links() }}
        </div>
    </div>
</body>

</html>