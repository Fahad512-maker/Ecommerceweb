
    <script src="{{ asset('vendor/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <script src="{{ asset('datatable/js/datatable.js') }}"></script>
    <!-- Vendor JS       -->
    <script src="{{ asset('vendor/slick/slick.min.js') }}">
    </script>
    <script src="{{ asset('vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}">
    </script>
    <script src="{{ asset('vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('vendor/counter-up/jquery.counterup.min.js') }}">
    </script>
    <script src="{{ asset('vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('vendor/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/select2.min.js') }}">
    </script>

    <!-- Main JS-->
    <script src="{{ asset('js/main.js') }}"></script>
   
    @if(isset($page_name))

    @switch($page_name)

    @case('categories')
    
    <script type="text/javascript">
    $(document).on('click' , '.category_is_home' , function(){
    
    let id=$(this).attr('data-id');

    $.ajax({
   
    url : '{{ url('admin/category') }}/'+id+'/is_home',
    type : 'POST',
    data : {id : id , _token: '{{ csrf_token() }}' },
    success:function(response){

     if(response.result == 1){

      $('.status-'+id).html('<i class="fas fa-eye-slash text-dark"></i>');
      $('#status-success-msg').css('display' , 'block');
      $('#status-success-msg-val').text(response.msg);

      setTimeout(function(){
        $('#status-success-msg').css('display' , 'none');
      } , 2000);


       }
     else
     {
      $('.status-'+id).html('<i class="fas fa-eye text-dark"></i>');
      $('#status-success-msg').css('display' , 'block');
      $('#status-success-msg-val').text(response.msg);

      setTimeout(function(){
        $('#status-success-msg').css('display' , 'none');
      } , 2000);
     }
    }


    });
    });
    </script>


    @break;

  {{-- Home Slider --}}

  @case('homeslider')
  <script type="text/javascript">
   $(document).on('click' , '.slider_status' ,function(){

   let id=$(this).attr('data-id');
   
    $.ajax({
    url : '{{ url('admin/status') }}/'+id+'/home_slider',
    type : 'POST',
    data : {id:id , _token : '{{ csrf_token() }}'},
    success:function(response){

     if(response.result == 1){
      
      $('.status-'+id).html('<i class="fas fa-eye-slash text-dark"></i>');
      $('#status-success-msg').css('display', 'block');
      $('#status-success-msg-val').text(response.msg);

      setTimeout(function(){
       
       $('#status-success-msg').css('display', 'none');

      } , 2500);

     }
     else{

      $('.status-'+id).html('<i class="fas fa-eye text-dark"></i>')
      $('#status-success-msg').css('display', 'block');
      $('#status-success-msg-val').text(response.msg);

      setTimeout(function(){
       
       $('#status-success-msg').css('display', 'none');

      } , 2500);
     }
    }

    });

  });

  </script>
  @break;


    @case('add_products')
     <script type="text/javascript">
        $(document).on('change' , '.category_change' , function(){

          let cat_id = $(this).val();
          
          $.ajax({
            
            url: '{{ url("admin/getSubcategoriesByCatId") }}/'+cat_id,
            success:function(data){
           
             $('.getsubcategory').html(data);

            }

          });

        });
    </script>

    {{-- Attributes --}}
     
    <script type="text/javascript">
      $(document).on('click' , '.add_attributes' , function(){
       
        let number = Number($('.number').val()) + 1;
        $('.number').val(number);

       let html=` <div class="row">
          <div class="col-md-4">
            <div class="form-group">
          <label>SKU</label>
          <input type="text" name="sku[]" class="form-control sku_`+number+`" placeholder="Enter SKU">
          </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
          <label>MRP</label>
          <input type="text" name="mrp[]" class="form-control" placeholder="Enter Sku" class="sku_`+number+`">
          </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
          <label>Size</label>
          <select class="form-control size_`+number+`" name="size_id[]" >
          <option>-- Select Size --</option>
          @foreach($size as $value)
          <option value="{{ $value->id }}">{{ $value->sizes }}</option>
          @endforeach   
          </select>
          </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
          <label>Color</label>
          <select class="form-control color_`+number+`" name="color_id[]">
          <option>-- Select Color --</option> 
          @foreach($color as $value)
          <option value="{{ $value->id }}">{{ $value->name }}</option>
          @endforeach 
          </select>
          </div>
          </div>

          <div class="col-md-4">
          <div class="form-group">
          <label>Price</label>
          <input type="text" name="price[]" class="form-control price_`+number+`" placeholder="Enter Price">
          </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
          <label>Qty</label>
          <input type="text" name="qty[]" class="form-control quantity_`+number+`" placeholder="Enter Quantity">
          </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
          <label>Product Images</label>
          <input type="file" name="attr_images[]" class="form-control-file">
          </div>
          </div>

          <div class="col-md-4">
          <div class="form-group">
          <label></label><br>
          <button type="button" class="btn btn-danger rounded-circle remove_attributes">&times</button>
          </div>
          </div>

          </div>`;

       $('.data').append(html);
      });
    </script>
    <script type="text/javascript">
    $(document).on('click','.remove_attributes',function(){
$(this).closest('.row').remove();
})
    </script>

    @break;


    @case('products')
    <script type="text/javascript">
      
     $(document).on('click' , '.product_publish' , function(){

     let id = $(this).attr('data-id');
      
     $.ajax({
     
      url:'{{ url('admin/status') }}/'+id+'/products',
      type : 'POST',
      data : {id : id , _token: '{{ csrf_token() }}' },
      success:function(response){
        
        if(response == 1){

          $('.status-'+id).html('<i class="fas fa-eye-slash text-secondary" title="unpublish"></i>'); 
        }
        else{

           $('.status-'+id).html('<i class="fas fa-eye text-secondary" title="publish"></i>'); 
        }
      }


     });
     }); 
    </script>
    @break;

    @case('coupon')
    <script type="text/javascript">
    $(document).on('click' , '.coupon_status' , function(){
     let id = $(this).attr('data-id');
      
     $.ajax({
     url: '{{ url('/admin/coupon_status') }}/'+id,
     type : 'POST',
     dataType : 'json',
     data : {id : id , _token: '{{csrf_token()}}' },
     success:function(response){
      
      if(response == 1){
      
      $('.status-'+id).html("<i class='fas fa-check-circle text-success'></i>");
      // $('.status-'+id).html("<i class='fas fa-times-circle'></i>");


      }
      else{
      $('.status-'+id).html("<i class='fas fa-times-circle text-danger'></i>");

      }

      }


     }); 
    });
    </script>
    @break

    @case('customers')
    <script type="text/javascript">
      $(document).on('click' , '.customer_detail' , function(){
       
       let id=$(this).attr('data-id');

       $.ajax({
       
       url: '{{ url('admin/show') }}/'+id+'/customer',
       type: 'POST',
       data : {id : id , _token : '{{ csrf_token() }}' },
       success:function(data){
        $('#exampleModal').modal('show');
        $('.viewdetail').html(data);
       }



       });

      });
    </script>
    <script type="text/javascript">
      $(document).on('click' , '.customer_status' , function(){

       let id= $(this).attr('data-id');

       $.ajax({
       
       url:'{{ url('admin/status') }}/'+id,
       type: 'POST',
       data : {id : id , _token: '{{csrf_token()}}' },
       success:function(response){

        if(response == 1){

          $('.status-'+id).html("<i class='fas fa-check-circle text-success'></i>");
        }
        else{

          $('.status-'+id).html("<i class='fas fa-times-circle text-danger'></i>");
        }
       }


       });
      });
    </script>
    @break

    @endswitch
    @endif