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
                @include('flashmessage.flash-message')
                <div class="profile-rgt-wrap admin-frm">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Subscriber Plan List</h3>
                                </div>
                               
                                <!-- ./card-header -->
                                <div class="card-body table-responsive data-table-space">
                                    <table class="table data-table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                {{-- <th>Description</th> --}}
                                                <th width="100px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--<div class="row">
             <div class="col-lg-5 col-md-5 col-sm-12 col-12 connectedSortable">
                <div class="card card-primary">
                    <div class="card-header">
                        @if(isset($id))
                            <h3 class="card-title">Update Subscription Plan</h3>
                        @else
                            <h3 class="card-title">Add Subscription Plan</h3>
                        @endif
                        
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    @if(isset($id))
                        <form action="{{route('admin.update.plan')}}" method="post">
                        <input type="hidden" name="id" value="{{$id}}">
                    @else
                        <form action="{{route('admin.add.plan')}}" method="post">
                    @endif
                    
                    @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Plan</label>
                                <input type="text" name="name" class="form-control" id="name" value="{{isset($plan)?$plan->name:''}}" placeholder="Plan Name">
                            </div>
                            <div class="form-group">
                                <label for="desc">Plan Details</label>
                                <textarea class="form-control" id="desc" name="description" placeholder="Enter Description">{{isset($plan)?$plan->description:''}}</textarea>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            @if(isset($id))
                                <button type="submit" class="btn btn-primary">Update</button>
                            @else
                                <button type="submit" class="btn btn-primary">Add</button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}
    </div>
</section>
<!-- /.content -->
@endsection
@push('scripts')
<script>
$(document).ready(function(){
    $(function () {
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.plan') }}",
            columns: [
                {data: 'name', name: 'name'},
                /* {data: 'description', name: 'description'}, */
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });
});
</script>
@endpush