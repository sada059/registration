<!DOCTYPE html>
<html ng-app="sampleApp">
    <head>
        <meta charset="UTF-8">

        <title> Registration Form </title>
        <link href="{{asset("images/profile.jpg")}}"  rel="shortcut icon" >
        
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="{{asset("css/bootstrap.min.css")}}" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
       
        <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css" />


        <link href="{{asset('css/custom.css')}}" rel="stylesheet" type="text/css" />  
<style>
.f, .btn-large {
    font-weight: 300;
}
.btn-large {
    height: 54px;
    line-height: 54px;
}
.waves-effect {
    position: relative;
    cursor: pointer;
    display: inline-block;
    overflow: hidden;
    user-select: none;
    -webkit-tap-highlight-color: transparent;
    vertical-align: middle;
    z-index: 1;
    transition: .3s ease-out;
}
.f, .btn-large {
    text-decoration: none;
    color: #fff;
    background-color: #26a69a;
    text-align: center;
    letter-spacing: .5px;
    transition: .2s ease-out;
    cursor: pointer;
}
.f, .btn-large, .btn-floating {
    position: relative;
    overflow: hidden;
    background-color: #42c4ac;
    box-shadow: none;
    border: 2px solid #eee;
    box-sizing: content-box;
    color: #eee;
    transition: color .2s, background-color .2s;
}
.f:hover, .btn-large:hover, .btn-floating:hover {
    box-shadow: none;
    background-color: #eee;
    color: #444;
}
a:active, a:hover {
    outline: 0;
}
.btn-large:hover::before {
    transform: skewX(-45deg) translateX(-30px);
}

.f:hover::before, .btn-large:hover::before, .btn-floating:hover::before {
    transform: skewX(-45deg) translateX(-20px);
}

.btn-large::before {
    width: calc(100% + 60px);
    transform: skewX(-45deg) translateX(calc(-100% - 30px));
}

.f::before, .btn-large::before, .btn-floating::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: calc(100% + 40px);
    height: 100%;
    background-color: #eee;
    transform: skewX(-45deg) translateX(calc(-100% - 20px));
    transition: transform .2s;
    z-index: -1;
}

*, *:before, *:after {
    box-sizing: inherit;
}
#loading {
    width: 100%;
    height: 100%;
    position: fixed;
    top: 0;
    left: 0;
    background-color: rgba(0,0,0,.5);
	background-image: url('gifloader.gif');
	background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center; 
    -webkit-transition: all .5s ease;
    z-index: 1000;
    display:none;
}
input:focus ~ .floating-label,
input:not(:focus):valid ~ .floating-label{
  top: 8px;
  bottom: 10px;

  font-size: 11px;
  opacity: 1;
}

.inputText {
  font-size: 14px;
  width: 200px;
  height: 35px;
}

.floating-label {
  position: absolute;
  pointer-events: none;
  left: 20px;
  top: 18px;
  transition: 0.2s ease all;
}
.input-field {
	margin: 0px;
}	
</style>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.7/angular.min.js"></script>
 
<script language='JavaScript' src="{{asset('js/jquery-1.4.3.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-messages/1.5.7/angular-messages.min.js"></script>
</head>
 
<body ng-controller="mainCtrl">
<div id="loading"></div>
        <div id="page" class="hfeed site">
		            <div id="main">
            <!-- Main content -->
       @yield('body')

    </div><!-- /.login-box -->
	
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
				<script src="{{asset('js/material.js')}}" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>

			
<script>
var sampleApp = angular.module('sampleApp', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});
(function() {
  "use strict";
  angular
    .module('sampleApp', ['ngMessages'])
    .controller('mainCtrl', mainCtrl)
    .directive('passwordVerify', passwordVerify);

  function mainCtrl($scope) {
    // Some code
  }

  function passwordVerify() {
    return {
      restrict: 'A', 
      require: '?ngModel', 
      link: function(scope, elem, attrs, ngModel) {
        if (!ngModel) return; 

        scope.$watch(attrs.ngModel, function() {
          validate();
        });

        attrs.$observe('passwordVerify', function(val) {
          validate();
        });

        var validate = function() {
          var val1 = ngModel.$viewValue;
          var val2 = attrs.passwordVerify;

          ngModel.$setValidity('passwordVerify', val1 === val2);
        };
      }
    }
  }
})();
</script>
    </body>
</html>