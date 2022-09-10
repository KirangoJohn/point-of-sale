@extends('layout') 
@section('content')
@include('navbar')
<div class="container">
<h1>Add Company Details</h1>
<div><a class="btn btn-primary btn-lg float-right" href="{{url('/company')}}" role="button">View Company Details</a></div>
<hr>
       
<form method="post" action="{{ route('company.store') }}">
@csrf  
    <div class="row">
            <div class="col-sm-6">
            <div class="form-group"> 
            <label for="item">Company Name:</label>
              <input type="text" class="form-control " name="company_name" required/>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
              <label for="sku">Address:</label>
              <input type="text" class="form-control" name="address" />
          </div>
        </div>
        <div class="col-sm-6">
                <div class="form-group">
              <label for="description">Tel:</label>
              <input type="text" class="form-control" name="phone_number" required/>
          </div>
        </div>
        <div class="col-sm-6">
                <div class="form-group">
              <label for="manuf_date">VAT NO:</label>
              <input type="text" class="form-control" name="vat_no"/>
          </div>
        </div>
        <div class="col-sm-6">
                <div class="form-group">
              <label for="exp_date">KRA PIN:</label>
              <input type="text" class="form-control" name="kra_pin"/>
          </div>
        </div>
</div>
        <button type="submit" class="btn btn-primary">Add Company</button>

</form>
</div>
</div>
</div>

@endsection