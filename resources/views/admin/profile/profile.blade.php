@extends('admin.layouts.app', ['title' => 'پروفایل'])

@section('content')
  <div class="content p-2 p-lg-4">

    <div class="container-fluid">
      <div class="row">
        <x-breadcrumbs :routes="[
            'پنل ادمین' => route('admin.panel.dashboard'),
            'پروفایل' => '',
        ]"></x-breadcrumbs>
      </div>
      <div class="row">
        <div class="card">
          <div class="card-header">
            <h3>ویرایش پروفایل</h3>
          </div>

          <div class="card-body">
            <form method="POST" action="{{ route('user-profile-information.update') }}" class="row justify-content-center">
              @csrf
              @method('PUT')

              <div class="mb-3 col-6">
                <label for="name" class="form-label">نام</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                  name="name" value="{{ old('name', auth()->user()->name) }}" required>

                @error('name')
                  <span class="invalid-feedback" role="alert"></span>
                  <strong>{{ $message }}</strong>
                @enderror
              </div>

              <div class="mb-3 col-6">
                <label for="email" class="form-label">ایمیل</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                  name="email" value="{{ old('email', auth()->user()->email) }}" required>

                @error('email')
                  <span class="invalid-feedback" role="alert"></span>
                  <strong>{{ $message }}</strong>
                @enderror
              </div>

              <button type="submit" class="btn btn-primary w-25">
                ویرایش پروفایل
              </button>
            </form>
          </div>
        </div>

        <div class="card mt-5">
            <div class="card-header">
                <h3>ویرایش رمزعبور</h3>
            </div>

            <div class="card-body">
              <form method="POST" action="{{ route('user-password.update') }}" class="row justify-content-center">
                @csrf
                @method('PUT')

                <div class="mb-3 col-6">
                  <label for="current_password" class="form-label">رمزعبور فعلی</label>
                  <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror"
                    name="current_password" required>

                  @error('current_password')
                    <span class="invalid-feedback" role="alert"></span>
                    <strong>{{ $message }}</strong>
                  @enderror
                </div>

                <div class="mb-3 col-6">
                  <label for="password" class="form-label">رمزعبور جدید</label>
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required>

                  @error('password')
                    <span class="invalid-feedback" role="alert"></span>
                    <strong>{{ $message }}</strong>
                  @enderror
                </div>

                <button type="submit" class="btn btn-primary w-25">
                  ویرایش رمزعبور
                </button>
              </form>
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection
<x-alert type='success'></x-alert>
<x-alert type='error'></x-alert>