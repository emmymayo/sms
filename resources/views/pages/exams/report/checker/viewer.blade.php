<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Exam: {{$record->exam->name}}</h1>
    <h1>Section: {{$record->section->classes->name.' '.$record->section->name}} </h1>
    
    <h1>Name: {{$record->student->user->name}}</h1>
    <h1>Attendance: {{$attendance}}</h1>
    <table>
    <tr>
        <td>Subject</td>
        <td>Cass1</td>
        <td>Cass2</td>
        <td>Tass</td>
    </tr>

    @foreach($marks as $mark)
    <tr>
        <td>{{$mark->subject->name}}</td>
        <td>{{$mark->cass1}}</td>
        <td>{{$mark->cass2}}</td>
        <td>{{$mark->tass}}</td>
    </tr>
    @endforeach
    
    </table>

    <div>
        @foreach ($record->skills as $skill )
        <p>{{$skill['name']}} - {{$skill['value']}}</p>   
        @endforeach
    </div>
    @if($record->comment1 != null OR $record->comment1 != '' )
    <h1>Comment {{$record->comment1}}</h1>
    @endif
    @if($record->comment2 != null OR $record->comment2 != '' )
    <h1>Comment {{$record->comment2}}</h1>
    @endif
</body>
</html>