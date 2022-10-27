@extends('layout')
@section('content')
@include('navbar')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="container">
<h1>Products List</h1>

<hr>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <div class="card card-warning">
        <div class="card-header">
        <class="card-title">
        @if(checkPermission(['superadmin']))
        <a class="btn btn-primary btn-sm float-right" href="{{url('items/create')}}" role="button">Add New Products</a>
        @endif
        <div class="row">
          <div class="col-sm-6">
        <form action="{{ route('items.index') }}" method="GET">
          <input type="text" class="form-control" placeholder="Search by name" name="search">
          </div>
          <div class="col-sm-6">
          <button class="btn btn-primary" type="submit">Search</button>
          
          <form action="{{ route('items.index') }}">
          <button class="btn btn-success" type="submit">Refresh</button>
</form>
</div>
      </form>
</div>
<div class="card-body">
@if(checkPermission(['superadmin']))
<button style="margin-bottom: 10px" class="btn btn-primary delete_all" data-url="{{ url('itemsDeleteAll') }}">Delete All Selected</button>
@endif
  <table class="table table-striped">
    <thead>
        <tr>
        <th width="50px"><input type="checkbox" id="master"></th>
        <th>No</th>
          <th>SKU</th>
          <th>Product Name</th>
          <th>Category</th>
          <th>Description</th>
          <th> Manuf Date</th>
          <th>Exp Date</th>
          @if(checkPermission(['superadmin']))
          <th colspan="2">Action</th>
          @endif
        </tr>
    </thead>
    <tbody>
        @foreach($items as $key => $test)
        <tr>
        <td><input type="checkbox" class="sub_chk" data-id="{{$test->id}}"></td>
        <td>{{ ++$key }}</td>
            <td>{{$test->sku}}</td>
            <td>{{$test->product_name}}</td>
            <td>{{$test->category}}</td>
            <td>{{$test->description}}</td>
            <td>{{$test->manuf_date}}</td>
            <td>{{$test->exp_date}}</td>  
            @if(checkPermission(['superadmin']))
            <td><a href="{{ route('items.edit', $test->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('items.destroy', $test->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
            
            @endif
        </tr>
        @endforeach
    </tbody>
  </table>
<div>

<script type="text/javascript">
    $(document).ready(function () {


        $('#master').on('click', function(e) {
         if($(this).is(':checked',true))  
         {
            $(".sub_chk").prop('checked', true);  
         } else {  
            $(".sub_chk").prop('checked',false);  
         }  
        });


        $('.delete_all').on('click', function(e) {


            var allVals = [];  
            $(".sub_chk:checked").each(function() {  
                allVals.push($(this).attr('data-id'));
            });  


            if(allVals.length <=0)  
            {  
                alert("Please select row.");  
            }  else {  


                var check = confirm("Are you sure you want to delete this row?");  
                if(check == true){  


                    var join_selected_values = allVals.join(","); 


                    $.ajax({
                        url: $(this).data('url'),
                        type: 'DELETE',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: 'ids='+join_selected_values,
                        success: function (data) {
                            if (data['success']) {
                                $(".sub_chk:checked").each(function() {  
                                    $(this).parents("tr").remove();
                                });
                                alert(data['success']);
                            } else if (data['error']) {
                                alert(data['error']);
                            } else {
                                alert('Whoops Something went wrong!!');
                            }
                        },
                        error: function (data) {
                            alert(data.responseText);
                        }
                    });


                  $.each(allVals, function( index, value ) {
                      $('table tr').filter("[data-row-id='" + value + "']").remove();
                  });
                }  
            }  
        });


        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]',
            onConfirm: function (event, element) {
                element.trigger('confirm');
            }
        });


        $(document).on('confirm', function (e) {
            var ele = e.target;
            e.preventDefault();


            $.ajax({
                url: ele.href,
                type: 'DELETE',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (data) {
                    if (data['success']) {
                        $("#" + data['tr']).slideUp("slow");
                        alert(data['success']);
                    } else if (data['error']) {
                        alert(data['error']);
                    } else {
                        alert('Whoops Something went wrong!!');
                    }
                },
                error: function (data) {
                    alert(data.responseText);
                }
            });


            return false;
        });
    });
</script>
@endsection