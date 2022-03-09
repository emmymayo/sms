

    <x-header title="Manage Products - List " >
         <!-- DataTables -->
        <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    </x-header>
   
            
            <x-nav-header />
            <x-sidebar-nav   />
            <x-sidebar-control />
           

            
            <div class="content-wrapper" style="min-height: 264px;">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manage Products</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item "><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="/product-management">Manage Products</a></li>
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
                <div class="float-right px-4 py-2"><a href="/product-management/create" class="btn btn-primary"> Add Product </a></div>
              </div>
              <div class="card-body">
                  <div class="tab-pane fade active show" id="section_list" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                        <table class="table table-hover small table-responsive-md" id="section_list_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Price </th>
                                    <th>...</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>
                                        <div class="btn-group">
                                        <button type="button" class="btn btn-success" ><i class="fas fa-stream"></i> </button>
                                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu" >
                                        
                                        <a href="/product-management/{{$product->id}}/edit" class="dropdown-item"><i class="fas fa-edit"></i> Edit</a>
                                        <a href="/product-management/{{$product->id}}" class="dropdown-item"><i class="fas fa-edit"></i> View</a>
                                        <div class="dropdown-divider"></div>
                                        <form action="/product-management/{{$product->id}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this record?');">
                                                @csrf 
                                                @method('DELETE')
                                              
                                                <button class="dropdown-item text-danger" type="submit"><i class="fas fa-trash "></i> Delete</button>
                                        </form>
                                        
                                        </div>
                                        </div>
                                    </td>
                                   
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                  </div>
                  
                  
                </div>
              </div>
              <!-- /.card -->
            </div>
                
                   
                    
                </div><!-- /.container-fluid -->
                </div>
                <!-- /.content -->
            </div>
        
            <x-footer motto="" >
            <script src="/plugins/datatables/jquery.dataTables.min.js"></script>
            <script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
            <script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
            <script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
            <script src="/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
            <script src="/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
            <script src="/plugins/jszip/jszip.min.js"></script>
            <script src="/plugins/pdfmake/pdfmake.min.js"></script>
            <script src="/plugins/pdfmake/vfs_fonts.js"></script>
            <script src="/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
            <script src="/plugins/datatables-buttons/js/buttons.print.min.js"></script>
            <script src="/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
            </x-footer>
        </div>
   