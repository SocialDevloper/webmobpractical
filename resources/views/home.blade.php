@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Blog Details') }}</div>
                <br>
                <form action="" method="">  
                <div class="row">
                <div class="col-md-4">
                  <label for="blog" class="col-md-4 col-form-label text-md-right">{{ __('Date : ') }}</label>
                </div>
                <div class="col-md-4">
                <input type="text" id="datepicker" class="form-control">
                </div>
                <div class="col-md-4">
                  <input type="submit" name="submit" class="btn btn-success Search" value="Search">
                  <a class="btn btn-danger" href="{{ route('home') }}">
                    {{ "Cancel" }}
                </a>
                </div>
                </div>
                </form>
                <br>    
                <div class="row">    
                    <div class="col-md-12">
                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Blog Name</th>
                              <th scope="col">Created Date</th>
                            </tr>
                          </thead>
                          <tbody id="tableData">
                                @php
                                $no = 1;      
                                @endphp  
                                @foreach($blogs as $blog)
                                <tr>
                                  <th>{{ $no++ }}</th>
                                  <td>{{ $blog->blog_name }}</td>
                                  <td>{{ date('d-m-Y', strtotime($blog->created_at)) }}</td>
                                </tr>
                                @endforeach
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<script type="text/javascript">
    $(function () {
        $("#datepicker").datepicker({ 
              autoclose: true,
              format: 'yyyy-mm-dd',
        });
    });

    $(document).ready(function($) {
     $(".Search").click(function(e){

      e.preventDefault();
      var date = $("#datepicker").val();
      var _token   = $('meta[name="csrf-token"]').attr('content');

      $.ajax({
         url: '{{ route('blog.filter') }}',
         type: 'POST',
         data:{date:date, _token: _token},
         success: function(response){
          $('#tableData').html(response);
         }
      });  

      });

    });

</script>
@endsection
