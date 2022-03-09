<x-header title="Manage Products - Edit">
</x-header>


<x-nav-header />
<x-sidebar-nav />
<x-sidebar-control />



<div class="content-wrapper" style="min-height: 264px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item "><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="/product-management/{$product->id}/edit">Edit Product</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">


            @empty(!session('action-success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Done!</h5>
                {{session('action-success')}}
            </div>
            @endempty

            @empty(!session('action-failed'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-info"></i> Failed!</h5>
                {{session('action-failed')}}
            </div>
            @endempty

        


            <div class="card card-default card-tabs">
                <div class="card-header p-0 pt-1">
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                        <p class="text-danger p-4">{{$error}}</p>
                        @endforeach
                    @endif
                </div>
                <div class="card-body">
                  
                  <form method="POST" action="/product-management/{{$product->id}}" class="">
                  @csrf
                  @method('PUT')

                        <div class="form-group">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" value="{{$product->name}}" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description">Description </label>
                            <textarea name="description" id="description" value="{{$product->description}}" cols="30" rows="10" class="form-control">{{$product->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="price_type">Price Type <span class="text-danger"></span></label>
                            <select name="price_type" id="price_type" class="form-control" onchange="togglePriceField(this)">
                                @foreach($price_types as $key => $value)
                                <option {{$product->price_type == $key ? 'selected' : ''}} value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group" id="price-input-wrapper">
                            <label for="price">Price  <span class="text-danger"></span></label>
                            <input type="number" step="0.01" class="form-control" value="{{$product->price}}"   name="price" id="price" />
                        </div>

                        <div class="form-group">
                            <label for="price_type">Product Type <span class="text-danger"></span></label>
                            <select name="product_type" id="product_type" class="form-control">
                                @foreach($product_types as $key => $value)
                                <option {{$product->product_type == $key ? 'selected' : ''}} value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success" type="submit"> Update </button>
                        </div>


                       
                  </form>


                </div>
            </div>
            <!-- /.card -->
        </div>



    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
<script>

    initPriceField({{$product->price_type}});
    function initPriceField(value){
        let variablePriceKey = {{$variable_price_key}};
        let price_wrapper = document.querySelector("#price-input-wrapper");
        if(value == variablePriceKey){
            price_wrapper.style.display = "none";
        }
        else{
            price_wrapper.style.display = "block";
        }
    }
    function togglePriceField(el){
        let variablePriceKey = {{$variable_price_key}};
        let price_wrapper = document.querySelector("#price-input-wrapper");
        if(el.value == variablePriceKey){
            price_wrapper.style.display = "none";
        }
        else{
            price_wrapper.style.display = "block";
        }
    }

    



</script>
<x-footer motto="">

</x-footer>
</div>