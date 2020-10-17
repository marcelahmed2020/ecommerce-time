@extends('admin.layouts_RKh._app')
@section('content')
@section('site_name','EDIT')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-md-6">
                    <h2>
                        EDIT
                        <small>  {{ auth()->user()->name  }}  </small>
                    </h2>
                </div>
                <div class="col-md-6">

                    <ol class="breadcrumb breadcrumb-bg-black">
                        <li><a href="{{ route('dashboard')  }}"><i class="material-icons">home</i>Dashboard</a></li>
                        <li><a href="{{ route('categories.index')  }}" class="font_l">   Categories</a></li>
                        <li class="active"><a href="#" class="font_l">Edit</a></li>

                    </ol>
                </div>
            </div>

        </div>
        <!-- Basic Examples -->

        <div class="row clearfix">
            <form action="{{ route('categories.update',$cag->id) }}" id="form_validation" method="post" enctype="multipart/form-data">

                {{ csrf_field() }}
                {{  method_field('PUT') }}
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Edit Category
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="title">Title </label>
                                            <input type="text" name="title" value="{{ $cag->title  }}"  class="form-control" placeholder="title.?">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="short_desc"> Short Description</label>
                                            <textarea  id="short_desc"  class="form-control" placeholder="Short Description.?" name="short_desc" rows="4">{{ $cag->short_desc  }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="parent">LEVEL</label>
                                            <select name="parent"   class="form-control">
                                                <option value="0" {{ $cag->parent == 0 ? 'selected' : ''  }}> Main Category ... </option>
                                                @foreach($categories as $cat)
                                                    <option value="{{$cat->id}}" {{ $cag->parent == $cat->id ? 'selected' : ''  }}>{{$cat->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>



                                <button type="submit" class="btn btn-block btn-lg bg-black waves-effect">
                                    <i class="material-icons">save</i>
                                    <span>UPDATE</span></button>
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
                    'title': {
                        required: true,
                        minlength: 2
                    },
                    'short_desc': {
                        required: true,
                        minlength: 2
                    }
                },
                messages: {
                    title: 'This field is required',
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
