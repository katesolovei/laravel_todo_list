@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Tasks') }}</div>
                    <h5 class="card-header">
                        <a href="{{ route('dashboard.create') }}" class="btn btn-sm btn-outline-primary">Add new
                            task</a>
                    </h5>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <input id="title" type="search" class="form-control @error('search') is-invalid @enderror" name="search" value="{{ old('search') }}" placeholder="Search" >

                        <table class="table table-hover table-borderless">
                            <thead>
                            <th scope="col">Task</th>
                            <th scope="col"></th>
                            </thead>
                            <tbody>
                            @forelse ($tasks as $task)
                                <tr class="table-bordered">
                                    @if ($task->status)
                                        <td scope="row"><a href="{{ route('dashboard.edit', $task->id) }}" style="color: black"><s>{{ $task->title }}</s></a></td>
                                        <td scope="row"><span href="{{ route('dashboard.edit', $task->id) }}" style="color: black">{{ $task->description }}</span></td>
                                    @else
                                        <td scope="row"><a href="{{ route('dashboard.edit', $task->id) }}" style="color: black">{{ $task->title }}</a></td>
                                        <td scope="row"><span href="{{ route('dashboard.edit', $task->id) }}" style="color: black">{{ $task->description }}</span></td>
                                    @endif
                                        <td style="text-align: right;  padding-right: 20px">

                                            <div class="form-group row form-check">
                                                <a href="{{ route('dashboard.create') }}" class="btn btn-sm btn-outline-info">Create subTask</a>
                                                <a href="{{ route('dashboard.edit', $task->id) }}" class="btn btn-sm btn-outline-success">Edit</a>
                                                <a href="" class="btn btn-sm btn-outline-danger">Delete</a>
                                                <div class="form-check">
                                                    <label for="status" class="col-form-label text-md-right">Status</label>

                                                    <select name="status" class="btn-outline">
                                                        <option value="false" selected>todo</option>
                                                        <option value="true">done</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                </tr>
                            @empty
                                <tr>
                                    No Items Added!
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
