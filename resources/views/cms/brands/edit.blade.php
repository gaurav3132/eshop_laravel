@extends('layouts.cms')


@section('nav')
    @include('cms.templates.nav')
@endsection

@section('content')

    <main class="row">
        <div class="col-12 bg-white my-3 py-3">
            <div class="row">
                <div class="col-5 mx-auto">
                    <h1>Edit Brands </h1>
                </div>
            </div>

            <div class="row">
                <div class="col-5 mx-auto">
                    <form action="{{route('cms.brands.update',[$brand->id])}}" method="post">
                        @method('patch')
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control mb-2" value="{{old('name',$brand->name)}}" required>
                        </div>

                        <label for="status" class="form-label">Status</label>
                        <div class="mb-3">
                            <select name="status" id="status" class="form-select" required>
                                <option value="Active" {{ old('status',$brand->status)=='Active' ? 'selected' : '' }}>Active</option>
                                <option value="Inactive" {{ old('status',$brand->status)=='Inactive' ? 'selected' : '' }}>Inactive</option>
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
