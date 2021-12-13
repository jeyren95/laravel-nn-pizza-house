@extends("layouts.layout")

@section ("content")
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            Pizza List
        </div>

        <!-- @for($i = 0; $i < count($pizzas); $i++)
          <p>{{ $pizzas[$i]["type"] }}</p>
        @endfor -->

        <p>{{ $name }}</p>
        <p>{{ $age }}</p>

        @foreach($pizzas as $pizza)
          <div>
            {{ $loop->index + 1}}. {{ $pizza["type"] }} - {{ $pizza["base"] }}
            @if($loop->first)
              <span>- first in the loop</span>
            @elseif($loop -> last)
              <span>- last in the loop</span>
            @endif
          </div>
        @endforeach
    </div>
</div>
@endsection

