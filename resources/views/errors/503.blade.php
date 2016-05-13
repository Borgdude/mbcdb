@extends('layouts.warning')

@section('title')
  Down for Maintenance
@endsection

@section('message')
  Uh oh. <br> Looks like we're down for maintenance. <br> Be back soon.
@endsection

@section('buttons')
  <button type="button" class="btn btn-primary" onClick="location='/home'" name="button"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back to Safety</button>
@endsection
