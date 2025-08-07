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
                            <p class="card-text">Total Students: <?php echo e($studentsCount ?? 0); ?></p>
                            <?php if(auth()->user()->role === 'admin'): ?>
                            <a href="<?php echo e(route('students.index')); ?>" class="btn btn-primary">Manage Students</a>
                            <?php else: ?>
                            <button class="btn btn-primary" onclick="loadStudentsApi()">View Students (API)</button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- بطاقة الدورات -->
                <div class="col-md-4 mb-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">Courses</h5>
                            <p class="card-text">Total Courses: <?php echo e($coursesCount ?? 0); ?></p>
                            <?php if(auth()->user()->role === 'admin'): ?>
                            <a href="<?php echo e(route('courses.index')); ?>" class="btn btn-primary">Manage Courses</a>
                            <?php else: ?>
                            <button class="btn btn-primary" onclick="loadCoursesApi()">View Courses (API)</button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- بطاقة التسجيلات -->
                <div class="col-md-4 mb-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">Enrollments</h5>
                            <p class="card-text">Total Enrollments: <?php echo e($enrollmentsCount ?? 0); ?></p>
                            <?php if(auth()->user()->role === 'admin'): ?>
                            <a href="<?php echo e(route('enrollments.index')); ?>" class="btn btn-primary">Manage Enrollments</a>
                            <?php else: ?>
                            <button class="btn btn-primary" onclick="loadEnrollmentsApi()">View Enrollments
                                (API)</button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- منطقة عرض بيانات API للمستخدمين العاديين -->
            <div id="api-data-container" class="mt-4" style="display:none;">
                <h3 id="api-data-title"></h3>
                <div id="api-data-content" class="row"></div>
            </div>


        </div>
    </div>
</div>

<script>
function loadStudentsApi() {
    fetch('/api/students')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network error');
            }
            return response.json();
        })
        .then(data => {
            console.log(data); // للتأكد من وصول البيانات
            displayApiData('Students Data', data.data || []);
        })
        .catch(error => {
            console.error('Error:', error);
            displayApiData('Students Data', []);
        });
}

function loadCoursesApi() {
    fetch('/api/courses')
        .then(response => response.json())
        .then(data => {
            displayApiData('Courses Data', data.data || []);
        })
        .catch(error => {
            console.error('Error:', error);
            displayApiData('Courses Data', []);
        });
}

function loadEnrollmentsApi() {
    fetch('/api/enrollments')
        .then(response => response.json())
        .then(data => {
            displayApiData('Enrollments Data', data.data || []);
        })
        .catch(error => {
            console.error('Error:', error);
            displayApiData('Enrollments Data', []);
        });
}

function displayApiData(title, items) {
    const container = document.getElementById('api-data-container');
    const titleElement = document.getElementById('api-data-title');
    const contentElement = document.getElementById('api-data-content');

    titleElement.textContent = title;
    contentElement.innerHTML = '';

    if (!items || items.length === 0) {
        contentElement.innerHTML = '<p>No data available</p>';
    } else {
        items.forEach(item => {
            const card = document.createElement('div');
            card.className = 'col-md-4 mb-3';

            // استخدام القيم الافتراضية للخصائص غير الموجودة
            const itemName = item?.name || item?.title;
            const itemDetails = JSON.stringify(item, null, 2);

            card.innerHTML = `
                <div class="card">
                    <div class="card-body">
                        <h5>${itemName}</h5>
                        <pre>${itemDetails}</pre>
                    </div>
                </div>
            `;
            contentElement.appendChild(card);
        });
    }

    container.style.display = 'block';
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Final_project\train_system\resources\views/dashboard/index.blade.php ENDPATH**/ ?>