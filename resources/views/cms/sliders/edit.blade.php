@extends('layouts.cms')


@section('nav')
    @include('cms.templates.nav')
@endsection

@section('content')

    <main class="row">
        <div class="col-12 bg-white my-3 py-3">
            <div class="row">
                <div class="col-5 mx-auto">
                    <h1>Edit Slider </h1>
                </div>
            </div>

            <div class="row">
                <div class="col-5 mx-auto">
                    <form action="{{ route('cms.sliders.update',$slider->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <img src="{{url('public/images/'.$slider->filename)}}" class="img-fluid">
                        </div>

                        <label for="status" class="form-label">Status</label>
                        <div class="mb-3">
                            <select name="status" id="status" class="form-select" required>
                                <option value="Active" {{ old('status',$slider->status)== 'Active' ? 'selected' : '' }}>Active</option>
                                <option value="Inactive" {{ old('status',$slider->status)== 'Inactive' ? 'selected' : '' }}>Inactive</option>
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
