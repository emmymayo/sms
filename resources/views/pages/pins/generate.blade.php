<x-header title="Pins"></x-header>
<div class="row">
@foreach ($pins as $pin)
    <div class="col-md-3 p-3 border " style="border:2px dotted black">
        <h3 class="text-center lead">{{$pin->exam->name}}</h3>
        <p class="text-muted text-center small text-uppercase p-0 m-0">token</p>
        <p class="text-muted text-center ">{{$pin->token}}</p>
    </div>
@endforeach
</div>

    
</body>
</html>