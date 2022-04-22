@extends('admin.layouts.master')

@section('content')
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-edit bg-blue"></i>
                <div class="d-inline">
                    <h5>Patient Test</h5>
                    <span>Test Today</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="../index.html"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Test Patients</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Today</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

    <div class="row">
        
            <div class="card">
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}
                    </div>
                @endif
                <div class="card-header"><h3>Test List</h3></div>

                <div class="card-body">
                    <table class="table table-striped" style="text-align: center;">
                        <thead class="table-head">
                            <tr>
                                <th>#</th>
                                <th>Doctor</th>
                                <th>Patient</th>
                                <th>Date</th>
                                <th>Make Test</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($bookings as $key => $booking)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$booking->doctor->name}}</td>
                                <td>{{$booking->user->name}}</td>
                                <td>{{$booking->date}}</td>
                                <td>
                                    <!-- Button trigger modal -->
                                    @if(!App\Models\Test::where('id_booking', $booking->id)->exists())
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$booking->id}}">
                                        Write Test
                                    </button>
                                    @else
                                        <a href="{{route('test.show',[$booking->id])}}" class="btn btn-secondary">View Test</a>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <td>There is no appointment today</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        
    </div>
    @include('test.form')

@endsection