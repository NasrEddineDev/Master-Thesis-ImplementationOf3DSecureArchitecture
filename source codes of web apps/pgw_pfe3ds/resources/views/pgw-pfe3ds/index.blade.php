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
      <form class="form" method="POST" action="{{ route('pgw-pfe3ds') }}">
        @csrf
        @if(!empty($payment))
        <input name="merchant" type="hidden" value="{{$payment->merchant}}">
        <input name="merchant_website" type="hidden" value="{{$payment->merchant_website}}">
        <input name="total_paid" type="hidden" value="{{$payment->total_paid}}">
        <input name="return_url" type="hidden" value="{{$payment->return_url}}">
        <input name="cancel_url" type="hidden" value="{{$payment->cancel_url}}">
        @endif
        <div class="card card-login card-hidden mb-3">
          <div class="card-header card-header-primary text-center">
            <h4 class="card-title"><strong>{{ __('Merchant information') }}</strong></h4>

            <div class="row text-white">
             <label class="col-sm-3 text-white">
             {{ __('Merchant') }} :</label>
             <label class="col-sm-3 text-left text-white">
             {{$payment->merchant ?? ''}}</label>
             <label class="col-sm-3 text-white">
             {{ __('Amount') }} :</label>
             <label class="col-sm-3 text-left text-white">
             {{$payment->total_paid ?? ''}} DA</label>
            </div>           
            <div class="row">
             <label class="col-sm-3 text-white">
             {{ __('Web site') }} :</label>
             <label class="col-sm-5 text-left text-white">
             {{$payment->merchant_website ?? ''}}</label>
            </div>
          </div>
          
          <div class="card-body">
          <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <h3 class="panel-title">
                        Payment Details
                    </h3>
                </div>
                <div class="panel-body">
                    <!-- <form role="form"> -->
            
            <div class="bmd-form-group{{ $errors->has('cardholderName') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend col-xs-4 col-md-4"
                style="padding-right:0px;padding-left:0px;">
                  <span class="input-group-text">
                    {{ __(' Card Owner') }}
                  </span>
                </div>
                <input type="text" name="cardholderName" class="form-control" placeholder="{{ __('cardholder owner name') }}" value="{{ old('cardholderName') }}" required>
                <i class="fa fa-user" style="font-size:24px"></i>
              </div>
              @if ($errors->has('cardholderName'))
                <div id="cardholderName-error" class="error text-danger pl-3" for="cardholderName" style="display: block;">
                  <strong>{{ $errors->first('cardholderName') }}</strong>
                </div>
              @endif
            </div>

            <div class="bmd-form-group{{ $errors->has('cardNumber') ? ' has-danger' : '' }}"
             style="margin-top:20px;margin-bottom:20px">
              <div class="input-group">
                <div class="input-group-prepend col-xs-4 col-md-4"
                style="padding-right:0px;padding-left:0px;">
                  <span class="input-group-text">
                    {{ __(' Card Number') }}
                  </span>
                </div>
                <input type="text" name="cardNumber" id="cardNumber" 
                class="form-control" 
                placeholder="{{ __('0000-0000-0000-0000') }}" 
                value="____-____-____-____" 
                pattern="^[0-9]{4}-?[0-9]{4}-?[0-9]{4}-?[0-9]{4}$"
                 required>
                <i class="fa fa-credit-card" style="font-size:24px"></i>
              </div>
              @if ($errors->has('cardNumber'))
                <div id="cardNumber-error" class="error text-danger pl-3" for="cardNumber" style="display: block;">
                  <strong>{{ $errors->first('cardNumber') }}</strong>
                </div>
              @endif
            </div>

            <div class="col-xs-7 col-md-7 bmd-form-group{{ $errors->has('cardExpiryDate') ? ' has-danger' : '' }}" 
            style="padding-right:0px;padding-left:0px;float:left;">
              <div class="input-group">
                <div class="input-group-prepend col-xs-7 col-md-7"
                style="padding-right:0px;padding-left:0px;">
                  <span class="input-group-text">
                    {{ __(' EXPIRY DATE') }}
                  </span>
                </div>
                <input type="text" name="cardExpiryDate" id="cardExpiryDate" class="form-control" 
                placeholder="{{ __('MM/YY') }}" 
                value="__/__" 
                pattern="^[0-9]{2}/?[0-9]{2}$"
                required>
                <i class="fa fa-calendar" style="font-size:24px"></i>
              </div>
              @if ($errors->has('cardExpiryDate'))
                <div id="cardExpiryDate-error" class="error text-danger pl-3" for="cardExpiryDate" style="display: block;">
                  <strong>{{ $errors->first('cardExpiryDate') }}</strong>
                </div>
              @endif
            </div>

            <div class="col-xs-5 col-md-5 bmd-form-group{{ $errors->has('cvCode') ? ' has-danger' : '' }}"
            style="padding-right:0px;padding-left:0px;float:left;">
              <div class="input-group">
                <div class="input-group-prepend col-xs-5 col-md-5"
                style="padding-right:0px;padding-left:0px;">
                  <span class="input-group-text">
                    {{ __('CODE') }}
                  </span>
                </div>
                <input type="password" name="cvCode" id="cvCode" class="form-control" 
                placeholder="{{ __('CVC2/CVV2') }}" 
                value="___" 
                pattern="^[0-9]{3}$"
                required>
                <i class="fa fa-puzzle-piece" style="font-size:24px"></i>
              </div>
              @if ($errors->has('cvCode'))
                <div id="cvCode-error" class="error text-danger pl-3" for="cvCode" style="display: block;">
                  <strong>{{ $errors->first('cvCode') }}</strong>
                </div>
              @endif
            </div>


            <!-- </form> -->
                </div>
            </div>
          </div>
            <br/>
            <div class="row" style="margin:7px;">
            <div class="col-lg-6 col-xs-6 col-md-6">
             <button class="btn btn-info" 
             style="font-size:15px;width: 100%;" role="button">
              Submit</button>
            </div>
            <div class="col-lg-6 col-xs-6 col-md-6">
             <a href="{{$payment->cancel_url ?? ''}}" class="btn btn-danger" 
             style="font-size:15px;width: 100%;" role="button">Cancel</a>
             </div>
             </div>

        </div>
      </form>
    </div>
  </div>
