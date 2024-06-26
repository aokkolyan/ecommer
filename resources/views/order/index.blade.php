<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @include('admin.script');
    <style>
        .div_center {
            text-align: center;
            padding-top: 40px;
        }
       
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.menu-header');

        <div class="card-body">
            <h4 class="card-title">Inverse table</h4>
            <p class="card-description">List order</p>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <ul class="navbar-nav w-50">
            <li class="nav-item w-100">
              <form  action="{{ route('search.order') }}" method="get" class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                <input type="text" value=" {{  isset($search) ? $search : '' }}" class="form-control text-white" name="search" placeholder="Search products" >
                <button type="submit" class="btn btn-sm btn-primary">search</button>
              </form>
            </li>
          </ul>
            <div class="table-responsive">
                <table class="table table-dark text-white ">
                    <thead class="table-primary">
                        <tr  >
                            <th > # </th>
                            <th> Name </th>
                            <th>Email</th>  
                            <th>Phone</th>
                            <th>Title</th> 
                            <th>Qty</th> 
                            <th>Price</th>  
                            <th>Image</th>    
                            <th>Payment status</th>
                            <th>Delivery status</th>  
                            <th>Delivered</th>  
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>      
                     
                        @forelse ($order as $orders)
                   
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $orders->name }}</td>
                            <td>{{ $orders->email }}</td>
                            <td>{{ $orders->phone }}</td>
                            <td>{{ $orders->product_title }}</td>
                            <td>{{ $orders->quantity }}</td>
                            <td>{{ $orders->price }}</td>
                            <td> <img src="{{ asset('storage/'.$orders->image) }}" alt=""></td>
                            <td>
                               
                                @if ($orders->payment_status == "Cash on delivery")

                                <div class="badge badge-outline-warning">{{ $orders->payment_status }}</div>

                                @elseif  ($orders->payment_status == "Paid")   
                                <div class="badge badge-outline-success">{{ $orders->payment_status }}</div>
                                @else

                                @endif
        
                            </td>
                            <td>
                                @if ($orders->delivery_status == "delivered")

                                <div class="badge badge-outline-success">  {{ $orders->delivery_status }}</div>

                                @elseif ($orders->delivery_status == "Process delivery")

                                <div class="badge badge-outline-warning">{{ $orders->delivery_status }}</div>

                                @else                           
                                @endif  
                            </td>
                            <td>
                                @if ($orders->delivery_status == "Process delivery")

                                <a href="{{ route('delivery.update',$orders->id) }}" class="btn btn-sm btn-primary">Delivered</a>

                                @else

                                <p>Delivered</p>

                                @endif
                              
                            </td>
                            <td>
                                <a href="{{ route('printPdf',$orders->id) }}" class="badge badge-outline-danger">PDF</a>
                            </td>

                        </tr>

                        @empty
                        <tr>
                            <td colspan="16">Data Not found !!</td>
                        </tr>



                        @endforelse
                     
                    </tbody>
                </table>
            </div>
        </div>
      






        <!-- partial -->
        @include('admin.menu-top');
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
</body>

</html>
