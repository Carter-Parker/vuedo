@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-lg-12">
                <h4>Edit Task</h4>

                <div class="container">

                    <form method="post" action="{{ route('tasks.update', $task) }}">

                        @method('patch')

                        @csrf

                        <div class="form-group row">
                            <label for="task_category_id" class="col-md-4 col-form-label text-md-right">Category</label>

                            <div class="col-md-6">
                                <select name="task_category_id" id="task_category_id" class="form-control{{ $errors->has('task_category_id') ? ' is-invalid' : '' }}" required>
                                    <option value="0">[Select Category]</option>
                                    @foreach ($taskCategories as $taskCategory)
                                        <option value="{{ $taskCategory->id }}"{{ old('task_category_id', $task->task_category_id) == $taskCategory->id ? ' selected' : '' }}>{{ $taskCategory->name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('task_category_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('task_category_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title', $task->title) }}" required>

                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Description</label>

                            <div class="col-md-6">
                                <textarea name="description" id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" required>{{ old('description', $task->description) }}</textarea>

                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">Due Date</label>

                            <div class="col-md-6">
                                <input id="due_date@extends('layouts.app', [
    'namePage' => 'News',
    'class' => 'sidebar-mini',
    'activePage' => 'news',
  ])" type="text" class="form-control datepicker{{ $errors->has('due_date') ? ' is-invalid' : '' }}" name="due_date" value="{{ old('due_date', $task->due_date->format('d/m/Y')) }}" required>

                                @if ($errors->has('due_date'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('due_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="archived" class="col-md-4 col-form-label text-md-right">Archived</label>

                            <div class="col-md-6">

                                <div class="col-md-6">
                                    <select name="archived" id="archived" class="form-control{{ $errors->has('archived') ? ' is-invalid' : '' }}" required>
                                        <option value="0"{{ old('archived', $task->archived) == 0 ? ' selected' : '' }}>Not Archived</option>
                                        <option value="1"{{ old('archived', $task->archived) == 1 ? ' selected' : '' }}>Archived</option>
                                    </select>

                                    @if ($errors->has('archived'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('archived') }}</strong>
                                        </span>
                                    @endif
                                </div>

                            </div>
                        </div>

                        <div class="form-group row mb-0">

                            <div class="col-md-6 offset-md-4 form-inline">

                                <a href="{{ route('tasks.index') }}"><button type="button" class="btn btn-danger">Cancel</button></a>
                                &nbsp;
                                <button type="submit" class="btn btn-success">Save</button>

                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
