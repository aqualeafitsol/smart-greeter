@extends('layouts.admin')
@section('content')
<!-- Content Header (Page header) -->
{{-- <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Subscriber Plan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Subscriber plan</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div> --}}
<!-- /.content-header -->

<!-- Main content -->
<section class="user-details-sec main-background pt_90 position-relative lft-rgt-corner-bg min-100vh">
    <div class="container-fluid p-h-60">
        <div class="row grid-gap">
            @include('admin.includes.left')
            <div class="col">
                <div class="profile-rgt-wrap admin-frm">
                    <div class="row">
                        <div class="col-12 connectedSortable">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Edit Subscription Plan</h3> 
                                </div>
                                @include('flashmessage.flash-message')
                                <!-- /.card-header -->
                                <!-- form start -->

                                <form action="{{route('admin.update.plan')}}" method="post">
                                @csrf
                                    <input type="hidden" name="id" value="{{$id}}">
                                    <div class="card-body">
                                        <div class="form-group input-style-wrap">
                                            <label for="name">Plan</label>
                                            <input type="text" name="name" class="form-control input-style" id="name" value="{{$plan->name}}" placeholder="Plan Name">
                                        </div>
                                        <div class="form-group input-style-wrap">
                                            <label for="price">Price</label>
                                            <input type="text" name="price" class="form-control input-style" id="price" value="{{$plan->price}}" placeholder="Enter Price">
                                        </div>
                                        <div class="form-group input-style-wrap">
                                            <label for="desc">Plan Details</label>
                                            <textarea class="form-control input-style" id="desc" name="description" placeholder="Enter Description">{{$plan->description}}</textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="plan-wrap-main shadow-box">
                                                    <div class="plan-wrap">                                    
                                                        <div class="add-plan-wrap">
                                                            <div class="row justify-content-between">
                                                                <div class="col-auto">
                                                                    <label for="">Package Name</label>
                                                                </div>
                                                            </div>
                                                            @if (!empty($plan->getPlanPackage))
                                                            @foreach ($plan->getPlanPackage as $package)
                                                            <div class="add-plan-wrap">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="form-group input-style-wrap">
                                                                            <input type="text" placeholder="Enter Package name" id="plan_package" name="plan_package[]" value="{{$package->name}}" class="form-control input-style">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        <button type="button" class="btn btn-sm btn-danger add-minus-btn remove_package"><i class="fas fa-minus"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                            @endif                                          
                                                        </div>
                                                        <div class="more-field"></div>
                                                        <div class="row justify-content-end">
                                                            <div class="col-auto">
                                                                <button type="button" class="btn btn-sm btn-success add-minus-btn add_more_package"><i class="fas fa-plus"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="shadow-box plan-visible-wrap">
                                                    <h4>plan visible</h4>
                                                    <ul class="d-flex flex-wrap">
                                                        <li class="checkbox">
                                                            <input type="checkbox" id="ck1" name="daily_visit" {{$plan->daily_visit == 1 ? 'checked' : 0 }}>
                                                            <label for="ck1">Daily Visits</label>
                                                        </li>
                                                        <li class="checkbox">
                                                            <input type="checkbox" id="ck2" name="platform_used"  {{$plan->platform_used == 1 ? 'checked' : 0}}>
                                                            <label for="ck2">Platform Used</label>
                                                        </li>
                                                        
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary ftr-save-btn">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection

@push('scripts')
  <script>
     var count=0;
    $(document).on('click', '.add_more_package', function(){
        count++;
        $('.more-field').append(`<div class="add-plan-wrap">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group input-style-wrap">
                                                            <input type="text" placeholder="Enter Package name" id="plan_package${count}" name="plan_package[]" class="form-control input-style">
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <button type="button" class="btn btn-sm btn-danger add-minus-btn remove_package"><i class="fas fa-minus"></i></button>
                                                    </div>
                                                </div>
                                            </div>`);
    });

    $(document).on('click','.remove_package',function(){
        $(this).closest('.add-plan-wrap').remove();
    });
  </script>

@endpush