@extends('layouts.admin')
@section('content')
<!-- Content Header (Page header) -->
{{-- <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">CMS</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">CMS</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div> --}}
<!-- /.content-header -->

<!-- Main content -->
<section class="user-details-sec main-background pt_90 position-relative lft-rgt-corner-bg min-100vh">
    {{-- @include('flashmessage.flash-message') --}}
    <div class="container-fluid p-h-60">
        <div class="row grid-gap">
            @include('admin.includes.left')
            
            <div class="col">
                <div class="profile-rgt-wrap admin-frm">
                    <div class="row">
                        <div class="col-12 connectedSortable">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Add CMS Page</h3> 
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="{{route('admin.store.cms')}}" method="post">
                                @csrf
                                    <div class="card-body">
                                        <div class="form-group input-style-wrap">
                                            <label for="page_name">Page Name</label>
                                            <input type="text" name="page_name" class="form-control input-style" id="page_name" value="" placeholder="Page Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="desc">Page Content</label>
                                            <textarea class="form-control ckeditor" id="desc" name="content"></textarea>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary ftr-save-btn">Save</button>
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
     
  </script>

@endpush