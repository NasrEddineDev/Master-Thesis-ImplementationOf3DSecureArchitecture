@extends('layouts.pgw-pfe3ds')

@section('content')
<style>
.panel-title {display: inline;font-weight: bold;}
.checkbox.pull-right { margin: 0; }
.pl-ziro { padding-left: 0px; }
</style>
<div class="container" style="height: auto;">
  <div class="row align-items-center">
    <div class="col-md-9 ml-auto mr-auto mb-3 text-center">
      <!-- <h3>{{ __('Pgw-pfe3ds Payment gateway') }} </h3> -->
    </div>
    <div class="col-lg-6 col-md-7 col-sm-9 ml-auto mr-auto">
      <form class="form" method="POST" action="{{ route('validation') }}">
        @csrf
        <input name="acsURL" id="acsURL" type="hidden" value="{{$payment->acsURL}}">
        <input name="cardNumber" id="cardNumber" type="hidden" value="{{$payment->cardNumber}}">
        <input name="email" id="email" type="hidden" value="{{$payment->email}}">
        <div class="card card-login card-hidden mb-3">
          <div class="card-header card-header-primary text-center">
            <h4 class="card-title"><strong>{{ __('Transaction confirmation') }}</strong></h4>
          </div>
          
          <div class="card-body">
          <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <h7 class="panel-title">
                        A unique code will be sent to this email: {{$payment->emailHiden}}
                    </h7>
                </div>
                <div class="panel-body">
            <div class="bmd-form-group">
              <div class="input-group">
              <div class="input-group-prepend col-lg-4  col-xs-4 col-md-4"
                style="padding-right:0px;padding-left:0px;">
                  <span class="input-group-text">
                    {{ __('Merchant') }}
                  </span>
                </div>
                <label class="text-left" style="margin-top:10px;font-size:17px;">
                {{$payment->merchant}}</label>
              </div>
            </div>

            <div class="bmd-form-group">
              <div class="input-group">
              <div class="input-group-prepend col-lg-4  col-xs-4 col-md-4"
                style="padding-right:0px;padding-left:0px;">
                  <span class="input-group-text">
                    {{ __('Amount') }}
                  </span>
                </div>
                <label class="text-left" style="margin-top:10px;font-size:17px;">
                {{$payment->total_paid}} DA</label>
              </div>
              </div>

              <div class="bmd-form-group">
              <div class="input-group">
              <div class="input-group-prepend col-lg-4  col-xs-4 col-md-4"
                style="padding-right:0px;padding-left:0px;">
                  <span class="input-group-text">
                    {{ __('Date') }}
                  </span>
                </div>
                <label class="text-left" style="margin-top:10px;font-size:17px;">
                {{now()}}</label>
              </div>
            </div>

            <div class="bmd-form-group">
              <div class="input-group">
                <div class="input-group-prepend col-lg-4  col-xs-4 col-md-4"
                style="padding-right:0px;padding-left:0px;">
                  <span class="input-group-text">
                    {{ __('Card number') }}
                  </span>
                </div>
                <label class="text-left" style="margin-top:10px;font-size:17px;">
                {{$payment->cardNumberHiden}}</label>
              </div>
              </div>

              <div id="codeSection" class="bmd-form-group{{ $errors->has('code') ? ' has-danger' : '' }}"
              style="display: none;">
              <div class="input-group">
                <div class="input-group-prepend col-xs-4 col-md-4"
                style="padding-right:0px;padding-left:0px;">
                  <span class="input-group-text">
                    {{ __('Verification code') }}
                  </span>
                </div>
                <input type="text" name="code" id="code" class="form-control text-center" 
                style="margin-left:3px;" placeholder="{{ __('000000') }}" value="" required>
                <i class="fa fa-lock" style="font-size:24px"></i>
              </div>
              @if ($errors->has('code'))
                <div id="code-error" class="error text-danger pl-3" for="code" style="display: block;">
                  <strong>{{ $errors->first('code') }}</strong>
                </div>
              @endif
                <div id="code-error" class="error text-danger pl-3" for="code" style="display: non;">
                  <strong>{{ $errors->first('code') }}</strong>
                </div>
            </div>

                </div>
            </div>
          </div>
            <br/>
            <div id="first" class="row" style="margin:7px;">
             <button id="sendBtn" class="btn btn-info" 
             style="font-size:15px;width: 100%;" role="button">
             <span class="badge" style="font-size:15px;">
              Send</button>
             </div>

             <div id="second" class="row" style="margin:7px;display: none;">
            <div class="col-lg-6 col-xs-6 col-md-6">
             <button id="resendBtn" class="btn btn-info" 
             style="font-size:15px;width: 100%;" role="button">
             <span class="badge" style="font-size:15px;">
              Re-send</button>
            </div>
            <div class="col-lg-6 col-xs-6 col-md-6">
             <button type="submit" id="validateBtn" class="btn btn-success" 
             style="font-size:15px;width: 100%;" role="button">Validate</button>
             </div>
             </div>

        </div>
      </form>
    </div>
  </div>
</div>
@endsection
@push('js')
<script>
$(document).ready(function(){
 $("#sendBtn").click(function(e){
  e.preventDefault();
   $("#first").hide();
   $("#second").show();
   $("#codeSection").show();
 $.ajax
    ({
        type: "POST",
        url: '/sendcode',
        dataType: 'json',
        contentType: 'application/json',
        async: false,
        //json object to sent to the authentication url
        data: JSON.stringify({"_token": "{{ csrf_token() }}", "acsURL": $('#acsURL').val(), "cardNumber" : $('#cardNumber').val(), "email" : $('#email').val() }),
        success: function (data) {
         console.log(data);
        // alert("Thanks! The code is 12543"); 
        },
        error: function (data) {
         console.log('Error:', data);
        }
    });
 });

 $("#resendBtn").click(function(e){
  e.preventDefault();
 $.ajax
    ({
        type: "POST",
        url: '/sendCode',
        dataType: 'json',
        contentType: 'application/json',
        async: false,
        //json object to sent to the authentication url
        data: JSON.stringify({"_token": "{{ csrf_token() }}", "acsURL": $('#acsURL').val(), "cardNumber" : $('#cardNumber').val(), "email" : $('#email').val() }),
        success: function (data) {
         console.log(data);
        // alert("Thanks! The code is 12543"); 
        },
        error: function (data) {
         console.log('Error:', data);
        }
    });
 }); 
 
 $("#validateBtn").click(function(e){
  e.preventDefault();
  $.ajax
    ({
        type: "POST",
        url: '/validation',
        dataType: 'json',
        contentType: 'application/json',
        async: false,
        //json object to sent CReq
        data: JSON.stringify({
          "_token": "{{ csrf_token() }}", 
          "acsURL": "{{$payment->acsURL}}", 
          "code": $('#code').val(), 
          "cardNumber" : $('#cardNumber').val() }),
        success: function (data) {
          if (data.status){
            window.location.href = data.return_url
          }else{
            $('#code-error').css('display', 'block');
            $('#code-error strong').text(data.message);
          }
         console.log(data);
        // alert("Thanks! The code is 12543"); 
        },
        error: function (data) {
         console.log('Error:', data);
        }
    });
 });

});
</script>
@endpush