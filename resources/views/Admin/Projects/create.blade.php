@extends('Admin.template')

@section('content')
<form action="/project/store" method="POST" enctype="multipart/form-data">
    @csrf
<div class="container mt-5">
    <h1>New Project</h1>
    <div class="row">
    <div class="col-md-8">
        <div class="card border-0 shadow p-3 mb-4">
        <div class="form-group mb-4">
        <input type="text" name="name" class="form-control" placeholder="Project Name">
        </div>
        <div class="form-group mb-4">
        <input type="text" name="price" class="form-control" placeholder="Price">
        </div>
        <div class="form-group mb-4">
            <input type="text" name="size" class="form-control" placeholder="Size">
        </div>
        <div class="form-group mb-4">
            <input type="text" name="handover" class="form-control" placeholder="Handover">
        </div>
        <div class="form-group mb-4">
        <textarea name="content" id="" cols="30" rows="10" class="form-control" placeholder="summary"></textarea>
        </div>
    </div>
        <div class="card border-0 shadow mb-4">
            <div class="card-body">
                <h4>Small Image</h4>
                <div class="form-group mb-4">
                <input type="file" class="form-control" name="gallery[]">
                </div>
                <div class="form-group mb-4">
                    <input type="file" class="form-control" name="gallery[]">
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow mb-4 p-3">
            <h4>Language</h4>
            <select name="language" id="" class="form-control">
                <option value="en">English</option>
                <option value="ru">Rusian</option>
            </select>
        </div>
        <div class="card border-0 shadow mb-4">
            <div class="card-body">
                <h4>Budget</h4>
                <label for="">Select Budget</label>
                <div class="form-group mb-4">
                    <select name="budget" class="form-control">

                        @foreach ($budget as $b)
                        <option value="{{ $b->name }}">{{ $b->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow mb-4">
            <div class="card-body">
                <h4>Areas</h4>
                <div class="form-group mb-4">
                    <select name="area" class="form-control">

                        @foreach ($areas as $b)
                        <option value="{{ $b->name }}">{{ $b->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="card border-0 shadow mb-4">
            <div class="card-body">
                <h4>Purpose</h4>
                <div class="form-group mb-4">
                    <select name="purpose" class="form-control">

                        @foreach ($purpose as $b)
                        <option value="{{ $b->name }}">{{ $b->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow mb-4">
            <div class="card-body">
                <h4>Moving Date</h4>
                <div class="form-group mb-4">
                    <select name="completion" class="form-control">

                        @foreach ($completion as $b)
                        <option value="{{ $b->name }}">{{ $b->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="card border-0 shadow mb-4">
            <div class="card-body">
                <h4>Big image</h4>
                <input type="file" class="form-control" name="image">
            </div>
        </div>

        <div class="card border-0 shadow mb-4">
            <div class="card-body">
             <button type="submit" class="btn btn-primary w-100" >Add Project</button>
            </div>
        </div>

</div>
</div>

</form>
@endsection
