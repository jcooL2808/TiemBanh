@extends('admin.app')

@section('title', 'Profile')

@section('contents')

<hr />

<form method="GET" enctype="multipart/form-data" id="profile_setup_frm" action="/profile/update">
    @csrf
    <div class="row">
        <div class="col-md-12 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Chỉnh Sửa Thông Tin</h4>
                </div>
                <div class="row" id="res"></div>
                <div class="row mt-2">

                    <div class="col-md-6">
                        <label class="labels">Tên</label>
                        <input type="text" name="name" class="form-control" placeholder="first name"
                            value="{{ auth()->user()->name }}">
                    </div>
                    <div class="col-md-6">
                        <label class="labels">Email</label>
                        <input type="text" name="email" disabled class="form-control"
                            value="{{ auth()->user()->email }}" placeholder="Email">
                    </div>
                </div>

                <div class="mt-5 text-center"><button id="btn" class="btn btn-primary profile-button"
                        type="submit">Lưu</button></div>
            </div>
        </div>
    </div>
</form>
@endsection