@extends('admin.layouts.master')

@section('content')
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-edit bg-blue"></i>
                <div class="d-inline">
                    <h5>Test Detail</h5>
                    <span>Test</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="../index.html"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Test</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Test Detail</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

    <div class="row">
        
            <div class="card" style="width: 80%; margin: auto;">

            

                <div class="card-header">
                    <h3>Test Details</h3>
                </div>
                    
                <div class="card-body">
                    <p>Date: {{$test->created_at}}</p>
                    <p>Date: {{$test->test_result}}</p>
                    
                </div>
            </div>
        
    </div>




@endsection