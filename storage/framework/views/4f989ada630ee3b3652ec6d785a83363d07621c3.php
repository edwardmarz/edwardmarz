<?php $__env->startSection('title', 'Lecture Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Lecture's Dashboard</div>

                    <div class="card-body">
                        <?php if(session('status')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo e(session('status')); ?>

                            </div>
                        <?php endif; ?>

                        <p>Welcome Lecture : <strong><?php echo e(Auth::user()->name); ?></strong></p>
                        <p>Your joined  : <?php echo e(Auth::user()->created_at->diffForHumans()); ?> </p>
                        <table>
                        <th>Kelas</th>
                            <tr>
                                <td>
                                    1. <?php echo e(Auth::user()->lecture_number); ?>

                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('lecture.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Documents\attendance_pad\resources\views/lecture/dashboard.blade.php ENDPATH**/ ?>