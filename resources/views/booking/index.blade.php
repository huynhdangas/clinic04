@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Your Appointment ({{$appointments->count()}})</div>

                <div class="card-body">
                    <table class="table table-striped" style="text-align: center;">
                        <thead class="table-head">
                            <tr>
                                <th>#</th>
                                <th>Doctor</th>
                                <th>Time</th>
                                <th>Date</th>
                                <th>Created Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($appointments as $key => $appointment)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{ucfirst($appointment->doctor->name)}}</td>
                                <td>{{$appointment->time}}</td>
                                <td>{{$appointment->date}}</td>
                                <td>{{$appointment->created_at}}</td>
                                <td>
                                    @if($appointment->status == 0)
                                    <button class="btn btn-primary">Not visited</button>
                                    @else
                                    <button class="btn btn-success">Checked</button>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <td>You have no appointment</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection