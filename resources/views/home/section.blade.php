<section class="subscribe_section">
    <div class="container-fuild">
        <div class="box">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="subscribe_form ">
                        <div class="heading_container heading_center">
                            <h3>Subscribe To Get Discount Offers</h3>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
                        <form action="">
                            <input type="email" placeholder="Enter your email">
                            <button>
                                subscribe
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end subscribe section -->
<!-- client section -->
<section class="client_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Customer's Testimonial
            </h2>
        </div>
        <div id="carouselExample3Controls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="box col-lg-10 mx-auto">
                        <div class="img_container">
                            <div class="img-box">
                                <div class="img_box-inner">
                                    <img src="images/client.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="detail-box">
                            <h5>
                                Anna Trevor
                            </h5>
                            <h6>
                                Customer
                            </h6>
                            <p>
                                Dignissimos reprehenderit repellendus nobis error quibusdam? Atque animi sint unde quis
                                reprehenderit, et, perspiciatis, debitis totam est deserunt eius officiis ipsum ducimus
                                ad labore modi voluptatibus accusantium sapiente nam! Quaerat.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="box col-lg-10 mx-auto">
                        <div class="img_container">
                            <div class="img-box">
                                <div class="img_box-inner">
                                    <img src="images/client.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="detail-box">
                            <h5>
                                Anna Trevor
                            </h5>
                            <h6>
                                Customer
                            </h6>
                            <p>
                                Dignissimos reprehenderit repellendus nobis error quibusdam? Atque animi sint unde quis
                                reprehenderit, et, perspiciatis, debitis totam est deserunt eius officiis ipsum ducimus
                                ad labore modi voluptatibus accusantium sapiente nam! Quaerat.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="box col-lg-10 mx-auto">
                        <div class="img_container">
                            <div class="img-box">
                                <div class="img_box-inner">
                                    <img src="images/client.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="detail-box">
                            <h5>
                                Anna Trevor
                            </h5>
                            <h6>
                                Customer
                            </h6>
                            <p>
                                Dignissimos reprehenderit repellendus nobis error quibusdam? Atque animi sint unde quis
                                reprehenderit, et, perspiciatis, debitis totam est deserunt eius officiis ipsum ducimus
                                ad labore modi voluptatibus accusantium sapiente nam! Quaerat.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel_btn_box">
                <a class="carousel-control-prev" href="#carouselExample3Controls" role="button" data-slide="prev">
                    <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExample3Controls" role="button" data-slide="next">
                    <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>
        <div class="mb-3 " style="text-align: center">
            <form action="{{ route('comment.store') }}" method="POST">
                @csrf
                <h3>Comment</h3>
                <textarea class="form-control" name="comment" rows="3" placeholder="Comment this here"></textarea>
               <i class="mdi mdi-code-greater-than"><input type="submit" class="btn btn-primary mt-2" value="Comment"></i> 
            </form>
        </div>
        <h5>All comment</h5>
        @foreach ($comment as $comments)
            <div class="mb-3">
                <h6>{{ $comments->name }}</h6>
                <p>{{ $comments->comment }}</p>
                <a href="javascript::void(0)" onclick="reply(this)" data-Commentid="{{ $comments->id }}" style="color: blue">Reply</a>

                @foreach ($reply as $replys)
                    @if ($replys->comment_id == $comments->id)
                        <div style="padding-left: 3%; padding-botton:10px; ">
                            <p>{{ $replys->name }}</p>
                            <p>{{ $replys->reply }} </p>
                            <a href="javascript::void(0)" onclick="reply(this)" data-Commentid="{{ $comments->id }}" style="color: blue">Reply</a>
                        </div>
                    @endif
                @endforeach
        @endforeach
    </div>
    <div class="reply" style="display:none">
        <form action="{{ url('/reply') }}" method="POST">
            @csrf
            <input type="hidden" name="commentId" id="commentId">
            <textarea class="form-control" name="reply" style="width: 500px" placeholder="reply this here..."></textarea>
            <button type="submit" class="btn btn-primary p-2"  style="float:left; margin:2px;">Reply</button>
            <a href="javascript::void(0)" class=" btn btn-danger" onclick="reply_close(this)" style="margin-top: 3px;margin-left:25px;">Close</a>
           
           
        </form>
    </div>

    </div>
</section>



<script>
    function reply(event) {
        document.getElementById('commentId').value = $(event).attr('data-Commentid');
        $('.reply').insertAfter($(event));
        $('.reply').show();
    }
    function reply_close(event){
      $('.reply').hide();
    }
    <script>
        document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
            
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>
</script>
