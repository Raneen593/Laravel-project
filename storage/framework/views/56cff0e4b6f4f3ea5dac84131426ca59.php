<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <h2>Edit Enrollment</h2>

    <form action="<?php echo e(route('enrollments.update', $enrollment->id)); ?>" method="POST">
        <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
        <div class="mb-3">
            <label class="form-label">Student</label>
            <select class="form-select" name="student_id" required>
                <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($student->id); ?>" <?php echo e($enrollment->student_id == $student->id ? 'selected' : ''); ?>>
                    <?php echo e($student->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Course</label>
            <select class="form-select" name="course_id" required>
                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($course->id); ?>" <?php echo e($enrollment->course_id == $course->id ? 'selected' : ''); ?>>
                    <?php echo e($course->title); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Grade</label>
            <input type="number" step="0.01" class="form-control" name="grade" value="<?php echo e($enrollment->grade); ?>"
                required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Final_project\train_system\resources\views/enrollments/edit.blade.php ENDPATH**/ ?>