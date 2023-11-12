<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductRequest;
use App\Http\Requests\AddSaleRequest;
use App\Models\Category;
use App\Models\DailySale;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class ProductController extends Controller
{
    public function add()
    {
        try {
            return view('admin.product.add');
        } catch (\Throwable $th) {
            return redirect(route('dashboard'))->with(['status' => false, 'message' => 'Something went wrong']);
        }
    }
    public function store(AddProductRequest $request)
    {
        try {

            DB::beginTransaction();
            $avatarName = null;
            if ($request->hasFile('avatar')) {
                $avatar = $request->file('avatar');
                $avatarName = time() . '_' . $avatar->getClientOriginalName();
                $avatar->storeAs('images/products', $avatarName);
            }
            Product::create([
                'name' => $request->name,
                'quantity' => $request->quantity,
                'price_per_unit' => $request->pricePerUnit,
                'picture' => $avatarName,
            ]);
            DB::commit();
            return response()->json(['status' => true, 'message' => 'Product added successfully']);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => 'Something went wrong']);
        }
    }
    public function list()
    {
        try {
            $products = Product::all();
            return view('admin.product.list', compact('products'));
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }
    public function salePage($id)
    {
        try {
            $product = Product::findorfail($id);
            return view('admin.product.sale', compact('product'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function sale(AddSaleRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $product = Product::findorfail($id);

            $product->update([
                'id' => $product->id,
                'quantity' => $product->quantity - $request->quantity,
            ]);
            DailySale::create([
                'customer_name' => $request->name,
                'quantity' => $request->quantity,
                'date' => $request->date,
                'product_id' => $id,
            ]);
            DB::commit();
            return response()->json(['status' => true, 'message' => 'Stock Updated Successfully']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => 'Something went wrong']);
        }
    }
    public function saleHistory()
    {
        try {
            $sales = DailySale::orderBy('date', 'desc')->get();
            return view('admin.product.saleHistory', compact('sales'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
