<?php $__env->startSection('content'); ?>
<div class="container">
    <?php if(session('success')): ?>
    <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <h2>Courses Management</h2>
    <a href="<?php echo e(route('courses.create')); ?>" class="btn btn-primary mb-3">Add New Course</a>

    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Hours</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $courses): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($courses->title ?? 'No Title'); ?></td>
                <td><?php echo e(Str::limit($courses->description ?? 'No Description', 50)); ?></td>
                <td><?php echo e($courses->hours ?? '0'); ?></td>
                <td>
                    <a href="<?php echo e(route('courses.edit', $courses->id)); ?>" class="btn btn-warning">Edit</a>
                    <form action="<?php echo e(route('courses.destroy', $courses->id)); ?>" method="POST" class="d-inline">
                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Final_project\train_system\resources\views/courses/index.blade.php ENDPATH**/ ?>