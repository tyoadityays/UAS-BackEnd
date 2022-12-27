@foreach ($agama['data'] as $all)
    {{ $all['nama_agama'] }} <br> 
    {{ $all['created_at'] }} <br>
@endforeach