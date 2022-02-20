

    <x-header title="Products" >
       
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
                           <h1 class="m-0">Products</h1>
                       </div><!-- /.col -->
                       <div class="col-sm-6">
                           <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="/">Home</a></li>
                           <li class="breadcrumb-item "><a href="/dashboard">Dashboard</a></li>
                           <li class="breadcrumb-item active"><a href="/products">Products</a></li>
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
                    @if($products->count()==0)
                        <p>No Products available. </p>
                    @endif
                   @foreach ($products as $product)
                   <div class=" card my-2 p-3">
                        <a href="/products/{{$product->id}}">
                            <h3 class="lead text-info">
                            <i class="fas fa-bullhorn"></i> {{$product->name}}
                            </h3>
                        </a>
                        <span>{{$product->price}}</span>
                   </div>
                       
                   @endforeach
                   
                   </div>
                   
                    
                      
                       
                   </div><!-- /.container-fluid -->
                   </div>
                   <!-- /.content -->
               </div>
           
               <x-footer motto="" >
                 
               </x-footer>
           
     