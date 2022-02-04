@extends('Admin.template')

@section('content')
    <div class="container mt-5">
        <form action="/admin/store" method="POST">
            @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="card border-0 shadow mb-4">
                    <div class="card-body">
                        <h2>Quiz Details</h2>
                        <div class="form-group mb-4">
                            <input type="text" class="form-control" name="title" placeholder="Title">
                        </div>
                        <div class="form-group mb-4">
                            <input type="text" class="form-control" name="sub_title" placeholder="Sub Title">
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow mb-4">
                    <div class="card-body">
                        <h4>Budget</h4>
                        <div class="mb-4">
                            <input type="text" name="budget_header" class="form-control" placeholder="Header">
                        </div>
                        <div class="mb-4">
                            <input type="text" name="budget_subheader" class="form-control" placeholder="SubHeader">
                        </div>
                        <div class="form-group mb-4">
                            <select name="budget_input_type" class="form-control">
                                <option value="radio">Radio</option>
                                <option value="checkbox">Checkbox</option>
                            </select>
                        </div>
                        <div class="d-flex">
                            @foreach ($budget as $b)
                            <div class="lists m-2">
                                <label for=""> <input type="checkbox" name="budget[]" value="{{ $b->name }}"> {{ $b->name }}</label>
                            </div>
                            @endforeach

                        </div>

                    </div>
                </div>

                <div class="card border-0 shadow mb-4">
                    <div class="card-body">
                        <h4>Areas</h4>
                        <div class="mb-4">
                            <input type="text" name="area_header"  class="form-control" placeholder="Header">
                        </div>
                        <div class="mb-4">
                            <input type="text" name="area_subheader" class="form-control" placeholder="SubHeader">
                        </div>
                        <div class="form-group mb-4">
                            <select name="area_input_type" class="form-control">
                                <option value="radio">Radio</option>
                                <option value="checkbox">Checkbox</option>
                            </select>
                        </div>
                        <div class="d-flex">
                            @foreach ($areas as $a)
                            <div class="lists m-2">
                                <label for=""> <input type="checkbox" name="area[]" value="{{ $a->name }}"> {{ $a->name }}</label>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow mb-4">
                    <div class="card-body">
                        <h4>Purpose</h4>
                        <div class="mb-4">
                            <input type="text" name="purpose_header" class="form-control" placeholder="Header">
                        </div>
                        <div class="mb-4">
                            <input type="text" name="purpose_subheader" class="form-control" placeholder="SubHeader">
                        </div>
                        <div class="form-group mb-4">
                            <select name="purpose_input_type" class="form-control">
                                <option value="radio">Radio</option>
                                <option value="checkbox">Checkbox</option>
                            </select>
                        </div>
                        <div class="d-flex">
                            @foreach ($purpose as $p)
                            <div class="lists m-2">
                                <label for=""> <input type="checkbox" name="purpose[]" value="{{ $p->name }}"> {{ $p->name }}</label>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow mb-4">
                    <div class="card-body">
                        <h4>Completion</h4>
                        <div class="mb-4">
                            <input type="text" name="completion_header" class="form-control" placeholder="Header">
                        </div>
                        <div class="mb-4">
                            <input type="text" name="completion_subheader" class="form-control" placeholder="SubHeader">
                        </div>
                        <div class="form-group mb-4">
                            <select name="completion_input_type" class="form-control">
                                <option value="radio">Radio</option>
                                <option value="checkbox">Checkbox</option>
                            </select>
                        </div>
                        <div class="d-flex">
                            @foreach ($completion as $c)
                            <div class="lists m-2">
                                <label for=""> <input type="checkbox" name="completion[]" value="{{ $c->name }}"> {{ $c->name }}</label>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow mb-4">
                    <div class="card-body">
                        <button class="btn btn-primary" type="submit">Create Quiz</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
@endsection
