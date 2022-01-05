@extends('layouts.shop_master' , ['page_name' => _('product_detail')])
@section('page_title' , $page_title)
@section('content')
{{-- <section id="aa-catg-head-banner">
   <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>T-Shirt</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>         
          <li><a href="#">Product</a></li>
          <li class="active">T-shirt</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section --> --}}

  <!-- product category -->
  <section id="aa-product-details">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="aa-product-details-area">
            <div class="aa-product-details-content">
              <div class="row">
                <!-- Modal view slider -->
                <div class="col-md-5 col-sm-5 col-xs-12">                              
                  <div class="aa-product-view-slider">                                
                    <div id="demo-1" class="simpleLens-gallery-container">
                      <div class="simpleLens-container">
                        <div class="simpleLens-big-image-container"><a data-lens-image="{{ asset('products/images/'.$products[0]->productimage->product_images) }}" class="simpleLens-lens-image"><img src="{{ asset('products/images/'.$products[0]->productimage->product_images) }}" class="simpleLens-big-image"></a></div>
                      </div>
                      <div class="simpleLens-thumbnails-container">
                          {{-- <a data-big-image="{{ asset('products/images/'.$products[0]->productimage->product_images) }}" data-lens-image="{{ asset('products/images/'.$products[0]->productimage->product_images) }}" class="simpleLens-thumbnail-wrapper" href="#">
                            <img src="{{ asset('products/images/'.$products[0]->productimage->product_images) }} " style="width:50px;">
                          </a> --}}

                          @foreach($products[0]->product_img as $value)
                          <a data-big-image="{{ asset('products/images/'.$value->product_images) }}" data-lens-image="{{ asset('products/images/'.$value->product_images) }}" class="simpleLens-thumbnail-wrapper" href="#">
                            <img src="{{ asset('products/images/'.$value->product_images) }} " style="width:50px;">
                          </a>
                          @endforeach 

                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal view content -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="aa-product-view-content">
                    <h3>{{ $products[0]->title }}</h3>
                    <div class="aa-price-block">
                      <p class="aa-product-avilability">Avilability: <span style="color:red">In stock</span></p>
                      @if($products[0]->lead_time != '')
                      <p style="color: red;margin-top: -13px;font-size: 12px; font-weight: bold;">Delivery of <span>{{ $products[0]->lead_time  }}</span></p>
                      @endif
                      @if($products[0]->brand != '')
                       <p style="color: lightgray;">Brand: <span ><a href="javascript:void(0)" style="color: #16849b !important;">{{ $products[0]->brand  }}</a></span></p>
                       @endif
                    </div>
                    <p></p>
                   
                    @if($products[0]->productattribute[0]->price != '')
                    <span class="aa-product-view-price">Rs. {{ $products[0]->productattribute[0]->price }}</span>
                    <span><del>Rs. {{ $products[0]->productattribute[0]->mrp }}</del></span>
                    @endif
                   
                    @if($products[0]->productattribute[0]->size_id > 0)
                    <h4>Size</h4>
                    @php
                    $arrsize=[];
                    foreach ($products[0]->productattribute as $prosize) {
                      $arrsize[]=$prosize->size->sizes;
                    }
                    
                     $arrsize=array_unique($arrsize);
                    @endphp
                    <div class="aa-prod-view-size">
                       @foreach($arrsize as $value)
                       @if($value != '')
                      <a href="javascript:void(0)" class="getcolorbysize" data-id={{ $value }}>{{ $value }}</a>
                       @endif
                      @endforeach
                      
                    </div>
                    @endif

                    @if($products[0]->productattribute[0]->color_id > 0)
                    <h4>Color</h4>
                    <div class="aa-color-tag">
                      @foreach($products[0]->productattribute as $value)
                       @if($value->color->name != '')
                      <a href="javascript:void(0)" data-id="{{ $value->color->name }}" class="aa-color-{{ $value->color->name }} size-{{ $value->size->sizes }} product_color"></a>                       
                      @endif
                      @endforeach                      
                    </div>
                    @endif
                   
                    <div class="aa-prod-quantity">
                      <form action="">
                        <select id="qty" name="qty">
                          @for($i=1; $i<11; $i++)
                          <option value="{{ $i }}">{{ $i }}</option>
                          @endfor
                        </select>
                      </form>
                      <p class="aa-prod-category">
                        Category: <a href="#">{{ $products[0]->category->name }}</a>
                      </p>
                    </div>
                    <div class="aa-prod-view-bottom">
                      <a class="aa-add-to-cart-btn add_to_cart_product" product-id="{{ $products[0]->id }}" color-id="{{ $products[0]->productattribute[0]->color_id }}" size-id="{{ $products[0]->productattribute[0]->size_id }}" href="javascript:void(0)">Add To Cart</a>
                      <div id="product_alert"></div>
                      {{-- <a class="aa-add-to-cart-btn" href="#">Wishlist</a>
                      <a class="aa-add-to-cart-btn" href="#">Compare</a> --}}
                    </div>
                  </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12" style="background: #fafafa;">
                  <h6 class="aa-product-delivery">Delivery Option</h6>
                  <div class="aa-product-delivery-truck">
                  <i class="fa fa-truck" style="font-size: 24px;color: #ccc;"></i>&nbsp; Home Delivery
                  <div class="row">
                  <div class="col-md-8 col-sm-8 col-xs-6">
                    @if($products[0]->lead_time != '')
                  <p style="padding-left: 28px;font-size: 14px;color: #999;">{{ $products[0]->lead_time}}</p>
                  @else
                  <p>N/A</p>
                  @endif
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-6">
                  <h6>Rs. N/A</h6>
                  </div>
                  </div>
                  </div>
                  <hr class="py-4">
                  <div class="aa-product-delivery-cash">
                  <i class="fa fa-money" style="font-size: 24px;color: #ccc;" aria-hidden="true"></i>&nbsp; Cash on Delivery Available
                  </div>
                </div>
              </div>
            </div>
            <div class="aa-product-details-bottom">
              <ul class="nav nav-tabs" id="myTab2">
                <li><a href="#description" data-toggle="tab">Description</a></li>
                <li><a href="#review" data-toggle="tab">Reviews</a></li>
                <li><a href="#Technical" data-toggle="tab">Technical Specification</a></li>
                <li><a href="#warranty" data-toggle="tab">Warranty</a></li>
                <li><a href="#uses" data-toggle="tab">Uses</a></li>

              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane fade in active" id="description">
                {{ $products[0]->description }}
                </div>
                <div class="tab-pane fade " id="review">
                 <div class="aa-product-review-area">
                   <h4>2 Reviews for T-Shirt</h4> 
                   <ul class="aa-review-nav">
                     <li>
                        <div class="media">
                          <div class="media-left">
                            <a href="#">
                              <img class="media-object" src="img/testimonial-img-3.jpg" alt="girl image">
                            </a>
                          </div>
                          <div class="media-body">
                            <h4 class="media-heading"><strong>Marla Jobs</strong> - <span>March 26, 2016</span></h4>
                            <div class="aa-product-rating">
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star-o"></span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="media">
                          <div class="media-left">
                            <a href="#">
                              <img class="media-object" src="img/testimonial-img-3.jpg" alt="girl image">
                            </a>
                          </div>
                          <div class="media-body">
                            <h4 class="media-heading"><strong>Marla Jobs</strong> - <span>March 26, 2016</span></h4>
                            <div class="aa-product-rating">
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star-o"></span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                          </div>
                        </div>
                      </li>
                   </ul>
                   <h4>Add a review</h4>
                   <div class="aa-your-rating">
                     <p>Your Rating</p>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                   </div>
                   <!-- review form -->
                   <form action="" class="aa-review-form">
                      <div class="form-group">
                        <label for="message">Your Review</label>
                        <textarea class="form-control" rows="3" id="message"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Name">
                      </div>  
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="example@gmail.com">
                      </div>

                      <button type="submit" class="btn btn-default aa-review-submit">Submit</button>
                   </form>
                 </div>
                </div>
                <div class="tab-pane fade" id="Technical">
                 {{ $products[0]->technical_specification }}
                </div>
                 <div class="tab-pane fade" id="warranty">
                 {{ $products[0]->warranty }}
                </div> 
                 <div class="tab-pane fade" id="uses">
                 {{ $products[0]->uses }}
                </div>             
              </div>
            </div>
            <form id="product_form">
            <input type="hidden" id="color_id" name="color_id">
           <input type="hidden" id="size_id" name="size_id">
           <input type="hidden" id="pqty" name="qty">
           <input type="hidden" id="product_id" name="product_id">
           @csrf
            </form>
            <!-- Related product -->
            <div class="aa-product-related-item">
              <h3>Related Products</h3>
              <ul class="aa-product-catg aa-related-item-slider">
                <!-- start single product item -->
                @foreach($products[0]->related_products as $key => $value)
                <li>
                  <figure>
                    <a class="aa-product-img" href="{{ url('/product/'.$value->title) }}"><img src="{{ asset('products/images/'.$value->productimage->product_images) }}" alt="polo shirt img" style="width: 250px; height: 300px;"></a>
                    <a class="aa-add-card-btn add_to_cart_product"href="javascript:void(0)"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                     <figcaption>
                      <h4 class="aa-product-title"><a href="#">{{ $value->title }}</a></h4>
                      <span class="aa-product-price">Rs. {{ $value->productattribute[0]->price }}</span><span class="aa-product-price"><del>Rs. {{ $value->productattribute[0]->mrp }}</del></span>
                    </figcaption>
                  </figure>                     
                  <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
                  </div>
                  <!-- product badge -->
                  <span class="aa-badge aa-sale" href="#">SALE!</span>
                </li>
                 @endforeach                                                                       
              </ul>
              {{-- <!-- quick view modal -->                  
              <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">                      
                    <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <div class="row">
                        <!-- Modal view slider -->
                        <div class="col-md-6 col-sm-6 col-xs-12">                              
                          <div class="aa-product-view-slider">                                
                            <div class="simpleLens-gallery-container" id="demo-1">
                              <div class="simpleLens-container">
                                  <div class="simpleLens-big-image-container">
                                      <a class="simpleLens-lens-image" data-lens-image="img/view-slider/large/polo-shirt-1.png">
                                          <img src="img/view-slider/medium/polo-shirt-1.png" class="simpleLens-big-image">
                                      </a>
                                  </div>
                              </div>
                              <div class="simpleLens-thumbnails-container">
                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="img/view-slider/large/polo-shirt-1.png"
                                     data-big-image="img/view-slider/medium/polo-shirt-1.png">
                                      <img src="img/view-slider/thumbnail/polo-shirt-1.png">
                                  </a>                                    
                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="img/view-slider/large/polo-shirt-3.png"
                                     data-big-image="img/view-slider/medium/polo-shirt-3.png">
                                      <img src="img/view-slider/thumbnail/polo-shirt-3.png">
                                  </a>

                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="img/view-slider/large/polo-shirt-4.png"
                                     data-big-image="img/view-slider/medium/polo-shirt-4.png">
                                      <img src="img/view-slider/thumbnail/polo-shirt-4.png">
                                  </a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Modal view content -->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="aa-product-view-content">
                            <h3>T-Shirt</h3>
                            <div class="aa-price-block">
                              <span class="aa-product-view-price">$34.99</span>
                              <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis animi, veritatis quae repudiandae quod nulla porro quidem, itaque quis quaerat!</p>
                            <h4>Size</h4>
                            <div class="aa-prod-view-size">
                              <a href="#">S</a>
                              <a href="#">M</a>
                              <a href="#">L</a>
                              <a href="#">XL</a>
                            </div>
                            <div class="aa-prod-quantity">
                              <form action="">
                                <select name="" id="">
                                  <option value="0" selected="1">1</option>
                                  <option value="1">2</option>
                                  <option value="2">3</option>
                                  <option value="3">4</option>
                                  <option value="4">5</option>
                                  <option value="5">6</option>
                                </select>
                              </form>
                              <p class="aa-prod-category">
                                Category: <a href="#">Polo T-Shirt</a>
                              </p>
                            </div>
                            <div class="aa-prod-view-bottom">
                              <a href="#" class="aa-add-to-cart-btn"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                              <a href="#" class="aa-add-to-cart-btn">View Details</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>                        
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div>
              <!-- / quick view modal -->    --}}
            </div>  
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / product category -->


  <!-- Subscribe section -->
  <section id="aa-subscribe">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-subscribe-area">
            <h3>Subscribe our newsletter </h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex, velit!</p>
            <form action="" class="aa-subscribe-form">
              <input type="email" name="" id="" placeholder="Enter your Email">
              <input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Subscribe section -->

@endsection