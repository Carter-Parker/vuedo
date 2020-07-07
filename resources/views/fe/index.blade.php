@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-lg-12">
                <h4>Task List</h4>

                <div class="container">
                    @foreach ($taskCategories as $taskCategory)

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{ $taskCategory->name }}</h3>
                            </div>
                            <div class="card-body">

                                @forelse ($taskCategory->nonArchivedTasks as $task)

                                    <div class="container">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">{{ $task->title }}</h3>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-body">
                                                    {{ $task->description }}
                                                </p>
                                                <p class="card-body">
                                                    <strong>Due Date:</strong>{{ $task->due_date->format('d/y/Y') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                @empty

                                    Category is empty!

                                @endforelse

                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
