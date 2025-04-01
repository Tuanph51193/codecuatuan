<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductsRequest;
use App\Models\Product;
use App\Models\Category;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $query = DB::table('products')
        //     ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
        //     ->select('products.*', 'categories.name as category_name')
        //     ->orderBy('products.id', 'desc');

        // if ($request->has('search')) {
        //     $query->where('products.name', 'like', '%' . $request->search . '%');
        // }

        // $products = $query->paginate(5);
        // return view('products.index', compact('products'));
        $query=Product::with('category'); // quan hệ quan hệ 1 1 tự lấy dữ liệu của nhau
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        $products=$query->orderBy('id','desc')->paginate(5);
        return view('products.index', compact('products'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::query()->where('status',1)->get();// lấy danh sách danh mục
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(ProductsRequest $request)
    {
        // $category = DB::table('categories')->where('id', $request->category_id)->first();
        // if ($category->status == 0) {
        //     return redirect()->back()->with('error', 'Danh mục này đang tạm dừng, không thể thêm sản phẩm!');
        // }
        // $imageName = null;
        // // Kiểm tra nếu có file hình ảnh được tải lên
        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $imageName = time() . '.' . $image->getClientOriginalExtension();
        //     $image->move(public_path('uploads'), $imageName);
        // }
        // DB::table('products')->insert([
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'price' => $request->price,
        //     'quantity' => $request->quantity,
        //     'image' => $imageName,
        //     'category_id' => $request->category_id,
        //     'status' => (bool)$request->status,
        //     'created_at' => now(),
        //     'updated_at' => now(),


        // ]);

        // return redirect()->route('products.index')->with('success', 'Thêm mới sản phẩm thành công');

        $data =$request->validated();
        if($request->hasFile('image')){
            $data['image']= $request->file('image')->store('uploads','public');
        }
        Product::create($data);
        return redirect()->route('products.index')->with('success', 'Thêm mới sản phẩm thành công');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // $product = DB::table('products')->where('id', $id)->first();


        // return view('products.show', compact('product'));
        $product = Product::query()->where('id', $id)->first();


        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        // $product = DB::table('products')->where('id', $id)->first();
        // $categories = DB::table('categories')->get();

        // //trả dữ liệu cần chỉnh sửa về view
        // return view('products.edit', compact('product', 'categories'));
        $categories =Category::query()->where('status',1)->get();
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductsRequest $request,  Product $product)
    {
        // $product = DB::table('products')->where('id', $id)->first();


        // // Kiểm tra nếu có file hình ảnh mới được tải lên
        // if ($request->hasFile('image')) {
        //     // Xóa ảnh cũ (nếu có)
        //     if ($product->image && file_exists(public_path('uploads/' . $product->image))) {
        //         unlink(public_path('uploads/' . $product->image));
        //     }

        //     // Lưu ảnh mới
        //     $image = $request->file('image');
        //     $imageName = time() . '.' . $image->getClientOriginalExtension();
        //     $image->move(public_path('uploads'), $imageName);
        // } else {
        //     $imageName = $product->image; // Giữ nguyên ảnh cũ nếu không có ảnh mới
        // }

        // // Cập nhật sản phẩm
        // DB::table('products')->where('id', $id)->update([
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'price' => $request->price,
        //     'quantity' => $request->quantity,
        //     'image' => $imageName,
        //     'category_id' => $request->category_id,
        //     'status' => (bool)$request->status,
        //     'updated_at' => now(),
        // ]);

        // return redirect()->route('products.index')->with('success', 'Cập nhật sản phẩm thành công!');

        //eloquent
        $data =$request->validated();
        if($request->hasFile('image')){
            $data['image']=$request->file('image')->store('products','public');
        }
        $product->update($data);
        return redirect()->route('products.index')->with('success', 'Cập nhật sản phẩm thành công!');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // DB::table('products')->where('id', $id)->delete();
        // return redirect()->route('products.index')->with('success', 'Xóa danh mục thành công');
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Xóa sản phẩm thành công');
    }
}
