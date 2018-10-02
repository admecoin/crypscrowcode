@extends ('backend.layouts.app')

@section ('title', app_name() . ' | ' . __('labels.backend.access.users.management'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.access.users.management') }} <small class="text-muted">{{ __('labels.backend.access.users.active') }}</small>
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                @include('backend.auth.user.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>{{ __('labels.backend.access.users.table.first_name') }}</th>
                            <th>{{ __('labels.backend.access.users.table.last_name') }}</th>
                            <th>{{ __('labels.backend.access.users.table.username') }}</th>
                            <th>{{ __('labels.backend.access.users.table.email') }}</th>
                            <th>{{ __('labels.backend.access.users.table.gender') }}</th>
                            <th>{{ __('labels.backend.access.users.table.confirmed') }}</th>
                            <th>{{ __('labels.backend.access.users.table.roles') }}</th>
                            
                            <!-- <th>{{ __('labels.backend.access.users.table.social') }}</th> -->
                            <th>{{ __('labels.backend.access.users.table.last_updated') }}</th>
                            @if($logged_in_user->isAdmin())
                            <th>{{ __('labels.general.actions') }}</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->gender }}</td>
                                <td>{!! $user->confirmed_label !!}</td>
                                <td>{!! $user->roles_label !!}</td>
                               
                                <!-- <td>{!! $user->social_buttons !!}</td> -->
                                <td>{{ $user->updated_at->diffForHumans() }}</td>
                                @if($logged_in_user->isAdmin())
                                <td>{!! $user->action_buttons !!}</td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {!! $users->total() !!} {{ trans_choice('labels.backend.access.users.table.total', $users->total()) }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $users->render() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection