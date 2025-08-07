<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <h3 class="text-white">Training System</h3>

        <?php if(auth()->guard()->check()): ?>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">
                <?php if(auth()->user()->isAdmin()): ?>
                <!-- روابط المشرفين فقط -->
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('students.index')); ?>">Students</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('courses.index')); ?>">Courses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('enrollments.index')); ?>">Enrollments</a>
                </li>
                <?php endif; ?>

                <!-- روابط عامة للمستخدمين -->

            </ul>

            <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
        <?php endif; ?>
    </div>
</nav><?php /**PATH C:\xampp\htdocs\Final_project\train_system\resources\views/layouts/navbar.blade.php ENDPATH**/ ?>