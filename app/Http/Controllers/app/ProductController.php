<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Models\app\ProCate;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\app\Product;
use App\Models\app\ProDetails;

class ProductController extends Controller
{
    public function index()
    {
        $pro = DB::select('SELECT p.id, p.name, p.photo, c.name AS cate, p.price, (SUM(pd.add) - SUM(pd.sale)) AS qty FROM products p LEFT JOIN pro_cates c ON p.cate = c.id LEFT JOIN pro_details pd ON p.id = pd.pro_id GROUP BY p.id, p.name, p.photo, c.name, p.price');
        $cate = ProCate::all();
        return view(
            "product.index",
            [
                'pro' => $pro,
                'cate' => $cate
            ]
        );
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //upload the image
        $imgPath = null;
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imgPath = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/product'), $imgPath);
        }

        //create a new product
        Product::create([
            'name' => $request->name,
            'photo' => $imgPath,
            'cate' => $request->cate,
            'price' => $request->price,
        ]);

        return redirect()->route('pro.index');
    }

    // for add qty
    public function add(string $id)
    {
        $add = DB::select('SELECT p.id, p.name, p.photo, (SUM(pd.add) - SUM(pd.sale)) AS qty FROM products p LEFT JOIN pro_details pd ON p.id = pd.pro_id WHERE p.id = ? GROUP BY p.id, p.name, p.photo', [$id]);
        return view('product.add', ['add' => $add]);
    }

    public function addto(Request $request, string $id)
    {
        ProDetails::create([
            'pro_id' => $id,
            'add' => $request->add,
            'add_price' => $request->price
        ]);
        return redirect()->route('pro.index');
    }


    public function show(string $id)
    {
        //
        $add = Product::find($id);
        return view('product.add', ['add' => $add]);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    // for soft delete
    public function destroy(string $id)
    {
        $pro = Product::find($id);
        $pro->update([
            'status' => '1'
        ]);
        return redirect()->route('pro.index');
    }
}
