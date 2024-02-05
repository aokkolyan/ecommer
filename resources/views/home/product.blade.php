<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>
            </h2>
        </div>

        <div class="row">
            @foreach ($product as $pro)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="{{ url('product_details',$pro->id) }}" class="option1">
                                   Product Details
                                </a>
                                <a href="" class="option2">
                                    Buy Now
                                </a>
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="{{ asset('storage/' . $pro->image) }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h6>
                                {{ $pro->title }}
                            </h6>
                            @if ($pro->discount_price !=null)
                          
                            <h5  style="color: red">
                              {{ $pro->discount_price }}
                            </h5>
                            <h5 style="text-decoration: line-through;color:blue">
                              price
                              $ {{ $pro->price }}
                            </h5>
                            @else
                           
                            <h6>
                              $ {{ $pro->price }}
                            </h6>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

</section>
