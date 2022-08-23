@extends('layouts.app')
@section('content')
<section class="user-details-sec main-background pt_90 position-relative lft-rgt-corner-bg min-100vh details_sec">
    <div class="container-fluid p-h-60">
        <div class="row grid-gap">
            @include('includes.left')
            <div class="col-profile-rgt">
                @include('flashmessage.flash-message')
                <div class="profile-rgt-wrap">
                    <div class="row">
                        <div class="col-12">
                            <div class="lft-lightnevy-blue-box mt-0">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="chart-head">
                                            <h4>Your Created Sticker</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="order-table table-top-border table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Phone No</th>
                                                <th>Email</th>
                                                <th>Link</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($stickers as $sticker)
                                            <tr>
                                                <td>{{@$sticker->name}}</td>
                                                <td>{{@$sticker->phone}}</td>
                                                <td>{{@$sticker->email}}</td>
                                                <td>
                                                    <div class="link-btn-wrap">
                                                        <ul class="d-flex justify-content-center">
                                                            {{-- <li><a class="link-btn" href="#">add link</a></li> --}}
                                                            <li>
                                                                <a class="link-btn qr_code_modal" href="javascript:;" data-bs-toggle="modal" data-bs-target="#qrcodeModal" data-qrcode ="{{url('qrcode/'.$sticker->qrcode)}}">
                                                                    <span class="link-btn-icon"><img class="img-block" src="{{url('image/qr-code.svg')}}" alt=""></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="link-btn" href="{{route('user.sticker.edit',[$sticker->id])}}">
                                                                    <span class="link-btn-icon"><img class="img-block" src="{{url('image/hand.svg')}}" alt="View"></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="link-btn" href="{{route('user.sticker.view',[@$sticker->unique_id])}}">
                                                                    <span class="link-btn-icon"><img class="img-block" src="{{url('image/eye-solid.svg')}}" alt="Edit"></span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="4">No Data Found</td>
                                            </tr>
                                            @endforelse
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
<!-- Modal -->
<div class="modal fade page-modal qrcode-Modal" id="qrcodeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="qrcodeLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-times-circle"></i></button>
            <div class="modal-body">
                <div class="qrcode-show-wrap">
                    <span class="qrcode-show">
                        <img id="qrcode_img" src="" class="img-block" alt="">
                    </span>
                    <div class="text-center">
                        <a id="qrcode_link" href="#" class="qrcode-download" download>download</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    //Qrcode modal Open 
    $(document).on('click','.qr_code_modal', function(){
        var qr_link = $(this).data('qrcode');
        $('#qrcode_img').attr('src',qr_link);
        $('#qrcode_link').attr('href',qr_link);
    });
</script>
@endpush