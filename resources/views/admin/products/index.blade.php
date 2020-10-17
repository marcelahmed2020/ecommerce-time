@extends('admin.layouts_RKh._app')
@section('content')
@section('site_name','Products')
<section class="content">
    <div class="container-fluid">

        <div class="block-header">
            <div class="row">
                <div class="col-md-6">
                    <h2>
                        Products
                        <small>  {{ auth()->user()->name  }} </small>
                    </h2>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb breadcrumb-bg-black">
                        <li><a href="{{ route('dashboard')  }}">
                                <i class="material-icons">home</i> Dashboard</a></li>
                        <li class="active"> <a href="#" class="font_l">  Products </a></li>
                    </ol>



                </div>
            </div>

        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <strong><?php if (request()->id): ?>
                            <a href="{{ route('products.index')  }}">Back</a>
                            <?php endif; ?></strong>
                        <h2>


                            @permission('create_products')
                            <a  href="{{ route('products.create')}}"  title=""  class="btn btn-primary"> <i class="material-icons">plus_one</i> ADD Products</a>

                            @endpermission
                        </h2>

                    </div>
                    <div class="body table-responsive">
                        <!-- <div class="body">  s<div> -->
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                        <thead>
                                        <tr role="row">
                                            <th  class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 30px;">
                                                #</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 200px;">
                                                Title</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 200px;">
                                                Short Description</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 200px;">
                                                Sale Price</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 200px;">
                                                Purchasing Price</th>

                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 150px;">
                                                Feature Items</th></tr>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 150px;">
                                            Action</th></tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $key => $cat)

                                            <tr>

                                                <td class="sorting_1">{{ $key + 1  }}</td>
                                                <td>{{  $cat->title  }}</td>
                                                <td>{{  $cat->short_desc  }}</td>
                                                <td>{{  $cat->price  }} L.E</td>
                                                <td>{{  $cat->purchasing_price  }} L.E</td>
                                                <td>{{  $cat->featured == 1?'Yes':'No'  }}</td>

                                                <td>
                                                    <div class="button-demo js-modal-buttons">
                                                        @permission('read_products')
                                                        <a class="btn btn-primary btn-sm" href="{{ route('products.show',$cat->id)  }}" title="Show"> <i class="material-icons">slideshow</i>  </a>

                                                        @endpermission
                                                        @permission('update_products')

                                                        <a class="btn btn-info btn-sm" href="{{ route('products.attribute',$cat->id)  }}" title="Attribute">Attributes  </a>
                                                        <a class="btn btn-info btn-sm" href="{{ route('products.edit',$cat->id)  }}" title="Edit"> <i class="material-icons">mode_edit</i>  </a>
                                                        @endpermission

                                                        @permission('delete_products')
                                                        <form   style="margin:0px 2px  ;display:inline"
                                                                action="{{ route('products.destroy',$cat->id)  }}" id="date-form-sliders-{{ $cat->id}}"
                                                                method="post">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                        </form>

                                                        <a class="btn btn-danger btn-sm"  onclick="
                                                            if(confirm('Are You Sure, You Want To Delete This Product!?')){
                                                            event.preventDefault();document.getElementById('date-form-sliders-{{ $cat->id}}').submit()
                                                            }else{
                                                            event.preventDefault();
                                                            }" title="Delete"  href="{{ route('products.destroy',$cat->id)  }}"><i class="material-icons">delete</i>   </a>
                                                        @endpermission
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- #END# Basic Examples -->
    </div></div>
</section>

@endsection
