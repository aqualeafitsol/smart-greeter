@extends('layouts.admin')
@section('content')
<!-- Content Header (Page header) -->

<!-- /.content-header -->
<style>

</style>
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
                                    <h3 class="card-title">CMS List</h3>
                                </div>
                                <div class="card-body table-responsive data-table-space">
                                    <table class="table data-table">
                                        <thead>
                                            <tr>
                                                <th>Page Name</th>
                                                <th width="100px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
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
</section>
{{-- <section class="content">
    @include('flashmessage.flash-message')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">CMS List</h3>
                    </div>
                    <div class="card-body table-responsive data-table-space">
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>Page Name</th>
                                    <th width="100px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section> --}}
<!-- /.content -->
@endsection
@push('scripts')
<script>
$(document).ready(function(){
    $(function () {
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.cms') }}",
            columns: [
                {data: 'page_name', name: 'page_name'},
                /* {data: 'description', name: 'description'}, */
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });
});
</script>
@endpush