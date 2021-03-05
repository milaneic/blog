@foreach ($messages as $item)

    <h2>{{ $item->id }}</h2>
    <h2>{{ $item->user_id }}</h2>
    <h2>{{ $item->caption }}</h2>
    <h2>{{ $item->text }}</h2>
@endforeach