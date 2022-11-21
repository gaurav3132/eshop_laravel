@extends('layouts.cms')


@section('nav')
    @include('cms.templates.nav')
@endsection

@section('content')

    <main class="row">
        <div class="col-12 bg-white my-3 py-3">
            <div class="row">
                <div class="col-5 mx-auto">
                    <h1>Add Staff </h1>
                </div>
            </div>

            <div class="row">
                <div class="col-5 mx-auto">
                    <form action="{{route('cms.staffs.store')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control mb-2" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control mb-2" required >
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
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control mb-2"  required >
                        </div>


                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea name="address" id="address" class="form-control mb-2"  required></textarea>
                        </div>

                        <label for="status" class="form-label">Status</label>
                        <div class="mb-3">
                            <select name="status" id="status" class="form-select" required>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-outline-info">
                                <i class="fa-solid fa-save me-2"></i>Save
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </main>

@endsection