</div>

<script>
window.onload = function() {
   MaskedInput({
      elm: document.getElementById('cardNumber'), // select only by id
      format: '____-____-____-____',
      separator: '-'
   });
  
     MaskedInput({
      elm: document.getElementById('cardExpiryDate'), // select only by id
      format: '__/__',
      separator: '/'
   });
  
     MaskedInput({
      elm: document.getElementById('cvCode'), // select only by id
      format: '___',
      separator: ''
   });
};

// masked_input_1.4-min.js
// angelwatt.com/coding/masked_input.php
(function(a){a.MaskedInput=function(f){if(!f||!f.elm||!f.format){return null}if(!(this instanceof a.MaskedInput)){return new a.MaskedInput(f)}var o=this,d=f.elm,s=f.format,i=f.allowed||"0123456789",h=f.allowedfx||function(){return true},p=f.separator||"/:-",n=f.typeon||"_YMDhms",c=f.onbadkey||function(){},q=f.onfilled||function(){},w=f.badkeywait||0,A=f.hasOwnProperty("preserve")?!!f.preserve:true,l=true,y=false,t=s,j=(function(){if(window.addEventListener){return function(E,C,D,B){E.addEventListener(C,D,(B===undefined)?false:B)}}if(window.attachEvent){return function(D,B,C){D.attachEvent("on"+B,C)}}return function(D,B,C){D["on"+B]=C}}()),u=function(){for(var B=d.value.length-1;B>=0;B--){for(var D=0,C=n.length;D<C;D++){if(d.value[B]===n[D]){return false}}}return true},x=function(C){try{C.focus();if(C.selectionStart>=0){return C.selectionStart}if(document.selection){var B=document.selection.createRange();return -B.moveStart("character",-C.value.length)}return -1}catch(D){return -1}},b=function(C,E){try{if(C.selectionStart){C.focus();C.setSelectionRange(E,E)}else{if(C.createTextRange){var B=C.createTextRange();B.move("character",E);B.select()}}}catch(D){return false}return true},m=function(D){D=D||window.event;var C="",E=D.which,B=D.type;if(E===undefined||E===null){E=D.keyCode}if(E===undefined||E===null){return""}switch(E){case 8:C="bksp";break;case 46:C=(B==="keydown")?"del":".";break;case 16:C="shift";break;case 0:case 9:case 13:C="etc";break;case 37:case 38:case 39:case 40:C=(!D.shiftKey&&(D.charCode!==39&&D.charCode!==undefined))?"etc":String.fromCharCode(E);break;default:C=String.fromCharCode(E);break}return C},v=function(B,C){if(B.preventDefault){B.preventDefault()}B.returnValue=C||false},k=function(B){var D=x(d),F=d.value,E="",C=true;switch(C){case (i.indexOf(B)!==-1):D=D+1;if(D>s.length){return false}while(p.indexOf(F.charAt(D-1))!==-1&&D<=s.length){D=D+1}if(!h(B,D)){c(B);return false}E=F.substr(0,D-1)+B+F.substr(D);if(i.indexOf(F.charAt(D))===-1&&n.indexOf(F.charAt(D))===-1){D=D+1}break;case (B==="bksp"):D=D-1;if(D<0){return false}while(i.indexOf(F.charAt(D))===-1&&n.indexOf(F.charAt(D))===-1&&D>1){D=D-1}E=F.substr(0,D)+s.substr(D,1)+F.substr(D+1);break;case (B==="del"):if(D>=F.length){return false}while(p.indexOf(F.charAt(D))!==-1&&F.charAt(D)!==""){D=D+1}E=F.substr(0,D)+s.substr(D,1)+F.substr(D+1);D=D+1;break;case (B==="etc"):return true;default:return false}d.value="";d.value=E;b(d,D);return false},g=function(B){if(i.indexOf(B)===-1&&B!=="bksp"&&B!=="del"&&B!=="etc"){var C=x(d);y=true;c(B);setTimeout(function(){y=false;b(d,C)},w);return false}return true},z=function(C){if(!l){return true}C=C||event;if(y){v(C);return false}var B=m(C);if((C.metaKey||C.ctrlKey)&&(B==="X"||B==="V")){v(C);return false}if(C.metaKey||C.ctrlKey){return true}if(d.value===""){d.value=s;b(d,0)}if(B==="bksp"||B==="del"){k(B);v(C);return false}return true},e=function(C){if(!l){return true}C=C||event;if(y){v(C);return false}var B=m(C);if(B==="etc"||C.metaKey||C.ctrlKey||C.altKey){return true}if(B!=="bksp"&&B!=="del"&&B!=="shift"){if(!g(B)){v(C);return false}if(k(B)){if(u()){q()}v(C,true);return true}if(u()){q()}v(C);return false}return false},r=function(){if(!d.tagName||(d.tagName.toUpperCase()!=="INPUT"&&d.tagName.toUpperCase()!=="TEXTAREA")){return null}if(!A||d.value===""){d.value=s}j(d,"keydown",function(B){z(B)});j(d,"keypress",function(B){e(B)});j(d,"focus",function(){t=d.value});j(d,"blur",function(){if(d.value!==t&&d.onchange){d.onchange()}});return o};o.resetField=function(){d.value=s};o.setAllowed=function(B){i=B;o.resetField()};o.setFormat=function(B){s=B;o.resetField()};o.setSeparator=function(B){p=B;o.resetField()};o.setTypeon=function(B){n=B;o.resetField()};o.setEnabled=function(B){l=B};return r()}}(window));
</script>

@endsection
