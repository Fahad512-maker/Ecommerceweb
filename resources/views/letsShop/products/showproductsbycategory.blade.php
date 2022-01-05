
            <div class="aa-product-catg-body">
              <ul class="aa-product-catg">
                <div id="product_card">
                @if($products->isNotEmpty())
                @foreach($products as $key => $value) 
                <!-- start single product item -->      
                <li>
                  <figure>
                    <a class="aa-product-img" href="{{ url('product/'.$value->title) }}"><img src="{{ asset('products/images/'.$value->productimage->product_images) }}" alt="polo shirt img" style="width:250px; height:300px;"></a>
                    {{-- <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a> --}}
                    <figcaption>
                      <h4 class="aa-product-title"><a href="{{ url('/product/'.$value->title) }}">{{ $value->title }}</a></h4>
                      <span class="aa-product-price">Rs {{ $value->productattribute[0]->price }}</span><span class="aa-product-price"><del>Rs {{ $value->productattribute[0]->mrp }}</del></span>
                      <p class="aa-product-descrip">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam accusamus facere iusto, autem soluta amet sapiente ratione inventore nesciunt a, maxime quasi consectetur, rerum illum.</p>
                    </figcaption>
                  </figure>                         
                {{--   <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
                  </div>
                  <!-- product badge -->
                  <span class="aa-badge aa-sale" href="#">SALE!</span> --}}
                </li>

                @endforeach
                @else
                <div class="container">
                        <div class="row">
                          <div class="col-sm-8 ml-4" style="background:#f3f3f3;padding:10px 20px;    margin-left: 26px;"> 
                            No Upload Products  
                          </div>
                        </div>
                      </div>
                @endif           
              </ul>
           
  
            </div>
            @if($products->isNotEmpty())
            <div class="fetchproduct">
            {{ $products->links('vendor.pagination.custom') }}
          </div>
            @endif