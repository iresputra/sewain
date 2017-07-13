@extends('templates.header')

@section('konten')
</div>  

@foreach($datas as $data)
@if(Auth::user()->id == $data->id )





<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<div class="container" style="padding-top: 60px;">
  <h1 class="page-header">Profile</h1>
  <div class="row">
    <!-- left column -->
    <!-- edit form column -->
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info" style="float: none;  margin: 0 auto;">
      <br><br>
      
      <form class="form-horizontal" role="form">
          <div class="form-group">
          <label class="col-lg-3 control-label">User ID:</label>
          <div class="col-lg-8">
            <input class="form-control" value="{{$data->id}}" type="text" readonly>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">First name:</label>
          <div class="col-lg-8">
            <input class="form-control" value="{{$data->name}}" type="text" readonly>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Email:</label>
          <div class="col-lg-8">
            <input class="form-control" value="{{$data->email}}" type="text" readonly>
          </div>
        </div>
         <div class="form-group">
          <label class="col-lg-3 control-label">No KTP:</label>
          <div class="col-lg-8">
            <input class="form-control" value="{{$data->no_ktp}}" type="text" readonly>
          </div>
        </div>
         <div class="form-group">
          <label class="col-lg-3 control-label">No HP:</label>
          <div class="col-lg-8">
            <input class="form-control" value="{{$data->no_hp}}" type="text" readonly>
          </div>
        </div> 
       
        
            
        <!--<div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
            <input class="btn btn-primary" value="Save Changes" type="button">
            <span></span>
            <input class="btn btn-default" value="Cancel" type="reset">
          </div>
        </div>-->
      </form>
    </div>
  </div>
</div>

@endif

@endforeach
@endsection