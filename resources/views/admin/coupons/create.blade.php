@extends('admin.layouts_RKh._app')
@section('content')
@section('site_name','ADD')
<section class="content">
      <div class="container-fluid">
            <div class="block-header">
                    <div class="row">
                      <div class="col-md-6">
                                         <h2>
                                        ADD
                                          <small>  {{ auth()->user()->name  }}  </small>
                                        </h2>
                                        </div>
                      <div class="col-md-6">

                          <ol class="breadcrumb breadcrumb-bg-black">
                         <li><a href="{{ route('dashboard')  }}"><i class="material-icons">home</i>Dashboard</a></li>
                        <li><a href="{{ route('coupons.index')  }}" class="font_l">   Coupons</a></li>
                       <li class="active"><a href="#" class="font_l">Add</a></li>

                                                    </ol>
                      </div>
                    </div>

            </div>
            <!-- Basic Examples -->
           <div class="row clearfix">
          <form action="{{ route('coupons.store') }}" id="form_validation" method="post" enctype="multipart/form-data">

                               {{ csrf_field() }}
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                               <div class="card">
                                   <div class="header">
                                       <h2>
                                         Add Coupon
                                       </h2>
                                   </div>
                                   <div class="body">
                                       <div class="row clearfix">
                                           <div class="col-sm-6">
                                               <div class="form-group">
                                                   <div class="form-line">
                                                        <label for="coupon_code">Coupon Code : </label>
                                                       <input type="text" name="coupon_code" value="{{ old('coupon_code')  }}"  class="form-control" placeholder="Coupon Code.?">

                                                   </div>
                                               </div>
                                           </div>
                                           <div class="col-sm-6">
                                               <div class="form-group">
                                                   <div class="form-line">
                                                        <label for="amount">Amount : </label>
                                                       <input type="number" min="1" name="amount" value="{{ old('amount')  }}"  class="form-control" placeholder="Amount.?">

                                                   </div>
                                               </div>
                                           </div>
                                           <div class="col-sm-6">
                                               <div class="form-group">
                                                   <div class="form-line">
                                                        <label for="amount_type">Amount  Type:</label>
                                                       <select class="form-control" name="amount_type" id="amount_type">
                                                           <option value="Percentage">Percentage</option>
                                                           <option value="Fixed">Fixed</option>
                                                       </select>
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="col-md-6">
                                               <label for="expire_date"><b>Expire Date</b></label>

                                               <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">date_range</i>
                                            </span>
                                                   <div class="form-line">
                                                       <input type="date"   name="expire_date" value="{{ old('expire_date')  }}"   class="form-control datetime" placeholder="Ex: 30/07/2016 23:59">
                                                   </div>
                                               </div>
                                           </div>



                                           <button type="submit" class="btn btn-block btn-lg bg-black waves-effect">
                                               <i class="material-icons">save</i>
                                               <span>ADD</span></button>
                                       </div>
                            </div>
                               </div>
                           </div>

           </form>

            </div>
      </div>
</section>
 @section('js_conent')
     <script>
     $(function () {
     $('#form_validation').validate({
     rules: {
         'name': {
     required: true,
     minlength: 2
     },
     'short_desc': {
     required: true,
     minlength: 2
     }
     },
     messages: {
         name: 'This field is required',
         short_desc: 'This field is required',
       },
     highlight: function (input) {
     $(input).parents('.form-line').addClass('error');
     },
     unhighlight: function (input) {
     $(input).parents('.form-line').removeClass('error');
     },
     errorPlacement: function (error, element) {
     $(element).parents('.form-group').append(error);
     }
     });
     });
     </script>
 @endsection
@endsection
