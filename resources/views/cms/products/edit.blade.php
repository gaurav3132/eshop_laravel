@extends('layouts.cms')


@section('nav')
    @include('cms.templates.nav')
@endsection

@section('content')

    <main class="row">
        <div class="col-12 bg-white my-3 py-3">
            <div class="row">
                <div class="col-5 mx-auto">
                    <h1>Edit Product </h1>
                </div>
            </div>

            <div class="row">
                <div class="col-5 mx-auto">
                    <form action="{{route('cms.products.update', $product->id)}}" method="post" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control " value="{{old('name',$product->name)}}" required>
                        </div>

                        <div class="mb-3">
                            <label for="summery" class="form-label">Summery</label>
                            <textarea name="summery" id="summery" class="form-control editor"  required>{{old('name',$product->summery)}}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="details" class="form-label">Details</label>
                            <textarea name="details" id="details" class="form-control editor"   required>{{old('details',$product->details)}}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" name="price" id="price" class="form-control " value="{{old('price',$product->price)}}"   required>
                        </div>

                        <div class="mb-3">
                            <label for="discounted_price" class="form-label">Discounted Price</label>
                            <input type="text" name="discounted_price" id="discounted_price" class="form-control "  value="{{old('discounted_price',$product->discounted_price)}}"  >
                        </div>

                        <div class="mb-3">
                            <label for="images">Images</label>
                            <input type="file" name="images[]" id="images" class="form-control" accept="image/*" multiple >
                            <div class="row" id="images-container"></div>
                            <div class="row">
                                @foreach($product->images as $image)
                                    <div class="col-4 mt-3">
                                        <img src="{{ url ('public/images/'.$image) }}" class="img-fluid">
                                    </div>
                                @endforeach
                            </div>

                        </div>



                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select name="category_id" id="category_id" class="form-select" required>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{old('$category_id',$product->category_id) == $category->id ? 'selected' : ''}}  >{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="brand_id" class="form-label">Brand</label>
                            <select name="brand_id" id="brand_id" class="form-select" required>
                                @foreach($brands as $brand)
                                    <option value="{{$brand->id}}" {{old('$brand_id',$product->brand_id) == $brand->id ? 'selected' : ''}}>{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <label for="status" class="form-label">Status</label>
                        <div class="mb-3">
                            <select name="status" id="status" class="form-select" required>
                                <option value="Active" {{old('status',$product->status)=='Active' ? 'selected' : ''}}>Active</option>
                                <option value="Inactive" {{old('status',$product->status)=='Inactive' ? 'selected' : ''}} >Inactive</option>
                            </select>
                        </div>

                        <label for="featured" class="form-label">Featured</label>
                        <div class="mb-3">
                            <select name="featured" id="featured" class="form-select" required>
                                <option value="Yes" {{old('featured',$product->featured)=='Yes' ? 'selected' : ''}}>Yes</option>
                                <option value="No" {{old('featured',$product->featured)=='No' ? 'selected' : ''}} >No</option>
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
