@extends('admin.includes.master')
@section('main-content')
<h4>Dashboard</h4>
<script>
   var date = new Date();
var dayOfWeek = date.getDay();

var dayNames = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
var dayName = dayNames[dayOfWeek];

console.log(dayName);
</script>
@endsection