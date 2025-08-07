<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <h2>Enrollments List</h2>
    <a href="<?php echo e(route('enrollments.create')); ?>" class="btn btn-primary mb-3">Add Enrollment</a>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Student</th>
                <th>Course</th>
                <th>Grade</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $enrollments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enrollment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($enrollment->student?->name ?? 'لا يوجد طالب'); ?></td>
                <td><?php echo e($enrollment->course->title); ?></td>
                <td><?php echo e($enrollment->grade); ?></td>
                <td><?php echo e($enrollment->enrollment_date); ?></td>
                <td>
                    <a href="<?php echo e(route('enrollments.edit', $enrollment->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                    <form action="<?php echo e(route('enrollments.destroy', $enrollment->id)); ?>" method="POST" class="d-inline">
                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Final_project\train_system\resources\views/enrollments/index.blade.php ENDPATH**/ ?>