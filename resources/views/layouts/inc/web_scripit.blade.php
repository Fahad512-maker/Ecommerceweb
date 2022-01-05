  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="{{ asset('LetsShop/js/bootstrap.js') }}"></script>  
  <!-- SmartMenus jQuery plugin -->
  <script type="text/javascript" src="{{ asset('LetsShop/js/jquery.smartmenus.js') }}"></script>
  <!-- SmartMenus jQuery Bootstrap Addon -->
  <script type="text/javascript" src="{{ asset('LetsShop/js/jquery.smartmenus.bootstrap.js') }}"></script>  
  <!-- To Slider JS -->
  <script src="{{ asset('LetsShop/js/sequence.js') }}"></script>
  <script src="{{ asset('LetsShop/js/sequence-theme.modern-slide-in.js') }}"></script>  
  <!-- Product view slider -->
  <script type="text/javascript" src="{{ asset('LetsShop/js/jquery.simpleGallery.js') }}"></script>
  <script type="text/javascript" src="{{ asset('LetsShop/js/jquery.simpleLens.js') }}"></script>
  <!-- slick slider -->
  <script type="text/javascript" src="{{ asset('LetsShop/js/slick.js') }}"></script>
  <!-- Price picker slider -->
  <script type="text/javascript" src="{{ asset('LetsShop/js/nouislider.js') }}"></script>
  <!-- Custom js -->
  <script src="{{ asset('LetsShop/js/custom.js') }}"></script> 
  <script src="{{ asset('LetsShop/js/parsley.js') }}"></script>
  <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  <script type="text/javascript">
    var product_image="{{ asset('products/images') }}";
    var url ="{{ url('/product') }}";
    var checkouturl = "{{ url('/checkout') }}";
  </script>
  <script type="text/javascript">
  function add_to_cart(id , pro_color_id , pro_size_id , size_id , color_id) {

     if(size_id == '' && pro_size_id != 'No' ){

      $('#product_alert').html(`<div class="alert alert-danger alert-dismissible" style="margin-top:20px;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Oops!</strong>Please Select First Size</div>`);
     }
     else if(color_id == '' && pro_color_id != 'No'){
      
      $('#product_alert').html(`<div class="alert alert-danger alert-dismissible" style="margin-top:20px;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Oops!</strong>Please Select Color After Size</div>`);

     }
     else{
      $('#product_id').val(id);
      $('#pqty').val($('#qty').val());

      $.ajax({ 
       url : '{{ url('/add_to_cart') }}',
       type : 'POST',
       data : $('#product_form').serialize(),
       success:function(response){
        var total=0;
        alert('Product:'+response.msg);

        if(response.totalitem == 0){

          $('.aa-cart-notify').html('0');
          $('.aa-cartbox-summary').remove();
        
        }
        else
        {
        $('.aa-cart-notify').html(response.totalitem);
         
        var html=`<ul>`;
        $.each(response.cart , function(prokey , provalue){
          console.log(provalue.qty);
          total=parseInt(total)+(parseInt(provalue.qty) * parseFloat(provalue.price) )
              html+=`<li><a class="aa-cartbox-img" href="`+url+`/`+provalue.title+`">
               <img src="`+product_image+`/`+provalue.product_images+`" alt="img"></a>
               <div class="aa-cartbox-info">
               <h4><a href="`+url+`/`+provalue.title+`">`+provalue.title+`</a></h4>
               <p>`+ provalue.qty+` x Rs.`+provalue.price+`</p></div>
               </li>`;           
        });
            
        }
           html+=`<li><span class="aa-cartbox-total-title">
                        Total
                      </span>
                      <span class="aa-cartbox-total-price">
                        Rs.`+total+`
                      </span>
                    </li>`;
            html+=`</ul><a class="aa-cartbox-checkout aa-primary-btn" href="`+checkouturl+`">Checkout</a>`;         
           $('.aa-cartbox-summary').html(html);
       } 

      });
     }
       
     }
  </script>
  
  <script type="text/javascript">


   $(document).on('submit' , '#login_form' , function(e){
   e.preventDefault();

    let formData=$('#login_form').serialize();
  
    $.ajax({
    url : '{{ url('/login_form') }}',
    type : 'POST',
    dataType:'json',
    data : formData,
    headers : {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    cache : false,
    async : false,
    success:function(data){
    
     if(data.status == 1){

      $('#login_form').find('#login-success-msg').css('display' , 'block');
      $('#login_form').find('#login-success-msg-val').text(data.msg);

      setTimeout(function(){

      $('#login_form').find('#login-success-msg').css('display' , 'none');
      } , 3000);

      window.location.reload();

     }
     else{

       $('#login_form').find('#login-danger-msg').css('display' , 'block');
      $('#login_form').find('#login-danger-msg-val').text(data.msg);

      setTimeout(function(){

      $('#login_form').find('#login-danger-msg').css('display' , 'none');
      } , 3000);
     }
    }
  
    });
   });
  </script>

  @if(isset($page_name))
  @switch($page_name)


  @case('main_page')
  <script type="text/javascript">
   
  </script>

  @break;

  @case('account_page')
  <script type="text/javascript">
  
   $(document).on('change' , '.country' , function(){
     
   let country_id=$(this).val();

   $.ajax({
  
   url : '{{ url('/state') }}/'+country_id,
   type : 'POST',
   data: {country_id : country_id , _token: '{{ csrf_token() }}'},
   success:function(response){

   $('.states').html(response);
   }

   });
   
   });

  </script>

  <script type="text/javascript">
      $(document).on('change' , '.state' ,function(){
        
       let state_id = $(this).val();
        
       $.ajax({
       url : '{{ url('/city') }}/'+state_id,
       type : 'POST',
       data : {state_id : state_id , _token : '{{ csrf_token() }}'},
       success:function(response){

        $('.city').html(response);
       } 

       });  
      });
  </script>

   <script type="text/javascript">
    window.ParsleyConfig = {
        errorsWrapper: '<div></div>',
        errorTemplate: '<div class="alert alert-danger parsley" role="alert"></div>',
        errorClass: 'has-error',
        successClass: 'has-success'
    };

    $('#register_form').parsley();
    $(document).on('submit' , '#register_form' , function(event){
     event.preventDefault();
     
     let formData = $('#register_form').serialize();
     console.log(formData);
     $.ajax({
     
     url : '{{ url('/store_customer') }}',
     type: "POST",
     data:formData,
     headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
     dataType : 'json',
     cache : false,
     async : false,
     success:function(data){
     
      if(data.status == true){

        $('#register_form').find('#register-success-msg').css('display','block');
        $('#register_form').find('#register-success-msg-val').text(data.msg);
     
         
         setTimeout(function(){
         $('#register_form').find('#register-success-msg').css('display','none');

         } , 3000);
      }

      else{

        $('#register_form').find('#register-danger-msg').css('display','block');
        $('#register_form').find('#register-danger-msg-val').text(data.msg);

        setTimeout(function(){

          $('#register_form').find('#register-danger-msg').css('display','none');
        } , 3000);
      }


     }

     });
  
    });
   </script>
  @break;

  @case('home')
  <script type="text/javascript">
  alert();
  </script>
   @break;

   @case('checkout')

    <script type="text/javascript">
  
   $(document).on('change' , '.country' , function(){
     
   let country_id=$(this).val();

   $.ajax({
  
   url : '{{ url('/state') }}/'+country_id,
   type : 'POST',
   data: {country_id : country_id , _token: '{{ csrf_token() }}'},
   success:function(response){

   $('.states').html(response);
   }

   });
   
   });

  </script>

  <script type="text/javascript">
      $(document).on('change' , '.state' ,function(){
        
       let state_id = $(this).val();
        
       $.ajax({
       url : '{{ url('/city') }}/'+state_id,
       type : 'POST',
       data : {state_id : state_id , _token : '{{ csrf_token() }}'},
       success:function(response){

        $('.city').html(response);
       } 

       });  
      });


      // Coupon

      $(document).on('click', '.coupon' , function(e){
        e.preventDefault();

         let copoun_code = $('.copoun_code').val();
         $('#coupon_code_msg').html('');
         
         
         if(copoun_code != ''){
          
          $.ajax({

           url: '{{ url('/coupon_code') }}',
           type:'POST',
           data:{copoun_code:copoun_code , _token:"{{ csrf_token() }}"},
           success:function(response){
           if(response.status == 'success'){
           $('#coupon_code').show();
           $('#coupon_code_str').html('Coupon('+copoun_code+')');
           if(response.type == 'value'){
            $('#coupon_code_str_value').html('- Rs.'+response.coupon_value);
            $('#total_value_product').html('Rs.'+response.total);
           }
           else if(response.type == 'percentage'){
           
            $('#coupon_code_str_value').html('-'+response.coupon_value+'%');
            $('#total_value_product').html('Rs.'+response.total);

           }

           
           
           }
           else if (response.status == 'error')
           {
            $('#coupon_code_msg').html(response.msg);

           }

           $('#coupon_code_msg').html(response.msg);


           }

          });

         }
         else{

            $('#coupon_code_msg').html('please enter coupon code');
         }

      });
  </script>
  {{-- Order placed --}}

  <script type="text/javascript">
  $(document).on('submit' , '#order_place_form' , function(event){
  event.preventDefault();
  let formData=$('#order_place_form').serialize();

  $.ajax({
  url: '{{ url('/place_order') }}',
  type : 'POST',
  data : formData,
  headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  success:function(response){

    if(response.status == 'success'){
     
     window.location.href='/payment_method';


    }
    else{
     
     $('#order_placed_msg').html(response.msg);

     setTimeout(function(){

      $('#order_placed_msg').hide();
     }, 3000);

    }

   

  }


  });
  });

  </script>
   
   @break;

   @case('payment')
   <script type="text/javascript">
     $(document).on('submit' , '#cod_confirm_order' , function(e){
      e.preventDefault();
       $('#order_placed_msg').html('please wait...');
       let formData=$('#cod_confirm_order').serialize();
       alert(formData);
      $.ajax({
        url : '{{ url('confirm_order') }}',
        type : 'POST',
        data : formData,
        headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        success:function(response){
          
          if(response.status == 'success'){
 
           window.location.href='/thank_you';

          }
          else{

          }
          $('#order_placed_msg').html(response.msg);
        }
      });
     });
   </script>
   <script type="text/javascript">
    var $form= $(".require-validation");
   
    $('form.require-validation').bind('submit', function(e) {
        var $form         = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
        $errorMessage.addClass('hide');
  
        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
          var $input = $(el);
          if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
          }
        });
   
        if (!$form.data('cc-on-file')) {
          e.preventDefault();
          Stripe.setPublishableKey($form.data('stripe-publishable-key'));
          Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
          }, stripeResponseHandler);
        }
  
  });
  
  function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            /* token contains id, last4, and card type */
            var token = response['id'];
               
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }

   </script>
   
   @break;

   @case('product_page')
  
   <script type="text/javascript">
    $(document).on('click' , '.category' , function(){
    
    let id = $(this).attr('data-id');
    $.ajax({
    url : '{{ url('/show/products') }}/'+id,
    type : 'POST',
    data : {id:id , _token : '{{ csrf_token() }}'},
    beforeSend: function(){
       $('#product_card').hide();
       $('#loading-image').css('margin-top' , '250px');
       $("#loading-image").show();

       },
       success:function(data){
        $('.showproducts').html(data);
        $('#loading-image').hide();
        $('#product_card').show(); 
       }

    });

    });
   </script>
   <script type="text/javascript">
     $(document).on('change' , '.sort_product' , function(){
     
      let sort_value = $(this).val();

      $.ajax({
      
       url : '{{ url('/sort/products') }}/'+sort_value,
       type : 'POSt',
       data : {sort_value : sort_value , _token : '{{ csrf_token() }}'},
       beforeSend: function(){
       $('#product_card').hide();
       $('#loading-image').css('margin-top' , '250px');
       $("#loading-image").show();

       },
       success:function(data){
        $('.showproducts').html(data);
        $('#loading-image').hide();
        $('#product_card').show(); 
       }

      });

     });
   </script>

   <script type="text/javascript">
     $(document).on('click' , '.colorbysearch' ,function(){

      let id = $(this).attr('data-id');
      $.ajax({
      
       url : '{{ url('/search/color') }}/'+id+'/product',
       type: 'POST',
       data : {id:id , _token : '{{ csrf_token() }}'},
       beforeSend:function(){
       $('#product_card').hide();
       $('#loading-image').css('margin-top' , '250px');
       $("#loading-image").show();
       },
       success:function(data){
        $('.showproducts').html(data);
        $('#loading-image').hide();
        $('#product_card').show(); 
       }

      });
     });
   </script>

   {{-- Search by Input --}}

   <script type="text/javascript">
    $(document).on('keyup' , '.searchbyinput' , function(){
     search = $('#search').val();

     $.ajax({
     url : '{{ url('/search/products') }}',
     type : 'POST',
     data :{search:search , _token : '{{ csrf_token() }}'},
     beforeSend:function(){
       $('#product_card').hide();
       $('#loading-image').css('margin-top' , '250px');
       $("#loading-image").show();
       },
     success:function(data){
        $('.showproducts').html(data);
        $('#loading-image').hide();
        $('#product_card').show();
        
 }
     });
     
    });
   </script>
   <script type="text/javascript">
    $(document).on('click' , '.fetchproduct a' , function(event){
     event.preventDefault();
     let page = $(this).attr('href').split('page=')[1];
     
     $.ajax({
     url : '{{ url('/fetch/products?page=') }}'+page,
     }).done(function (response) {
    $('.showproducts').html(response);
   });


    });
   </script>


   @break;

   @case('product_detail')
      <script type="text/javascript">
    $(document).on('click' , '.getcolorbysize' , function(){
     
     let size=$(this).attr('data-id');
     $('#size_id').val(size);
     $('.product_color').hide();
     $('.size-'+size).show();
  
     });

     // colors

     $(document).on('click', '.product_color' , function(){
     
     let color = $(this).attr('data-id');
     $('#color_id').val(color);
     });
     
     // add to cart

     $(document).on('click' , '.add_to_cart_product' ,function(){
      
     $('#product_alert').html('');
     let id = $(this).attr('product-id');
     let pro_color_id =$(this).attr('color-id');
     let pro_size_id = $(this).attr('size-id');
     let color_id=$('#color_id').val();
     let size_id=$('#size_id').val();

      if(pro_color_id == 0 && pro_size_id == 0 ){

      pro_color_id = 'No';
      pro_size_id  = 'No';
     }
     
      add_to_cart(id , pro_color_id , pro_size_id , size_id , color_id);
   

     });
   
   </script>
   @break;

   @case('my_cart')
   <script type="text/javascript">
        function add_to_cart(id , pro_color_id , pro_size_id , size_id , color_id) {

     if(size_id == '' && pro_size_id != 'No' ){

      $('#product_alert').html(`<div class="alert alert-danger alert-dismissible" style="margin-top:20px;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Oops!</strong>Please Select First Size</div>`);
     }
     else if(color_id == '' && pro_color_id != 'No'){
      
      $('#product_alert').html(`<div class="alert alert-danger alert-dismissible" style="margin-top:20px;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Oops!</strong>Please Select Color After Size</div>`);

     }
     else{
      // $('#product_id').val(id);
      // $('#pqty').val($('#qty').val());

      $.ajax({ 
       url : '{{ url('/add_to_cart') }}',
       type : 'POST',
       data : $('#product_form').serialize(),
       success:function(response){
         var total=0;
        alert('Product:'+response.msg);
        if(response.totalitem == 0){

          $('.aa-cart-notify').html('0');
          $('.aa-cartbox-summary').remove();
          window.location.href="{{ url('/') }}";
        
        }
        else
        {
        $('.aa-cart-notify').html(response.totalitem);
         
        var html=`<ul>`;
        $.each(response.cart , function(prokey , provalue){
          total=parseInt(total)+(parseInt(provalue.qty) * parseFloat(provalue.price) )
              html+=`<li><a class="aa-cartbox-img" href="`+url+`/`+provalue.title+`">
               <img src="`+product_image+`/`+provalue.product_images+`" alt="img"></a>
               <div class="aa-cartbox-info">
               <h4><a href="">`+provalue.title+`</a></h4>
               <p>`+ provalue.qty+` x Rs.`+provalue.price+`</p></div>
               </li>`;           
        });
            
        }
           html+=`<li><span class="aa-cartbox-total-title">
                        Total
                      </span>
                      <span class="aa-cartbox-total-price">
                        Rs.`+total+`
                      </span>
                    </li>`;
            html+=`</ul><a class="aa-cartbox-checkout aa-primary-btn" href="checkout.html">Checkout</a>`;         
           $('.aa-cartbox-summary').html(html);
       } 

      });
     }
       
     }
    $(document).on('change' , '.cart_quantity' , function(){
      
    let size_id=$(this).attr('size-id');
    let color_id = $(this).attr('color-id');
    let pro_id =$(this).attr('pro-id');
    let price = $(this).attr('price');
    let attr_id = $(this).attr('attr-id');
    let qty=$('#qty-' +attr_id).val();
    let grand_total = 0;
       // alert(attr_id);
      $('#color_id').val(color_id);
      $('#size_id').val(size_id); 
      $('#product_id').val(pro_id);
      $('#pqty').val(qty);
      add_to_cart(size_id , color_id , pro_id);
      let subtotal=qty*price;
      let total=Number($('#Total_product_price-'+attr_id).html('Rs.'+subtotal));
       grand_total = grand_total+subtotal;
      $('#grand_Total').html('Rs.'+grand_total);

    });

    $(document).on('click' , '.deletecart' , function(){
    
    let color_id = $(this).attr('color-id');
    let size_id = $(this).attr('size-id');
    let attr_id =$(this).attr('data-id');
    let pro_id= $(this).attr('pro-id');
    $('#color_id').val(color_id);
    $('#size_id').val(size_id);
     $('#pqty').val(0);
     $('#product_id').val(pro_id);  
     add_to_cart(size_id , color_id ,pro_id);
    $('#cart_box-'+attr_id).remove();
   

    });
   </script>

   @break
   
   @case('example_task')
   <script type="text/javascript">
    $(document).on('click' , '.add_more' , function(){
     
    let html=`
<div class="row" style="margin-bottom:20px;">
<div class="col-md-3">
<input type="text" name="name[]" placeholder="Name" class="form-control">
</div>  
<div class="col-md-3">
<input type="text" name="email[]" placeholder="email" class="form-control">
</div>  
<div class="col-md-3">
<input type="password" name="password[]" placeholder="password" class="form-control">
</div>
<div class="col-md-3">
<input type="button" name="" class="btn btn-danger remove_more" value="Remove">
</div>  
</div>`;

$('.add').append(html); 
    });

      $(document).on('click','.remove_more',function(){
$(this).closest('.row').remove();
})
   </script>

   <script type="text/javascript">
     $(document).on('click' , '#example_form' ,function(){
     
      let formData=$('#example_form').serialize;

        $.ajax({ 
       url : '{{ url('/store_example_form') }}',
       type : 'POST',
       data : formData,
       eaders:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
       success:function(response){
        alert();
         }
        // alert('Product:'+response.msg);
        // if(response.totalitem == 0){

        //   $('.aa-cart-notify').html('0');
        //   $('.aa-cartbox-summary').remove();
        //   window.location.href="{{ url('/') }}";
        
    });

     });
   </script>
   @break

  @endswitch

  @endif