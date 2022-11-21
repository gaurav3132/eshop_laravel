@extends('layouts.cms')


@section('nav')
    @include('cms.templates.nav')
@endsection

@section('content')

    <main class="row">
        <div class="col-12 bg-white my-3 py-3">
            <div class="row">
                <div class="col ">
                    <h1>Staffs </h1>
                </div>
                <div class="col-auto">
                    <a href="{{route('cms.staffs.create')}}" class="btn btn-outline-primary">
                        <i class="fa-solid fa-add me-2"></i> Add staff
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    @if($staffs->isNotEmpty())
                        <table class="table table-striped table-hover table-sm">
                            <thead>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                            </thead>

                        <tbody>
                        @foreach($staffs as $staff)
                            <tr>
                                <td>{{$staff->name}}</td>
                                <td>{{$staff->email}}</td>
                                <td>{{$staff->phone}}</td>
                                <td>{{$staff->address}}</td>
                                <td>{{$staff->status}}</td>
                                <td>{{ $staff->created_at->format('j M Y h:i A') }}</td>
                                <td>{{$staff->updated_at->format('j M Y h:i A') }}</td>
                                <td>
                                    <form action="{{ route('cms.staffs.destroy',[$staff->id]) }}" method="post">
                                        @method('delete')
                                        @csrf
                                    <a href="{{ route('cms.staffs.edit',[$staff->id]) }}" class="btn btn-outline-success btn-sm me-2"><i class="fa-solid fa-edit me-2"></i>Edit</a>

                                        <button type="submit" class="btn btn-outline-danger btn-sm delete">
                                            <i class="fa-solid fa-times me-2"></i>Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        </table>
                        {{ $staffs->Links() }}
                    @else
                        <h4 class="text-muted fst-italic">No data added yet.</h4>
                    @endif
                </div>
            </div>

        </div>
    </main>

@endsection
