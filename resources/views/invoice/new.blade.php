@extends('layout')
@section('encabezado','Nueva Factura')
@section('title','Nueva Factura' )
@section('content')
<div class="card">
    <div class="card-body">
        <form action="" method="POST" id="form">
            @csrf
            <div class="row">
            <div class="col-sm-3"><b>Producto</b></div>
            <div class="col-sm-3"><b>Cantidad</b></div>
            <div class="col-sm-3"><b>Precio</b></div>
            <div class="col-sm-3"><b>Total Producto</b></div>
            </div>
            <div class="row">
                <div class="col-sm-3">
            <select name="product[]" id="product1" class="form-select product" data-row='1'>
            <option disabled selected></option>

            @foreach($products as $product)
                <option value="{{$product->id}}">{{$product->name}}</option>
                @endforeach
            </select>
                </div>
    
            <div class="col-sm-3">
                <input type="number" id="quantity1" name="quantity[]"  min='1'  value='1' class="form-control quantity">    
            </div>
            <div class="col-sm-3">
                <input type="number" id="price1" name="price[]" class="form-control price">    
            </div>
            <div class="col-sm-3">
                <input type="text" readonly id="totalProduct1"  class="form-control-plaintext totalProduct">    
            </div>
            </div>
        </form>
        
    </div>
    <br/>
    <button type="button" class="btn btn-primary" id="add">Añadir</button>

</div>

@endsection
@section('scripts')
<script>
    const products= @json($products);
    var contador=1;
    let productList = document.querySelector('.product');
    let priceElement = document.querySelector('.price');
    const quantityElement = document.querySelector('.quantity');

    function init(){
        contador=1
        arrProductList = document.querySelectorAll('.product');

        arrProductList.forEach(productList=>{           
        priceElement = document.querySelector('#price'+contador);
        productList.addEventListener('change',(event)=>{
        productId = event.target.value;
        productSelected = products.filter(product => product.id == productId)
        priceElement.value=productSelected[0].price;
        totalProduct();
        })
        contador++;
    })
    }   
    //init();
    function totalProduct(){
        totalElement = document.querySelector('.totalProduct')
        totalElement.value = priceElement.value * quantityElement.value;
    }
    priceElement.addEventListener('input', (event)=>{
        totalProduct();
    })
    quantityElement.addEventListener('input', (event)=>{
        totalProduct();
    })
    
    const addButton = document.querySelector('#add')
    addButton.addEventListener('click',(event)=>{
        fila = document.createElement('div');
        fila.className = 'row';
        
        fila.innerHTML = `
            
                <div class="col-sm-3">
            <select name="product[]" id="product${contador}" class="form-select product">
            <option disabled selected></option>

            @foreach($products as $product)
                <option value="{{$product->id}}">{{$product->name}}</option>
                @endforeach
            </select>
                </div>
    
            <div class="col-sm-3">
                <input type="number" id="quantity${contador}"  name="quantity[]"  min='1' max='' value='1' class="form-control quantity">    
            </div>
            <div class="col-sm-3">
                <input type="number" id="price${contador}" name="price[]" class="form-control price">    
            </div>
            <div class="col-sm-3">
                <input type="text" id="totalProduct${contador}" readonly class="form-control-plaintext totalProduct">    
            </div>
            `;

            form = document.querySelector('#form');
            form.appendChild(fila);
            init();
    })
    init();
</script>
@endsection