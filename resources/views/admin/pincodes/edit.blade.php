@extends('admin.layouts_RKh._app')
@section('content')
@section('site_name','Edit')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-md-6">
                    <h2>
                        Edit
                        <small>  {{ auth()->user()->name  }}  </small>
                    </h2>
                </div>
                <div class="col-md-6">

                    <ol class="breadcrumb breadcrumb-bg-black">
                        <li><a href="{{ route('dashboard')  }}"><i class="material-icons">home</i>Dashboard</a></li>
                        <li><a href="{{ route('pincodes.index')  }}" class="font_l">   Pincodes</a></li>
                        <li class="active"><a href="#" class="font_l">Add</a></li>

                    </ol>
                </div>
            </div>

        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <form action="{{ route('pincodes.update',$pincodes->id) }}" id="form_validation" method="post" enctype="multipart/form-data">

                {{ csrf_field() }}
                {{ method_field('put') }}
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Add pincodes
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="city">City : </label>
                                            <input type="text" name="city" value="{{ $pincodes->city  }}"  class="form-control" placeholder="City.?">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="address">Address : </label>
                                            <input type="text" name="address" value="{{ $pincodes->address  }}"  class="form-control" placeholder="Address.?">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="pincodes">Pincodes : </label>
                                            <input type="text" name="pincodes" value="{{ $pincodes->pincodes  }}"  class="form-control" placeholder="Pincodes.?">

                                        </div>
                                    </div>
                                </div>



                                <button type="submit" class="btn btn-block btn-lg bg-black waves-effect">
                                    <i class="material-icons">save</i>
                                    <span>Edit</span></button>
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
                    'city': {
                        required: true,
                        minlength: 2
                    },
                    'address': {
                        required: true,
                        minlength: 2
                    },
                    'pincodes': {
                        required: true,
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
