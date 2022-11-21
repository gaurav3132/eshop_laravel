@extends('layouts.cms')


@section('nav')
    @include('cms.templates.nav')
@endsection

@section('content')

    <main class="row">
        <div class="col-12 bg-white my-3 py-3">
            <div class="row">
                <div class="col ">
                    <h1>Products </h1>
                </div>
                <div class="col-auto">
                    <a href="{{route('cms.products.create')}}" class="btn btn-outline-primary">
                        <i class="fa-solid fa-add me-2"></i> Add Product
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    @if($products->isNotEmpty())
                        <table class="table table-striped table-hover table-sm">
                            <thead>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Discounted_price</th>
                            <th>Thumbnail</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Status</th>
                            <th>Featured</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                            </thead>

                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product->name}}</td>
                                    <td>{{'Rs. '. number_format($product->price)}}</td>
                                    <td>{{!empty($product->discounted_price) ? number_format($product->discounted_price) : 'n/a'}}</td>
                                    <td>
                                        <a href="{{url('public/images/'.$product->thumbnail)}}" target="_blank">
                                            <img src="{{url('public/images/'.$product->thumbnail)}}" class="img-small">
                                        </a>
                                    </td>
                                    <td>{{$product->category->name}}</td>
                                    <td>{{$product->brand->name}}</td>
                                    <td>{{$product->status}}</td>
                                    <td>{{$product->featured}}</td>
                                    <td>{{$product->created_at->format('j M Y h:i A') }}</td>
                                    <td>{{$product->updated_at->format('j M Y h:i A') }}</td>
                                    <td>
                                        <form action="{{ route('cms.products.destroy',[$product->id]) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <a href="{{ route('cms.products.edit',[$product->id]) }}" class="btn btn-outline-success btn-sm me-2"><i class="fa-solid fa-edit me-2"></i>Edit</a>

                                            <button type="submit" class="btn btn-outline-danger btn-sm delete">
                                                <i class="fa-solid fa-times me-2"></i>Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $products->Links() }}
                    @else
                        <h4 class="text-muted fst-italic">No data added yet.</h4>
                    @endif
                </div>
            </div>

        </div>
    </main>

@endsection
