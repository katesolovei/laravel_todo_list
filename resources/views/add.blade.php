@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <h5 class="card-header">
                        <div class="card-header">Creating new Task
                            <a style="float: right" href="{{ route('dashboard.index') }}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-arrow-left"></i> Back</a>
                        </div>
                    </h5>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if(session()->has('success'))
                                {{ route('tasks') }}
                        @endif

                        <form method="POST" action="{{ route('dashboard.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="title" class="col-form-label text-md-right">Title</label>

                                <input id="title" type="title" class="form-control @error('title') is-invalid @enderror"
                                       name="title" value="{{ old('email') }}" required autocomplete="title" autofocus>

                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-form-label text-md-right">Description</label>

                                <textarea name="description" id="description" cols="30" rows="10"
                                          class="form-control @error('password') is-invalid @enderror"
                                          autocomplete="description" value="{{ old('description') }}"></textarea>

                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label for="priority" class="col-form-label text-md-right">Priority</label>

                                <select name="priority" class="form-control">
                                    <option value="1" selected>1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                @error('priority')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-2">
                                    <button type="submit" class="btn btn-primary form-control">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
