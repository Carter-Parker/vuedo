@extends('layouts.app')

@section('content')

    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tasks</h4>
                        <a class="btn btn-primary btn-round text-white pull-right" href="{{ route('tasks.create') }}">Add
                            New</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered data-table" id="datatable">
                                <thead class=" text-primary">
                                <tr>
                                    <th>
                                        Title
                                    </th>
                                    <th>
                                        Category
                                    </th>
                                    <th>
                                        Due Date
                                    </th>
                                    <th>
                                        Archived
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($tasks as $task)

                                    <tr>
                                        <td>
                                            <a href="{{ route('tasks.edit', $task) }}">{{ $task->title }}</a>
                                        </td>

                                        <td>{{ $task->task_category_name }}</td>

                                        <td data-sort="{{ $task->due_date->format('Y-m-d') }}">
                                            {{ $task->due_date->format('d/m/Y') }}
                                        </td>

                                        <td>{{ $task->archived ? 'Yes' : 'No'}}</td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
