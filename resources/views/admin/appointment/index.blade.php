@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-edit bg-blue"></i>
                <div class="d-inline">
                    <h5>Doctor</h5>
                    <span>Appointment Time</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="../index.html"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Doctor</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Appointment</li>
                </ol>
            </nav>
        </div>
    </div>
</div>


<!-- time  -->

<div class="container">
    @if(Session::has('message'))
        <div class="alert alert-success">
            {{ Session::get('message') }}
        </div>
    @endif

    @if(Session::has('errmessage'))
        <div class="alert alert-danger">
            {{ Session::get('errmessage') }}
        </div>
    @endif

    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{ $error }}
        </div>

    @endforeach

    <form action="{{route('appointment.check')}}" method="post"> @csrf


    

    <div class="card">

        <div class="card-header">
            <h3>Choose date</h3>
           
        </div>
        <div style="text-align:center; color:green;">
            @if(isset($date))
                Your timetable for:
                {{$date}}
            @endif
        </div>
            
        <div class="card-body">
            <input type="text" placeholder="Click Here To Choose Date" name="date" autocomplete="off" class="form-control datetimepicker-input" id="datepicker" data-toggle="datetimepicker" data-target="#datepicker">
            <br>
            <button type="submit" class="btn btn-primary">Check</button>    
        </div>

    </div>

    </form>

@if(Route::is('appointment.check'))

