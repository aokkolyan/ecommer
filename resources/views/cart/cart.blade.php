<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="{{ asset('home/images/favicon.png') }}" type="">
    <title>Home Page</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.css') }}" />
    <!-- font awesome style -->
    <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />

</head>

<body>
    @include('home.header');

 <div class="center">
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:50%">Image</th>
                <th style="width:50%">Product name</th>
                <th style="width:10%">Price</th>
                <th style="width:8%">Quantity</th>
                <th style="width:10%">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php  $total = 0; ?>
           @foreach ($cart as $carts)
           @php $total += $carts['price'] * $carts['quantity'] @endphp  
           <tr data-id="">
            <td data-th="Product">
                <div class="row">
                    <div class="col-sm-3 hidden-xs"><img src="{{ asset('storage/'.$carts->image) }}" width="100" height="100"class="img-responsive" /></div>
                </div>
            </td>
            <td data-th="product_title">{{ $carts->product_title }}</td>
            <td data-th="price">
                {{ $carts->price }}
            </td>
            <td data-th="quantity">
                <input type="number" value="{{ $carts['quantity'] }}" class="form-control " />
            <td class="actions" data-th="">
                <a href="{{ route('remove.cart',$carts->id) }}" onclick=" return confirm ('Are you to delete?')"  class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></a>
                
            </td>
        </tr>
           @endforeach

        </tbody>
        <tfoot>
            <tr>
                <tr>
                    <td colspan="5" class="text-right"><h3><strong>Total ${{ $total }}</strong></h3></td>
                </tr>
            </tr>
            <tr>
                <td colspan="5" class="text-right">
                    <a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue
                        Shopping</a>
                    <a href="{{ route('cash.order') }}" class="btn btn-success"><i class="fa fa-solid fa-truck ">Cash on Delivery</a></i>
                    <a href="{{ route('stripe',$total) }}" class="btn btn-success text-white p-2">Pay Using cart</a>
                </td>
            </tr>
        </tfoot>
    </table>

 </div>

    @section('scripts')
        <script type="text/javascript">
            $(".update-cart").change(function(e) {
                e.preventDefault();

                var ele = $(this);

                $.ajax({
                    url: ,
                    method: "patch",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id"),
                        quantity: ele.parents("tr").find(".quantity").val()
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            });
            $(".remove-from-cart").click(function (e) {
                e.preventDefault();
          
                var ele = $(this);
          
                if(confirm("Are you sure want to remove?")) {
                    $.ajax({
                        url: '',
                        method: "DELETE",
                        data: {
                            _token: '{{ csrf_token() }}', 
                            id: ele.parents("tr").attr("data-id")
                        },
                        success: function (response) {
                            window.location.reload();
                        }
                    });
                }
            });
           
        </script>
    @endsection



    @include('home.footer')
    <!-- jQery -->
    <script src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
    <!-- popper js -->
    <script src="{{ asset('home/js/popper.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('home/js/bootstrap.js') }}"></script>
    <!-- custom js -->
    <script src="{{ asset('home/js/custom.js') }}"></script>
</body>

</html>
