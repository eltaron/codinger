<?php $__env->startPush('libraries_top'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(trans('admin/main.info_title')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e(trans('admin/main.info_title')); ?></div>
            </div>
        </div>

        <div class="section-body">
            <?php
                $unreadNotificationsIds = [];
                if(!empty($unreadNotifications) and count($unreadNotifications)) {
                    $unreadNotificationsIds=$unreadNotifications->pluck('id')->toArray();
                }
            ?>

            <div class="card">
              

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped font-14" id="datatable-basic">

                            <tr>
    <th class="text-left"><?php echo e(trans('site.full_name')); ?></th>
    <th class="text-center"><?php echo e(trans('site.father_name')); ?></th>
    <th class="text-center"><?php echo e(trans('site.mother_name')); ?></th>
    <th class="text-center"><?php echo e(trans('site.school_name')); ?></th>
    <th class="text-center"><?php echo e(trans('site.national_id_number')); ?></th>
    <th class="text-center"><?php echo e(trans('site.created_at')); ?></th>
    <th class="text-center"><?php echo e(trans('site.email')); ?></th>
</tr>


                         <?php $__currentLoopData = $studentInfos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-center"><?php echo e($notification->full_name); ?></td>
                                    <td class="text-center"><?php echo e($notification->father_name); ?></td>
                                    <td class="text-center"><?php echo e($notification->mother_name); ?></td>


                                    <td class="text-center"><?php echo e($notification->school_name); ?></td>

                                    <td class="text-center">
                                        <?php echo e($notification->national_id_number); ?>

                                    </td>

                                    <td class="text-center"><?php echo e(dateTimeFormat($notification->created_at,'j M Y | H:i')); ?></td>

                                    <td class="text-center">
<?php echo e($notification->email); ?>

                                      
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 

                        </table>
                    </div>
                </div>

                <div class="card-footer text-center">
                    
                </div>
            </div>
        </div>
    </section>

<script>
console.log("infos",<?php echo json_encode($studentInfos, 15, 512) ?>)
</script>
    <!-- Modal -->
    <div class="modal fade" id="notificationMessageModal" tabindex="-1" aria-labelledby="notificationMessageLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="notificationMessageLabel"><?php echo e(trans('admin/main.contacts_message')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(trans('admin/main.close')); ?></button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/js/admin/notifications.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/codinger/htdocs/codinger.online/resources/views/admin/users/info.blade.php ENDPATH**/ ?>