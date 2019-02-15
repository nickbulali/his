@extends('layouts.app')
@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">encounter id</th>
      <th scope="col">order id</th>
      <th scope="col">opened by</th>
      <th scope="col">total</th>
      <th scope="col">status</th>
      <th scope="col">invoice number</th>

    </tr>
  </thead>
  <tbody>
     @foreach($invoices as $invoice)
    <tr>
       
      <td>{{ $invoice->id }}</td>
      <td>{{ $invoice->encounter_id }}</td>
      <td>{{ $invoice->order_id }}</td>
      <td>{{ $invoice->opened_by }}</td>
      <td>{{ $invoice->total }}</td>
      <td>{{ $invoice->status }}</td>
       <td><a href="/invoices/{{ $invoice->id }}">{{ $invoice->invoice_no }}</td>
      
    </tr>
    @endforeach
  </tbody>
</table>
@endsection

