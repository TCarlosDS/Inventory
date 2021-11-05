<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Product;

class InvoiceController extends Controller
{
    function show(){
        $invoices = Invoice::all();
        return view('invoice.list',['invoices'=>$invoices]);
    }
    function new(){
        $products = Product::all();
        return view('invoice.new',['products'=>$products]);
    }
}
