<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mb-4">Dashboard</h2>

            <div class="row">
                <!-- بطاقة الطلاب -->
                <div class="col-md-4 mb-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">Students</h5>
                            <p class="card-text">Total Students: <?php echo e($studentsCount); ?></p>
                            <a href="<?php echo e(route('students.index')); ?>" class="btn btn-primary">View Students</a>
                        </div>
                    </div>
                </div>

                <!-- بطاقة الدورات -->
                <div class="col-md-4 mb-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">Courses</h5>
                            <p class="card-text">Total Courses: <?php echo e($coursesCount); ?></p>
                            <a href="<?php echo e(route('courses.index')); ?>" class="btn btn-primary">View Courses</a>
                        </div>
                    </div>
                </div>

                <!-- بطاقة التسجيلات -->
                <div class="col-md-4 mb-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">Enrollments</h5>
                            <p class="card-text">Total Enrollments: <?php echo e($enrollmentsCount); ?></p>
                            <a href="<?php echo e(route('enrollments.index')); ?>" class="btn btn-primary">View Enrollments</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- زر لوحة تحكم المستخدم (للغير مشرفين) -->
            <?php if(auth()->user()->role !== 'admin'): ?>
            <div class="mt-4">
                <a href="<?php echo e(route('user.dashboard')); ?>" class="btn btn-secondary">User Dashboard</a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Final_project\train_system\resources\views/dashboard.blade.php ENDPATH**/ ?>