<form action="{{route('update')}}" method="post">@csrf

    <div class="card">
        <div class="card-header">
            <h3>Choose AM time</h3>
            
            <span style="margin-left: 700px;"> Check all:
        
                <input type="checkbox"  onclick=" for(c in document.getElementsByName('time[]')) document.getElementsByName('time[]').item(c).checked=this.checked ">
            </span>

        </div>
        

        <div class="card-body">
            <table class="table table-striped">
                <input type="hidden" name="appointmentId" value="{{$appointmentId}}" >
                <tbody>
                    <tr>
                        <th>1</th>
                        <td><input type="checkbox" name="time[]" value="6:00AM" @if(isset($times)){{$times->contains('time','6:00AM')?'checked':''}}@endif> 6:00 AM</td>
                        <td><input type="checkbox" name="time[]" value="6:20AM" @if(isset($times)){{$times->contains('time','6:20AM')?'checked':''}}@endif> 6:20 AM</td>
                        <td><input type="checkbox" name="time[]" value="6:40AM" @if(isset($times)){{$times->contains('time','6:40AM')?'checked':''}}@endif> 6:40 AM</td>
                    </tr>
                    <tr>
                        <th>2</th>
                        <td><input type="checkbox" name="time[]" value="7:00AM" @if(isset($times)){{$times->contains('time','7:00AM')?'checked':''}}@endif> 7:00 AM</td>
                        <td><input type="checkbox" name="time[]" value="7:20AM" @if(isset($times)){{$times->contains('time','7:20AM')?'checked':''}}@endif> 7:20 AM</td>
                        <td><input type="checkbox" name="time[]" value="7:40AM" @if(isset($times)){{$times->contains('time','7:40AM')?'checked':''}}@endif> 7:40 AM</td>
                    </tr>
                    <tr>
                        <th>3</th>
                        <td><input type="checkbox" name="time[]" value="8:00AM" @if(isset($times)){{$times->contains('time','8:00AM')?'checked':''}}@endif> 8:00 AM</td>
                        <td><input type="checkbox" name="time[]" value="8:20AM" @if(isset($times)){{$times->contains('time','8:20AM')?'checked':''}}@endif> 8:20 AM</td>
                        <td><input type="checkbox" name="time[]" value="8:40AM" @if(isset($times)){{$times->contains('time','8:40AM')?'checked':''}}@endif> 8:40 AM</td>
                    </tr>
                    <tr>
                        <th>4</th>
                        <td><input type="checkbox" name="time[]" value="9:00AM" @if(isset($times)){{$times->contains('time','9:00AM')?'checked':''}}@endif> 9:00 AM</td>
                        <td><input type="checkbox" name="time[]" value="9:20AM" @if(isset($times)){{$times->contains('time','9:20AM')?'checked':''}}@endif> 9:20 AM</td>
                        <td><input type="checkbox" name="time[]" value="9:40AM" @if(isset($times)){{$times->contains('time','9:40AM')?'checked':''}}@endif> 9:40 AM</td>
                    </tr>
                    <tr>
                        <th>4</th>
                        <td><input type="checkbox" name="time[]" value="10:00AM" @if(isset($times)){{$times->contains('time','10:00AM')?'checked':''}}@endif> 10:00 AM</td>
                        <td><input type="checkbox" name="time[]" value="10:20AM" @if(isset($times)){{$times->contains('time','10:20AM')?'checked':''}}@endif> 10:20 AM</td>
                        <td><input type="checkbox" name="time[]" value="10:40AM" @if(isset($times)){{$times->contains('time','10:40AM')?'checked':''}}@endif> 10:40 AM</td>
                    </tr>
                    <tr>
                        <th>6</th>
                        <td><input type="checkbox" name="time[]" value="11:00AM" @if(isset($times)){{$times->contains('time','11:00AM')?'checked':''}}@endif> 11:00 AM</td>
                        <td><input type="checkbox" name="time[]" value="11:20AM" @if(isset($times)){{$times->contains('time','11:20AM')?'checked':''}}@endif> 11:20 AM</td>
                        <td><input type="checkbox" name="time[]" value="11:40AM" @if(isset($times)){{$times->contains('time','11:40AM')?'checked':''}}@endif> 11:40 AM</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3>Choose PM time</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <tbody>
                        <th>7</th>
                        <td><input type="checkbox" name="time[]" value="2:00PM" @if(isset($times)){{$times->contains('time','2:00PM')?'checked':''}}@endif> 2:00 PM</td>
                        <td><input type="checkbox" name="time[]" value="2:20PM" @if(isset($times)){{$times->contains('time','2:20PM')?'checked':''}}@endif> 2:20 PM</td>
                        <td><input type="checkbox" name="time[]" value="2:40PM" @if(isset($times)){{$times->contains('time','2:40PM')?'checked':''}}@endif> 2:40 PM</td>
                    </tr>
                    <tr>
                        <th>8</th>
                        <td><input type="checkbox" name="time[]" value="3:00PM" @if(isset($times)){{$times->contains('time','3:00PM')?'checked':''}}@endif> 3:00 PM</td>
                        <td><input type="checkbox" name="time[]" value="3:20PM" @if(isset($times)){{$times->contains('time','3:20PM')?'checked':''}}@endif> 3:20 PM</td>
                        <td><input type="checkbox" name="time[]" value="3:40PM" @if(isset($times)){{$times->contains('time','3:40PM')?'checked':''}}@endif> 3:40 PM</td>
                    </tr>
                    <tr>
                        <th>9</th>
                        <td><input type="checkbox" name="time[]" value="4:00PM" @if(isset($times)){{$times->contains('time','4:00PM')?'checked':''}}@endif> 4:00 PM</td>
                        <td><input type="checkbox" name="time[]" value="4:20PM" @if(isset($times)){{$times->contains('time','4:20PM')?'checked':''}}@endif> 4:20 PM</td>
                        <td><input type="checkbox" name="time[]" value="4:40PM" @if(isset($times)){{$times->contains('time','4:40PM')?'checked':''}}@endif> 4:40 PM</td>
                    </tr>
                    <tr>
                        <th>10</th>
                        <td><input type="checkbox" name="time[]" value="5:00PM" @if(isset($times)){{$times->contains('time','5:00PM')?'checked':''}}@endif> 5:00 PM</td>
                        <td><input type="checkbox" name="time[]" value="5:20PM" @if(isset($times)){{$times->contains('time','5:20PM')?'checked':''}}@endif> 5:20 PM</td>
                        <td><input type="checkbox" name="time[]" value="5:40PM" @if(isset($times)){{$times->contains('time','5:40PM')?'checked':''}}@endif> 5:40 PM</td>
                    </tr>
                    <tr>
                        <th>11</th>
                        <td><input type="checkbox" name="time[]" value="6:00PM" @if(isset($times)){{$times->contains('time','6:00PM')?'checked':''}}@endif> 6:00 PM</td>
                        <td><input type="checkbox" name="time[]" value="6:20PM" @if(isset($times)){{$times->contains('time','6:20PM')?'checked':''}}@endif> 6:20 PM</td>
                        <td><input type="checkbox" name="time[]" value="6:40PM" @if(isset($times)){{$times->contains('time','6:40PM')?'checked':''}}@endif> 6:40 PM</td>
                    </tr>
                    <tr>
                        <th>12</th>
                        <td><input type="checkbox" name="time[]" value="7:00PM" @if(isset($times)){{$times->contains('time','7:00PM')?'checked':''}}@endif> 7:00 PM</td>
                        <td><input type="checkbox" name="time[]" value="7:20PM" @if(isset($times)){{$times->contains('time','7:20PM')?'checked':''}}@endif> 7:20 PM</td>
                        <td><input type="checkbox" name="time[]" value="7:40PM" @if(isset($times)){{$times->contains('time','7:40PM')?'checked':''}}@endif> 7:40 PM</td>
                    </tr>
                    <tr>
                        <th>13</th>
                        <td><input type="checkbox" name="time[]" value="8:00PM" @if(isset($times)){{$times->contains('time','8:00PM')?'checked':''}}@endif> 8:00 PM</td>
                        <td><input type="checkbox" name="time[]" value="8:20PM" @if(isset($times)){{$times->contains('time','8:20PM')?'checked':''}}@endif> 8:20 PM</td>
                        <td><input type="checkbox" name="time[]" value="8:40PM" @if(isset($times)){{$times->contains('time','8:40PM')?'checked':''}}@endif> 8:40 PM</td>
                    </tr>
                    <tr>
                        <th>14</th>
                        <td><input type="checkbox" name="time[]" value="9:00PM" @if(isset($times)){{$times->contains('time','9:00PM')?'checked':''}}@endif> 9:00 PM</td>
                        <td><input type="checkbox" name="time[]" value="9:20PM" @if(isset($times)){{$times->contains('time','9:20PM')?'checked':''}}@endif> 9:20 PM</td>
                        <td><input type="checkbox" name="time[]" value="9:40PM" @if(isset($times)){{$times->contains('time','9:40PM')?'checked':''}}@endif> 9:40 PM</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


    <div class="card">
        <div class="card-body">
            <button type="submit" class="btn btn-primary" >Submit</button>
        </div>
    </div>


</div>

</form>

@else
<h3>You appointment time list: {{$myappointments->count()}}</h3>

        <table class="table table-striped">
            <thead>
                <tr>
                    
                    <th>Creator</th>
                    <th>Date</th>
                    <th>View/Update</th>
                </tr>
            </thead>
            <tbody>
                @foreach($myappointments as $appointment)
                <tr>
                    
                    <td>{{$appointment->doctor->name}}</td>
                    <td>{{$appointment->date}}</td>
                    <td>
                        <form action="{{route('appointment.check')}}" method="post"> @csrf
                            <input type="hidden" value="{{$appointment->date}}" name="date" >
                            <button type="submit" class="btn btn-primary">View/Update</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

@endif

<!-- chinh style -->

<style type="text/css">
    input[type="checkbox"] {
        zoom: 1.1;
        
    }
    body {
        font-size: 17px;
    }
</style>


@endsection