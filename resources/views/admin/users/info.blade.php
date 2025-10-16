@extends('admin.layouts.app')

@push('libraries_top')

@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ trans('admin/main.info_title') }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ getAdminPanelUrl() }}">{{trans('admin/main.dashboard')}}</a>
                </div>
                <div class="breadcrumb-item">{{ trans('admin/main.info_title') }}</div>
            </div>
        </div>

        <div class="section-body">
            @php
                $unreadNotificationsIds = [];
                if(!empty($unreadNotifications) and count($unreadNotifications)) {
                    $unreadNotificationsIds=$unreadNotifications->pluck('id')->toArray();
                }
            @endphp

            <div class="card">
              

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped font-14" id="datatable-basic">

                            <tr>
    <th class="text-left">{{ trans('site.full_name') }}</th>
    <th class="text-center">{{ trans('site.father_name') }}</th>
    <th class="text-center">{{ trans('site.mother_name') }}</th>
    <th class="text-center">{{ trans('site.school_name') }}</th>
    <th class="text-center">{{ trans('site.national_id_number') }}</th>
    <th class="text-center">{{ trans('site.created_at') }}</th>
    <th class="text-center">{{ trans('site.email') }}</th>
</tr>


                         @foreach($studentInfos as $notification)
                                <tr>
                                    <td class="text-center">{{ $notification->full_name }}</td>
                                    <td class="text-center">{{ $notification->father_name }}</td>
                                    <td class="text-center">{{ $notification->mother_name }}</td>


                                    <td class="text-center">{{ $notification->school_name }}</td>

                                    <td class="text-center">
                                        {{$notification->national_id_number}}
                                    </td>

                                    <td class="text-center">{{ dateTimeFormat($notification->created_at,'j M Y | H:i') }}</td>

                                    <td class="text-center">
{{$notification->email}}
                                      
                                    </td>
                                </tr>
                            @endforeach 

                        </table>
                    </div>
                </div>

                <div class="card-footer text-center">
                    {{-- $notifications->appends(request()->input())->links() --}}
                </div>
            </div>
        </div>
    </section>

<script>
console.log("infos",@json($studentInfos))
</script>
    <!-- Modal -->
    <div class="modal fade" id="notificationMessageModal" tabindex="-1" aria-labelledby="notificationMessageLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="notificationMessageLabel">{{ trans('admin/main.contacts_message') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('admin/main.close') }}</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts_bottom')
    <script src="/assets/default/js/admin/notifications.min.js"></script>
@endpush
