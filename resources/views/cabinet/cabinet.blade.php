@extends('layouts.app')

@section('content')
    <div class="container content">
        <div class="panel panel-default">
            <div class="panel-heading">Cabinet</div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="col-xs-6">
                            <button id="password_change_btn" class="btn btn-info">Change Password</button>
                        </div>

                        <form method="post" action="{{ route('change_password') }}" id="password_change" class="col-xs-6 form-horizontal">
                            <div class="text-center form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">
                                <label for="old_password" class="control-label">Current password</label>
                                <div>
                                    <input id="old_password" type="password" class="form-control" name="old_password" required>

                                    @if ($errors->has('old_password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('old_password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="text-center form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
                                <label for="new_password" class="control-label">New password</label>
                                <div>
                                    <input id="new_password" type="password" class="form-control" name="new_password" required>

                                    @if ($errors->has('new_password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('new_password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="text-center form-group">
                                <label for="password-confirm" class="control-label">Confirm new Password</label>

                                <div class="">
                                    <input id="password-confirm" type="password" class="form-control" name="new_password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="">
                                    <button type="submit" class="btn btn-primary">
                                        Change password
                                    </button>
                                </div>
                            </div>

                            {{ csrf_field() }}
                        </form>
                    </div>

                    <div class="col-xs-6">
                        <button id="email_change_btn" class="btn btn-info pull-right">Password</button>

                        <form method="post" action="{{ route('change_email') }}" id="email_change" class="col-xs-6 form-horizontal">
                            <div class="text-center form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="control-label">Password</label>
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                            </div>

                            <div class="text-center form-group{{ $errors->has('confirm_password') ? ' has-error' : '' }}">
                                <label for="password_confirmation" class="control-label">Confirm password</label>

                                <div>
                                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="text-center form-group{{ $errors->has('new_email') ? ' has-error' : '' }}">
                                <label for="new_email" class="control-label">New E-mail</label>

                                <div>
                                    <input id="new_email" type="email" class="form-control" name="new_email" required>

                                    @if ($errors->has('new_email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('new_email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary">
                                        Change E-mail
                                    </button>
                                </div>
                            </div>

                            {{ csrf_field() }}

                        </form>
                    </div>
                </div>
            </div>

            <div class="panel-footer">
                <a href="{{ url('/desk') }}">Go to desk</a>
            </div>
        </div>
    </div>
@endsection