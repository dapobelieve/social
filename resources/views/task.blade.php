@foreach($tasks as $task)
 <h1>{{ $task->name }} </h1><small>posted by:{{ $task->todolist }} </small>
 <p>{{ $task->description }}</p>
 @endforeach