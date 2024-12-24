@extends('layouts.admin')
@include('partials/admin.settings.nav', ['activeTab' => 'basic'])

@section('title')
    Bagou License
@endsection

@section('content-header')
    <h1>Bagou Center<small>Manage all bagou450 addons.</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}">Admin</a></li>
        <li class="active">Bagou Center</li>
    </ol>
@endsection
@section('content')
@include('admin.bagoucenter.nav')

    <div class="row" style="margin-top: 15px;">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Bagou Update Checker</h3>
                </div>
                <p class="box-body">
                    You can manage your license here.
                    <br>Actual license status:
                    <ul>
                        @foreach ($addonslist as $addon)
                            @foreach($licenses as $license) 
                                @if($license->addon == $addon['id'])
                                    <li>{{$addon['name']}} {{$license->version}}: @if($addon['version'] == $license->version) <span style="color: green;">Updated</span> @else <span style="color: red;">Outdated (Latest version: {{$addon['version']}})</span> @endif</li>
                                @endif
                            @endforeach
                        @endforeach
                    </ul>
                   
                </p>
                <div class="box-footer">
                <form method="POST">
                @csrf
                    <button type="submit" name="_method" value="POST"  style="margin-left: 8px" class="btn btn-sm btn-primary pull-right ">Refresh</button>
</form>
                </div>
            </div>
            
        </div>
    </div>
@endsection