<div class="card-header">
    <h4 class="text-center">{{ $steps[$step]['name']}}</h4>
</div>

<div class="card-header">
    <ul id="progress">
        @foreach ($steps as $key => $item)
        <li @if($step == $key) class="active" @elseif($step > $key) class="done" onclick="location='{{ route('installer.' . $item['route']) }}'" @endif><i class="{{ $item['icon'] }}"></i></li>
        @endforeach
    </ul>
</div>