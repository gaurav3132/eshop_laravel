@extends('layouts.cms')


@section('nav')
    @include('cms.templates.nav')
@endsection

@section('content')

    <main class="row">
        <div class="col-12 bg-white my-3 py-3">
            <div class="row">
                <div class="col-5 mx-auto">
                    <h1>Edit Profile </h1>
                </div>
            </div>

            <div class="row">
                <div class="col-5 mx-auto">
                    <form action="{{route('cms.password.update')}}" method="post">
                        @method('patch')
                        @csrf
                        <div class="mb-3">
                            <label for="old_password" class="form-label">Old Password</label>
                            <input type="password" name="old_password" id="old_password" class="form-control mb-2"  required>
                        </div>

                        <div class="mb-3">
                            <label for="new_password" class="form-label">New Password</label>
                            <input type="password" name="new_password" id="new_password" class="form-control mb-2"  required>
                        </div>

                        <div class="mb-3">
                            <label for="new_password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control mb-2"  required>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-outline-info">
                                <i class="fa-solid fa-save me-2"></i>Change
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </main>

@endsection

