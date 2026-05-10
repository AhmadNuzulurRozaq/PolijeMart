<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $product = Barang::all();
        return view('customer.index', compact(['product']));
    }

    public function detailProduct($id){

        $product = Barang::findOrFail($id);
        $kategori = Kategori::get();
        return view('customer.detail', compact('product'));
    }

    public function manageProduct(){
        return view('customer.manage');
    }

    public function cartProduct(){
        return view('customer.cart');
    }

    public function checkoutProduct($id){
        $product = Barang::findOrFail($id);
        return view('customer.checkout', compact('product'));
    }
}
