@extends('Admin.template')

@section('content')
<form action="/project/update/{{$data['id']}}" method="POST" enctype="multipart/form-data">
    @csrf
<div class="container mt-5">
    <h1>Edit Project</h1>

    <div class="row">
    <div class="col-md-8">
        <div class="card border-0 shadow p-3 mb-4">
        <div class="form-group mb-4">
        <input type="text" name="name" class="form-control" placeholder="Project Name" value="{{$data['name']}}">
        </div>
        <div class="form-group mb-4">
        <input type="text" name="price" class="form-control" placeholder="Price"  value="{{$data['price']}}">
        </div>
        <div class="form-group mb-4">
            <input type="text" name="size" class="form-control" placeholder="Size"  value="{{$data['size']}}">
        </div>
        <div class="form-group mb-4">
            <input type="text" name="handover" class="form-control" placeholder="Handover"  value="{{$data['handover']}}">
        </div>
        <div class="form-group mb-4">
        <textarea name="content" id="" cols="30" rows="10" class="form-control" placeholder="summary">{{$data['content']}}</textarea>
        </div>
    </div>
        <div class="card border-0 shadow mb-4">
            <div class="card-body">
                <h4>Small Image</h4>
                <div class="form-group mb-4">
                    <?php $gallery = json_decode($data['gallery'], true);?>
                    <img src="/thumbnail/{{$gallery[0]}}" alt="">
                <input type="file" class="form-control" name="gallery[]">
                </div>
                <div class="form-group mb-4">
                    <img src="/thumbnail/{{$gallery[0]}}" alt="">
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
                        <option value="{{$data['budget']}}">{{$data['budget']}}</option>
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
                        <option value="{{$data['area']}}">{{$data['area']}}</option>
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
                        <option value="{{$data['purpose']}}">{{$data['purpose']}}</option>
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
                        <option value="{{$data['completion']}}">{{$data['completion']}}</option>
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
                <img src="/thumbnail/{{$data['image']}}" class="w-100" alt="">
                <input type="file" class="form-control" name="image">
            </div>
        </div>

        <div class="card border-0 shadow mb-4">
            <div class="card-body">
             <button type="submit" class="btn btn-primary w-100" >Update Project</button>
            </div>
        </div>

</div>
</div>

</form>
@endsection
