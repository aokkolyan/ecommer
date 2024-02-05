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
      <style>
        body {
         
            font-family: Arial, Helvetica, sans-serif
        }
        
        .container {
          
            border: none;
            border-radius: none
        }
        
        .abc {
            padding-left: 40px
        }
        
        .pqr {
            padding-right: 70px;
            padding-top: 14px
        }
        
        .para {
            float: right;
            margin-right: 0;
            padding-left: 80%;
            top: 0
        }
        
        .fa-star {
            color: yellow
        }
        
        li {
            list-style: none;
            line-height: 50px;
            color: #000
        }
        
        .col-md-2 {
            padding-bottom: 20px;
            font-weight: bold
        }
        
        .col-md-2 a {
            text-decoration: none;
            color: #000
        }
        
        .col-md-2.mio {
            font-size: 12px;
            padding-top: 7px
        }
        
        .des::after {
            content: '.';
            font-size: 0;
            display: block;
            border-radius: 20px;
            height: 6px;
            width: 55%;
            background: yellow;
            margin: 14px 0
        }
        
        .r4 {
            padding-left: 25px
        }
        
        .btn-outline-warning {
            border-radius: 0;
           
            color: #000;
            font-size: 12px;
            font-weight: bold;
            width: 70%
        }
        
        @media screen and (max-width: 620px) {
            .container {
                width: 98%;
                display: flex;
                flex-flow: column;
                text-align: center
            }
        
            .des::after {
                content: '.';
                font-size: 0;
                display: block;
                border-radius: 20px;
                height: 6px;
                width: 35%;
           
                margin: 10px auto
            }
        
            .pqr {
                text-align: center;
                margin: 0 30px
            }
        
            .para {
                text-align: center;
                padding-left: 90px;
                padding-top: 10px
            }
        
            .klo {
                display: flex;
                text-align: center;
                margin: 0 auto;
                margin-right: 40px
            }
        }
      </style>
   </head>
   <body>
     @include('home.header');

     
     <div class="container py-4 my-4 mx-auto d-flex flex-column">
        <div class="card-header">
            <div class="row r1">
                <div class="col-md-9 abc">
                    <h1>Product category:{{ $product->category }}</h1>
                </div>
                <div class="col-md-3 text-right pqr"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
                <p class="text-right para">Based on 250 Review</p>
            </div>
      
        <div class="card mt-4">
            <div class="card-header">
              <div class="row r3">
                <div class="col-md-5 p-0 klo">
                    <ul>
                        <li>Name:{{ $product->title }}</li>
                        <li>Free Shipping</li>
                        <li>Easy Returns</li>
                        <li>Product Price:$ {{ $product->price }}</li>
                        <li>Product Discount${{ $product->discount_price }}</li>
                        <li>Available in Stock:{{ $product->quatity }}</li>
                        <li>Description:</li><p>{{ $product->decription }}</p>
                    </ul>
                </div>
                <div class="col-md-7"> <img src="{{ asset('storage/'.$product->image) }}" width="90%" height="90%"> </div>
            </div>
            <div class="footer d-flex flex-column mt-5">
                <div class="row r4">
                    <div class="col-md-2 mio offset-md-4"><a href="#" class="btn btn-outline-success">ADD TO CART</a></div>
                    <div class="col-md-2 myt "><button type="button" class="btn btn-outline-warning"><a href="#">BUY NOW</a></button></div>
                </div>
            </div>
            
            </div>
        </div>
    </div>
    </div>
      <!-- footer start -->
      @include('home.footer');
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