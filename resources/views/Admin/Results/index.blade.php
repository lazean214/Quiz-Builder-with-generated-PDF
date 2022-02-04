@extends('Admin.template')


@section('content')
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-md-4">
            <a href="/admin/create" class="btn btn-primary">Create Quiz</a>
        </div>
        <div class="col-md-4">
            <ul>
                <li><a href="/admin/budget">Budget</a></li>
                <li><a href="/admin/purpose">Purpose</a></li>
                <li><a href="/admin/areas">Areas</a></li>
                <li><a href="/admin/completion">Completion</a></li>
                <li><a href="/admin/result">Result</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
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
                            <td>{{ $d->quiz_id }}</td>
                            <td>{{ $d->budget_id }}</td>
                            <td>{{ $d->completion_id }}</td>
                            <td>{{ $d->areas }}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow p-3">
                <h4>Add Result Option</h4>
            <form action="/admin/{setting}/resultStore" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="Quiz">Quiz</label>
                    <select name="quiz_id" id="" class="form-control">
                        @foreach ($q as $quiz)
                        <option value="{{ $quiz->id}}">{{ $quiz->title}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="budget">Budget</label>
                    <select name="budget_id" id="" class="form-control">
                        @foreach ($b as $bud)
                        <option value="{{ $bud->name}}">{{ $bud->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="purpose">Purpose</label>
                    <select name="purpose_id" id="" class="form-control">
                        @foreach ($p as $bud)
                        <option value="{{ $bud->name}}">{{ $bud->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="areas">Areas</label>
                    @foreach ($a as $bud)
                        {{-- <option value="{{ $bud->id}}">{{ $bud->name}}</option> --}}
                        <div class="form-check">
                            <input class="form-check-input" name="areas[]" type="checkbox" value="{{ $bud->name}}" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                {{ $bud->name}}
                            </label>
                          </div>
                        @endforeach

                </div>
                <div class="form-group mb-3">
                    <label for="purpose">Handover</label>
                    <select name="completion_id" id="" class="form-control">
                        @foreach ($c as $bud)
                        <option value="{{ $bud->name}}">{{ $bud->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="media">Brochure</label>
                    <input type="file" class="form-control" name="media" >
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
        </div>
    </div>

</div>

@endsection
