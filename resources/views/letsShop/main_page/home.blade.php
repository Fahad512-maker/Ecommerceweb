@extends('layouts.shop_master' , ['page_name' => __('main_page')])
@section('page_title' , $page_title)
@section('content')

    <!-- Start slider -->
    <section id="aa-slider">
      <div class="aa-slider-area">
        <div id="sequence" class="seq">
          <div class="seq-screen">
            <ul class="seq-canvas">
              @foreach($slider as $value)
              <!-- single slide item -->
              <li>
                <div class="seq-model">
                  <img data-seq src="{{ asset('HomeSlider/images/'.$value->image) }}" alt="Men slide img" />
                </div>
                <div class="seq-title">
                 {{-- <span data-seq>Save Up to 75% Off</span>  --}}               
                  <h2 data-seq>{{ $value->title }}</h2>                
                  {{-- <p data-seq >Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.</p> --}}
                  <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">{{ $value->button_txt }}</a>
                </div>
              </li>
              @endforeach
                {{-- <!-- single slide item -->
                <li>
                  <div class="seq-model">
                    <img data-seq src="{{ asset('LetsShop/img/slider/2.jpg') }}" alt="Wristwatch slide img" />
                  </div>
                  <div class="seq-title">
                    <span data-seq>Save Up to 40% Off</span>                
                    <h2 data-seq>Wristwatch Collection</h2>                
                    <p data-seq>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.</p>
                    <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
                  </div>
                </li>
                <!-- single slide item -->
                <li>
                  <div class="seq-model">
                    <img data-seq src="{{ asset('LetsShop/img/slider/3.jpg') }}" alt="Women Jeans slide img" />
                  </div>
                  <div class="seq-title">
                    <span data-seq>Save Up to 75% Off</span>                
                    <h2 data-seq>Jeans Collection</h2>                
                    <p data-seq>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.</p>
                    <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
                  </div>
                </li>
                <!-- single slide item -->           
                <li>
                  <div class="seq-model">
                    <img data-seq src="{{ asset('LetsShop/img/slider/4.jpg') }}" alt="Shoes slide img" />
                  </div>
                  <div class="seq-title">
                    <span data-seq>Save Up to 75% Off</span>                
                    <h2 data-seq>Exclusive Shoes</h2>                
                    <p data-seq>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.</p>
                    <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
                  </div>
                </li>
                <!-- single slide item -->  
                 <li>
                  <div class="seq-model">
                    <img data-seq src="{{ asset('LetsShop/img/slider/5.jpg') }}" alt="Male Female slide img" />
                  </div>
                  <div class="seq-title">
                    <span data-seq>Save Up to 50% Off</span>                
                    <h2 data-seq>Best Collection</h2>                
                    <p data-seq>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.</p>
                    <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
                  </div>
                </li>  --}}                  
            </ul>
          </div>
          <!-- slider navigation btn -->
          <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
            <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
            <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
          </fieldset>
        </div>
      </div>
    </section>
    <!-- / slider -->
  <!-- Start Promo section -->
  <section id="aa-promo">
    <div class="container">
      <div class="row">

        <div class="col-md-12">
          <div class="aa-promo-area">
            <div class="row">
              <!-- promo left -->
              {{-- @if($category[4]->is_home != 0)
              <div class="col-md- no-padding">                
                <div class="aa-promo-left">
                  <div class="aa-promo-banner">                    
                    <img src="{{ asset('category/images/'.$category[4]->category_image) }}" alt="img">                    
                    <div class="aa-prom-content"> --}}
                      {{-- <span>75% Off</span> --}}
                   {{--    <h4><a href="#">For {{ $category[4]->name }}</a></h4>                      
                    </div>
                  </div>
                </div>
              </div>
              @endif --}}
              <!-- promo right -->
              <div class="col-md-12 no-padding">
                <div class="aa-promo-right">
                  @foreach($category->take(4) as $value)
                  <div class="aa-single-promo-right">
                    <div class="aa-promo-banner">                      
                      <img src="{{ asset('category/images/'.$value->category_image) }}" alt="img">                      
                      <div class="aa-prom-content">
                        {{-- <span>Exclusive Item</span> --}}
                        <h4><a href="#">For {{ $value->name }}</a></h4>                        
                      </div>
                    </div>
                  </div>
                  @endforeach
{{--                   <div class="aa-single-promo-right">
                    <div class="aa-promo-banner">                      
                      <img src="{{ asset('LetsShop/img/promo-banner-2.jpg') }}" alt="img">                      
                      <div class="aa-prom-content">
                        <span>Sale Off</span>
                        <h4><a href="#">On Shoes</a></h4>                        
                      </div>
                    </div>
                  </div>
                  <div class="aa-single-promo-right">
                    <div class="aa-promo-banner">                      
                      <img src="{{ asset('LetsShop/img/promo-banner-4.jpg') }}" alt="img">                      
                      <div class="aa-prom-content">
                        <span>New Arrivals</span>
                        <h4><a href="#">For Kids</a></h4>                        
                      </div>
                    </div>
                  </div>
                  <div class="aa-single-promo-right">
                    <div class="aa-promo-banner">                      
                      <img src="{{ asset('LetsShop/img/promo-banner-5.jpg') }}" alt="img">                      
                      <div class="aa-prom-content">
                        <span>25% Off</span>
                        <h4><a href="#">For Bags</a></h4>                        
                      </div>
                    </div>
                  </div> --}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Promo section -->
  <!-- Products section -->
  <section id="aa-product">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-product-area">
              <div class="aa-product-inner">
                <!-- start prduct navigation -->
                 <ul class="nav nav-tabs aa-products-tab">
                  @foreach($category as $value)
                    <li class=""><a href="#{{ $value->id }}" data-toggle="tab">{{ $value->name }}</a></li>
                    @endforeach
                    {{-- <li><a href="#women" data-toggle="tab">Women</a></li>
                    <li><a href="#sports" data-toggle="tab">Sports</a></li>
                    <li><a href="#electronics" data-toggle="tab">Electronics</a></li> --}}
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content">
                    @php
                    $loop_count=1;
                    @endphp
                    @foreach($category as $key => $value)
                    @php
                    $cat_class="";
                    if($loop_count == 1){
                      $cat_class="in active";
                      $loop_count++;
                    }
                    @endphp
                    <!-- Start men product category -->
                    <div class="tab-pane fade {{ $cat_class }} " id="{{ $value->id }}">
                      <ul class="aa-product-catg">
                        <!-- start single product item -->
                        @if(isset($category[$key]->product[0]))
                         @foreach($category[$key]->product as $key => $list)
                         
                        <li>
                          <figure>
                            <a class="aa-product-img" href="{{ url('/product/'.$list->title) }}"><img src="{{ asset('products/images/'.$list->productimage->product_images) }}" alt="polo shirt img"  style="width:250px; height:300px;"></a>
                            {{-- <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a> --}}
                              <figcaption>
                              <h4 class="aa-product-title"><a href="{{ url('/product/'.$list->title) }}">{{ $list->title }}</a></h4>
                              <span class="aa-product-price">Rs {{ $category[$key]->product_attr[0]->price }}</span><span class="aa-product-price"><del>Rs{{ $category[$key]->product_attr[0]->mrp }}</del></span>
                            </figcaption>

                          </figure>                        
                          <div class="aa-product-hvr-content">
                            {{-- <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a> --}}
                            {{-- <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                            <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a> --}}                          
                          </div>
                          <!-- product badge -->
                         {{--  <span class="aa-badge aa-sale" href="javascript:void(0)">SALE!</span> --}}
                        </li>
                        @endforeach
                        @else
                        <li>
                        <figure>
                        No Data Found
                       <figure>
                        </li>
                        @endif                      
                      </ul>
                     {{--  <a class="aa-browse-btn" href="#">Browse all Product <span class="fa fa-long-arrow-right"></span></a> --}}
                    </div>
                    <!-- / men product category -->
                    @endforeach
                    
               {{--    <!-- quick view modal -->                  
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
                            </div> --}}
                            {{-- <!-- Modal view content -->
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
                  </div><!-- / quick view modal -->      --}}         
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Products section -->
  <!-- banner section -->
  <section id="aa-banner">
    <div class="container">
      <div class="row">
        <div class="col-md-12">        
          <div class="row">
            <div class="aa-banner-area">
            <a href="#"><img src="{{ asset('LetsShop/img/fashion-banner.jpg') }}" alt="fashion banner img"></a>
          </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- popular section -->
  <section id="aa-popular-category">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-popular-category-area">
              <!-- start prduct navigation -->
             <ul class="nav nav-tabs aa-products-tab">
                <li class="active"><a href="#featured" data-toggle="tab">Featured</a></li>
                <li><a href="#trending" data-toggle="tab">Trending</a></li>
                <li><a href="#discount" data-toggle="tab">Discounting</a></li>  
                <li><a href="#promo" data-toggle="tab">Promo</a></li>                    
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <!-- Start men popular category -->
                <div class="tab-pane fade in active" id="featured">
                  <ul class="aa-product-catg aa-popular-slider">
                     @if(isset($category[$key]->featured[0]))
                         @foreach($category[$key]->featured as $key => $list)
                         
                        <li>
                          <figure>
                            <a class="aa-product-img" href="{{ url('/product/'.$list->title) }}"><img src="{{ asset('products/images/'.$list->productimage->product_images) }}" alt="polo shirt img"  style="width:250px; height:300px;"></a>
                            {{-- <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a> --}}
                              <figcaption>
                              <h4 class="aa-product-title"><a href="{{ url('/product/'.$list->title) }}">{{ $list->title }}</a></h4>
                              <span class="aa-product-price">Rs {{ $category[$key]->product_attr[0]->price }}</span><span class="aa-product-price"><del>Rs{{ $category[$key]->product_attr[0]->mrp }}</del></span>
                            </figcaption>

                          </figure>                        
                          <div class="aa-product-hvr-content">
                            {{-- <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a> --}}
                            {{-- <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                            <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a> --}}                          
                          </div>
                          <!-- product badge -->
                          {{-- <span class="aa-badge aa-sale" href="#">SALE!</span> --}}
                        </li>
                        @endforeach
                        @else
                        <li>
                        <figure>
                        No Data Found
                       <figure>
                        </li>
                        @endif                                                            
                  </ul>
                  {{-- <a class="aa-browse-btn" href="#">Browse all Product <span class="fa fa-long-arrow-right"></span></a> --}}
                </div>
                <!-- / popular product category -->
                
                <!-- start featured product category -->
                <div class="tab-pane fade" id="trending">
                 <ul class="aa-product-catg aa-featured-slider">
                   @if(isset($category[$key]->trending[0]))
                         @foreach($category[$key]->trending as $key => $list)
                         
                        <li>
                          <figure>
                            <a class="aa-product-img" href="{{ url('/product/'.$value->title) }}"><img src="{{ asset('products/images/'.$list->productimage->product_images) }}" alt="polo shirt img"  style="width:250px; height:300px;"></a>
                            {{-- <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a> --}}
                              <figcaption>
                              <h4 class="aa-product-title"><a href="{{ url('/product/'.$value->title) }}">{{ $list->title }}</a></h4>
                              <span class="aa-product-price">Rs {{ $category[$key]->product_attr[0]->price }}</span><span class="aa-product-price"><del>Rs{{ $category[$key]->product_attr[0]->mrp }}</del></span>
                            </figcaption>

                          </figure>                        
                          <div class="aa-product-hvr-content">
                            {{-- <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a> --}}
                            {{-- <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                            <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a> --}}                          
                          </div>
                          <!-- product badge -->
                          {{-- <span class="aa-badge aa-sale" href="javascript:void(0)">SALE!</span> --}}
                        </li>
                        @endforeach
                        @else
                        <li>
                        <figure>
                        No Data Found
                       <figure>
                        </li>
                        @endif                                                                          
                  </ul>
                  {{-- <a class="aa-browse-btn" href="#">Browse all Product <span class="fa fa-long-arrow-right"></span></a> --}}
                </div>
                <!-- / featured product category -->

                <!-- start latest product category -->
                <div class="tab-pane fade" id="discount">
                  <ul class="aa-product-catg aa-latest-slider">
                  @if(isset($category[$key]->discounted[0]))
                         @foreach($category[$key]->discounted as $key => $list)
                         
                        <li>
                          <figure>
                            <a class="aa-product-img" href="{{ url('/product/'.$list->title) }}"><img src="{{ asset('products/images/'.$list->productimage->product_images) }}" alt="polo shirt img"  style="width:250px; height:300px;"></a>
                            {{-- <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a> --}}
                              <figcaption>
                              <h4 class="aa-product-title"><a href="{{ url('/product/'.$list->title) }}">{{ $list->title }}</a></h4>
                              <span class="aa-product-price">Rs {{ $category[$key]->product_attr[0]->price }} </span><span class="aa-product-price"><del>Rs {{ $category[$key]->product_attr[0]->mrp }}</del></span>
                            </figcaption>

                          </figure>                        
                          <div class="aa-product-hvr-content">
                            {{-- <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a> --}}
                            {{-- <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                            <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a> --}}                          
                          </div>
                          <!-- product badge -->
                          {{-- <span class="aa-badge aa-sale" href="#">SALE!</span> --}}
                        </li>
                        @endforeach
                        @else
                        <li>
                        <figure>
                        No Data Found
                       <figure>
                        </li>
                        @endif                                                     
                  </ul>
                  {{--  <a class="aa-browse-btn" href="#">Browse all Product <span class="fa fa-long-arrow-right"></span></a> --}}
                </div>
                <!-- / latest product category --> 

                             {{-- Promo Category  --}}

                              <!-- Start men popular category -->
                <div class="tab-pane fade" id="promo">
                  <ul class="aa-product-catg aa-popular-slider">
                    <!-- start single product item -->
                    @if(isset($category[$key]->promo[0]))
                     
                         @foreach($category[$key]->promo as $key => $list)
                              
                        <li>
                          <figure>
                            <a class="aa-product-img" href="{{ url('/product/'.$list->title) }}"><img src="{{ asset('products/images/'.$list->productimage->product_images) }}" alt="polo shirt img"  style="width:250px; height:300px;"></a>
                            {{-- <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a> --}}
                              <figcaption>
                              <h4 class="aa-product-title"><a href="{{ url('/product/'.$list->title) }}">{{ $list->title }}</a></h4>
                              <span class="aa-product-price">Rs {{ $category[$key]->product_attr[0]->price }} </span><span class="aa-product-price"><del>Rs {{ $category[$key]->product_attr[0]->mrp }}</del></span>
                            </figcaption>

                          </figure>                        
                          <div class="aa-product-hvr-content">
                            {{-- <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a> --}}
                            {{-- <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                            <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a> --}}                          
                          </div>
                          <!-- product badge -->
                          {{-- <span class="aa-badge aa-sale" href="javascript:void(0)">SALE!</span> --}}
                        </li>
                        @endforeach
                        @else
                        <li>
                        <figure>
                        No Data Found
                       <figure>
                        </li>
                        @endif 
                                                                                   
                  </ul>
                  {{-- <a class="aa-browse-btn" href="#">Browse all Product <span class="fa fa-long-arrow-right"></span></a> --}}
                </div>
              </div>
            </div>
          </div> 
        </div>
      </div>
    </div>
  </section>
  <!-- / popular section -->
  <!-- Support section -->
  <section id="aa-support">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-support-area">
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-truck"></span>
                <h4>FREE SHIPPING</h4>
                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-clock-o"></span>
                <h4>30 DAYS MONEY BACK</h4>
                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-phone"></span>
                <h4>SUPPORT 24/7</h4>
                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Support section -->
  <!-- Testimonial -->
  <section id="aa-testimonial">  
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-testimonial-area">
            <ul class="aa-testimonial-slider">
              <!-- single slide -->
              <li>
                <div class="aa-testimonial-single">
                <img class="aa-testimonial-img" src="img/testimonial-img-2.jpg" alt="testimonial img">
                  <span class="fa fa-quote-left aa-testimonial-quote"></span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui!consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui.</p>
                  <div class="aa-testimonial-info">
                    <p>Allison</p>
                    <span>Designer</span>
                    <a href="#">Dribble.com</a>
                  </div>
                </div>
              </li>
              <!-- single slide -->
              <li>
                <div class="aa-testimonial-single">
                <img class="aa-testimonial-img" src="img/testimonial-img-1.jpg" alt="testimonial img">
                  <span class="fa fa-quote-left aa-testimonial-quote"></span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui!consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui.</p>
                  <div class="aa-testimonial-info">
                    <p>KEVIN MEYER</p>
                    <span>CEO</span>
                    <a href="#">Alphabet</a>
                  </div>
                </div>
              </li>
               <!-- single slide -->
              <li>
                <div class="aa-testimonial-single">
                <img class="aa-testimonial-img" src="img/testimonial-img-3.jpg" alt="testimonial img">
                  <span class="fa fa-quote-left aa-testimonial-quote"></span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui!consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui.</p>
                  <div class="aa-testimonial-info">
                    <p>Luner</p>
                    <span>COO</span>
                    <a href="#">Kinatic Solution</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Testimonial -->

  <!-- Latest Blog -->
  <section id="aa-latest-blog">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-latest-blog-area">
            <h2>LATEST BLOG</h2>
            <div class="row">
              <!-- single latest blog -->
              <div class="col-md-4 col-sm-4">
                <div class="aa-latest-blog-single">
                  <figure class="aa-blog-img">                    
                    <a href="#"><img src="img/promo-banner-1.jpg" alt="img"></a>  
                      <figcaption class="aa-blog-img-caption">
                      <span href="#"><i class="fa fa-eye"></i>5K</span>
                      <a href="#"><i class="fa fa-thumbs-o-up"></i>426</a>
                      <a href="#"><i class="fa fa-comment-o"></i>20</a>
                      <span href="#"><i class="fa fa-clock-o"></i>June 26, 2016</span>
                    </figcaption>                          
                  </figure>
                  <div class="aa-blog-info">
                    <h3 class="aa-blog-title"><a href="#">Lorem ipsum dolor sit amet</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, ad? Autem quos natus nisi aperiam, beatae, fugiat odit vel impedit dicta enim repellendus animi. Expedita quas reprehenderit incidunt, voluptates corporis.</p> 
                    <a href="#" class="aa-read-mor-btn">Read more <span class="fa fa-long-arrow-right"></span></a>
                  </div>
                </div>
              </div>
              <!-- single latest blog -->
              <div class="col-md-4 col-sm-4">
                <div class="aa-latest-blog-single">
                  <figure class="aa-blog-img">                    
                    <a href="#"><img src="img/promo-banner-3.jpg" alt="img"></a>  
                      <figcaption class="aa-blog-img-caption">
                      <span href="#"><i class="fa fa-eye"></i>5K</span>
                      <a href="#"><i class="fa fa-thumbs-o-up"></i>426</a>
                      <a href="#"><i class="fa fa-comment-o"></i>20</a>
                      <span href="#"><i class="fa fa-clock-o"></i>June 26, 2016</span>
                    </figcaption>                          
                  </figure>
                  <div class="aa-blog-info">
                    <h3 class="aa-blog-title"><a href="#">Lorem ipsum dolor sit amet</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, ad? Autem quos natus nisi aperiam, beatae, fugiat odit vel impedit dicta enim repellendus animi. Expedita quas reprehenderit incidunt, voluptates corporis.</p> 
                     <a href="#" class="aa-read-mor-btn">Read more <span class="fa fa-long-arrow-right"></span></a>         
                  </div>
                </div>
              </div>
              <!-- single latest blog -->
              <div class="col-md-4 col-sm-4">
                <div class="aa-latest-blog-single">
                  <figure class="aa-blog-img">                    
                    <a href="#"><img src="img/promo-banner-1.jpg" alt="img"></a>  
                      <figcaption class="aa-blog-img-caption">
                      <span href="#"><i class="fa fa-eye"></i>5K</span>
                      <a href="#"><i class="fa fa-thumbs-o-up"></i>426</a>
                      <a href="#"><i class="fa fa-comment-o"></i>20</a>
                      <span href="#"><i class="fa fa-clock-o"></i>June 26, 2016</span>
                    </figcaption>                          
                  </figure>
                  <div class="aa-blog-info">
                    <h3 class="aa-blog-title"><a href="#">Lorem ipsum dolor sit amet</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, ad? Autem quos natus nisi aperiam, beatae, fugiat odit vel impedit dicta enim repellendus animi. Expedita quas reprehenderit incidunt, voluptates corporis.</p> 
                    <a href="#" class="aa-read-mor-btn">Read more <span class="fa fa-long-arrow-right"></span></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>    
      </div>
    </div>
  </section>
  <!-- / Latest Blog -->

  <!-- Client Brand -->
  <section id="aa-client-brand">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-client-brand-area">
            <ul class="aa-client-brand-slider">
              @foreach($brand as $value)
              <li><a href="#"><img src="{{ asset('Brand/images/'.$value->image) }}" alt="{{ $value->title }}"></a></li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Client Brand -->

  
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





@stop