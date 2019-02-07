
@foreach ($admin as $item)
    

{{-- {{ $item->nama_admin }} --}}

@if ($item->trashed())
    {{ $item->nama_admin }} tidak ada
@else
    {{ $item->nama_admin }} ada
@endif
<br>
@endforeach