@extends('app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Add User
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Add User</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {!! Form::open(['route' => 'users.store']) !!}
                            <div class="box-body">
                                <div class="form-group">
                                    {!! Form::label('name', 'Name') !!}
                                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('email', 'Email') !!}
                                    {!! Form::text('email', null, ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('password', 'Password') !!}
                                    {!! Form::password('password', ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('password_confirmation', 'Password confirmation') !!}
                                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    <label for="">Roles</label>
                                    @foreach($roles as $role)
                                        <div class="checkbox">
                                            <label>
                                                {!! Form::checkbox('role[]', $role->id) !!} {{ $role->display_name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="form-group">
                                    {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop