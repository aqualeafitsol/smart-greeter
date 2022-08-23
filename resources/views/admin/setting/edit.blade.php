@extends('layouts.admin')
@section('content')
<!-- Content Header (Page header) -->
{{-- <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Setting</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Setting</li>
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
                        <div class="col-12 connectedSortable">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Edit Setting</h3> 
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="{{route('admin.setting.update')}}" method="post">
                                @csrf
                                    <input type="hidden" name="id" value="{{$settings->id}}">
                                    <div class="card-body">
                                        <div class="form-group input-style-wrap">
                                            <label for="order_tax">Order Tax (%)</label>
                                            <input type="text" name="order_tax" class="form-control input-style" id="order_tax" value="{{$settings->order_tax}}" placeholder="Order Tax (%)">
                                            @if($errors->has('order_tax'))
                                                <div class="error">{{ $errors->first('order_tax') }}</div>
                                            @endif
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group input-style-wrap">
                                                    <label for="facebook_link">Facebook</label>
                                                    <input type="text" name="facebook_link" class="form-control input-style" id="facebook_link" value="{{@$settings->facebook_link}}" placeholder="Facebook link">
                                                    @if($errors->has('facebook_link'))
                                                        <div class="error">{{ $errors->first('facebook_link') }}</div>
                                                    @endif
                                                </div>   
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group input-style-wrap">
                                                    <label for="insta_link">Instagram</label>
                                                    <input type="text" name="insta_link" class="form-control input-style" id="insta_link" value="{{@$settings->insta_link}}" placeholder="Instagram Link">
                                                    @if($errors->has('insta_link'))
                                                        <div class="error">{{ $errors->first('insta_link') }}</div>
                                                    @endif
                                                </div>   
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group input-style-wrap">
                                                    <label for="twitter_link">Twitter</label>
                                                    <input type="text" name="twitter_link" class="form-control input-style" id="twitter_link" value="{{@$settings->twitter_link}}" placeholder="Twitter Link">
                                                    @if($errors->has('twitter_link'))
                                                        <div class="error">{{ $errors->first('twitter_link') }}</div>
                                                    @endif
                                                </div>   
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group input-style-wrap">
                                                    <label for="linkedin_link">Linkedin</label>
                                                    <input type="text" name="linkedin_link" class="form-control input-style" id="linkedin_link" value="{{@$settings->linkedin_link}}" placeholder="Linkedin Link">
                                                    @if($errors->has('linkedin_link'))
                                                        <div class="error">{{ $errors->first('linkedin_link') }}</div>
                                                    @endif
                                                </div>   
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group input-style-wrap">
                                                <label for="what_for_you">Home Page : What is in it for you?!</label>
                                                
                                                <textarea name="what_for_you" class="form-control input-style" id="what_for_you" placeholder="What is in it for you?!" style="height: 100px;">{{@$settings->what_for_you}}</textarea>
                                                @if($errors->has('what_for_you'))
                                                    <div class="error">{{ $errors->first('what_for_you') }}</div>
                                                @endif
                                            </div>   
                                        </div>
                                        <div class="row">
                                            <div class="form-group input-style-wrap">
                                                <label for="step">Home Page : Steps</label>
                                                
                                                <textarea name="step" class="form-control input-style" id="step" placeholder="Steps" style="height: 100px;">{{@$settings->step}}</textarea>
                                                @if($errors->has('step'))
                                                    <div class="error">{{ $errors->first('step') }}</div>
                                                @endif
                                            </div>   
                                        </div>
                                        <div class="row">
                                            <div class="form-group input-style-wrap">
                                                <label for="plan">Home Page : Plans</label>
                                                
                                                <textarea name="plan" class="form-control input-style" id="what_for_you" placeholder="Plans" style="height: 100px;">{{@$settings->plan}}</textarea>
                                                @if($errors->has('plan'))
                                                    <div class="error">{{ $errors->first('plan') }}</div>
                                                @endif
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
  

@endpush