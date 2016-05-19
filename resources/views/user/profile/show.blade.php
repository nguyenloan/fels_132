@extends('layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            @include('user.profile.partial')
            <div class="col-lg-9 user-content">
                <div class="col-lg-12">
                    <h1 class="page-header">User
                        <small>Activities</small>
                    </h1>
                </div>
                <div class="col-lg-9">
                    <table class="col-lg-9">
                        <thead>
                            <tr>
                                <th class="col-md-6">Activity</th>
                                <th class="col-md-3">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($activities as $item)
                            <tr>
                                <td>{{ $item->action_type }}</td>
                                <td>{{ $item->created_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
