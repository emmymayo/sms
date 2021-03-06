

    <x-header title="Products - {{$product->name}}" >
       
       </x-header>
       
               
               <x-nav-header />
               <x-sidebar-nav  />
               <x-sidebar-control />
              
   
               
               <div class="content-wrapper" style="min-height: 264px;">
                   <!-- Content Header (Page header) -->
                   <div class="content-header">
                   <div class="container-fluid">
                       <div class="row mb-2">
                       <div class="col-sm-6">
                           <h1 class="m-0">{{$product->name}}</h1>
                       </div><!-- /.col -->
                       <div class="col-sm-6">
                           <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="/">Home</a></li>
                           <li class="breadcrumb-item "><a href="/dashboard">Dashboard</a></li>
                           <li class="breadcrumb-item "><a href="/products">Products</a></li>
                           <li class="breadcrumb-item active"><a href="/products/{{$product->id}}">{{$product->name}}</a></li>
                           </ol>
                       </div><!-- /.col -->
                       </div><!-- /.row -->
                       
                   </div><!-- /.container-fluid -->
                   </div>
                   <!-- /.content-header -->
   
                   <!-- Main content -->
                   <div class="content">
                   <div class="container-fluid">
                   
                       
                  
                   
                   <!--Products -->

                   <div class="">
                   <div class=" card my-2 p-3">
                        <p>{{$product->name}}</p>
                        <span>{{$product->price}}</span>
                        <form method="POST" action="/service-payment/confirm">
                            @csrf
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <label>Qty:</label> <input type="number" name="quantity" id="quantity" value="1" /> <br>
                            <label for="">Amount</label> 
                            <input type="{{$product->price_type == \App\Models\Product::PRICE_FIXED ? 'hidden' : 'number'}}"  name="subtotal" id="subtotal" value="{{$product->price}}">
                            <button type="submit">Proceed to Payment</button>
                        </form>
                       
                        <p>{{$product->description}}</p>
                   </div>
                       
                   
                   
                   </div>
                   
                    
                      
                       
                   </div><!-- /.container-fluid -->
                   </div>
                   <!-- /.content -->
               </div>
           
               <x-footer motto="" >
                 
               </x-footer>
           
     