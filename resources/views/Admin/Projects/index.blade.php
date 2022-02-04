@extends('Admin.template')


@section('content')
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-md-4">
            <a href="/admin/project/create" class="btn btn-primary">Add Project</a>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Project Name</th>
                            <th>Area / Location</th>
                            <th>Completion Data</th>
                            <th>Budget</th>
                            <th>IMAGE</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->area }}</td>
                            <td>{{ $item->completion }}</td>
                            <td>{{ $item->budget }}</td>
                            <td>{{ $item->image }}</td>
                            <td><a href="/project/edit/{{ $item['id']}}">Edit</a></td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
