<!DOCTYPE html>
@extends('layout')

@section('content')
<!--
<div class="mt-5">
 
  <div class="mt-5">
        <a href="{{ route('companies.index', '')}}" class="btn btn-primary btn-sm">Companies</a>
   </div><br/>             
  <div class="mt-5">
        <a href="{{ route('employees.index', '')}}" class="btn btn-primary btn-sm">Employees</a>
   </div><br/>             
<div>
-->



<html>
<head>
<style> 
/*
.div1 {
  width: 300px;
  border: 1px solid blue;
  box-sizing: border-box;
}

.div2 {
  width: 300px;
  border: 1px solid red;
  box-sizing: border-box;
}
*/
body{
	background-color: hsla(89, 43%, 51%, 0.3);
}
.anchorTag:link, a:visited {
  background-color: #f44336;
  color: white;
  padding: 50px 100px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size:30px;
}
.anchorTag:hover, a:active {
  background-color: red;
}

.container1 {
  display: flex;
  justify-content: right;
}
</style>
</head>
<body>
<br>
<h1>Companies And Employees Details</h1>
<div class="mt-5 container1" >
   <a href="{{ route('login') }}" class="btn btn-primary btn-sm">Logout</a>     
</div>
<div class="div1"><a class="anchorTag" href="{{ route('companies.index', '')}}" class="btn btn-primary btn-sm">Companies</a> Click Here..
   </div>
<br><br><br><br>
<div class="div2"><a class="anchorTag" href="{{ route('employees.index', '')}}" class="btn btn-primary btn-sm">Employees</a> Click Here..
 </div>

</body>
</html>





@endsection



