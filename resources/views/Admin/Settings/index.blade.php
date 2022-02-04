@extends('Admin.template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
               <h2>Settings: {{ strtoupper(Request::segment(2)) }}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card p-2 border-0 shadow">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>Name</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->name}}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            </div>
            <div class="col-md-6">
                <div class="card p-2 border-0 shadow">
                    <form action="/admin/{{Request::segment(2)}}/store" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-4">
                            <input type="text" name="name" class="form-control" placeholder="Enter {{Request::segment(2)}}">
                        </div>
                        <div class="form-group mb-4">
                            <select name="input_type" class="form-control">
                                <option value="radio">Radio</option>
                                <option value="checkbox">Checkbox</option>
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label for="">Icon Image (Optional)</label>
                            <input type="file" class="form-control" name="image" placeholder="Icon Image">
                        </div>

                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
