@extends('agent.agent_dashboard')
@section('agent')

@php
    $id = Auth::user()->id;
    $agentId = App\Models\User::find($id);
    $status = $agentId->status;
@endphp

<div class="page-content">



    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">

        @if ($status === 'active')
            <h4 class="mb-3 mb-md-0">Welcome to Dashboard. Your account as Agent is <span class="text-success">Active</span></h4>
        @else
            <h4>Hi there! Your account as Agent is <span class="text-danger">Inactive</span></h4>
            <p class="text-muted">Please contact <span class="text-danger">administrator</span> get your acount activated.</p>
        @endif
    </div>

</div>

@endsection