@php
  $no = 1;  
@endphp
@if(!$blogs->isEmpty())
@foreach ($blogs as $blog)

<tr>
  <td>{{ $no++ }}</td>
  <td>{{ $blog->blog_name }}</td>
  <td>{{ date('d-m-Y', strtotime($blog->created_at)) }}</td>
</td>
@endforeach
@else
<tr>
  <td colspan="3" class="text-center">No Records Found.</td>
</tr>
@endif