@extends('layout')
@section('content')
@include('navbar')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="container">
<h1></h1>

<hr>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <div class="well well-lg">
  @foreach($items as $comp)
    <h2>
    Company Name: {{$comp->company_name}}
    </h2><br>
    <p>
        Phone:  {{$comp->phone_number}}<br>
        Address: {{$comp->address}}<br>
        KRA Pin: {{$comp->kra_pin}}<br>
        VAT No: {{$comp->vat_no}}<br>
    </p><br>
    <p><a href="company.edit/{{ $comp->id }}" class="btn btn-primary">Update Records</a></p><br>

  </div>
  @endforeach
  @endsection