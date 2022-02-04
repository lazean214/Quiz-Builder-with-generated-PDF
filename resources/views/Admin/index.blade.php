@extends('Admin.template')


@section('content')
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-md-4">
            <a href="/admin/create" class="btn btn-primary">Create Quiz</a>
        </div>
        {{-- <div class="col-md-4">
            <ul>
                <li><a href="/admin/budget">Budget</a></li>
                <li><a href="/admin/purpose">Purpose</a></li>
                <li><a href="/admin/areas">Areas</a></li>
                <li><a href="/admin/completion">Completion</a></li>
                <li><a href="/admin/result">Result</a></li>
            </ul>
        </div> --}}
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Quiz Name</th>
                            <th>Sub title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                        <tr>
                            <td>{{ $d->id }}</td>
                            <td>{{ $d->title }}</td>
                            <td>{{ $d->sub_title }}</td>
                            <td>{{ $d->created_at }}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
