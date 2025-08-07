<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <h2>Edit Course</h2>

    <form action="<?php echo e(route('courses.update', $course->id)); ?>" method="POST">
        <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" name="title" value="<?php echo e($course->title); ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="description" rows="3" required><?php echo e($course->description); ?></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Hours</label>
            <input type="number" step="0.01" class="form-control" name="hours" value="<?php echo e($course->hours); ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" step="0.01" class="form-control" name="price" value="<?php echo e($course->price); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Final_project\train_system\resources\views/courses/edit.blade.php ENDPATH**/ ?>