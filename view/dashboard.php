<?php use app\core\Application; ?>
<?php require_once Application::$ROOT_PATH . "/view/partial/header.php"; ?>
<?php require_once Application::$ROOT_PATH . "/view/partial/nav.php"; ?>
<div class="flex h-screen">
    <div class="w-64 bg-gray-200 border-r border-gray-300">
        <div class="flex items-center h-14 bg-gray-300 font-semibold px-5 text-gray-800">
            <span class="mr-3"><i class="bi bi-house-door"></i></span> Dashboard
        </div>
        <div class="flex items-center h-14 font-semibold px-5 text-gray-800">
            <span class="mr-3"><i class="bi bi-person-workspace"></i></span> Job Desk
        </div>
        <div class="flex items-center h-14 font-semibold px-5 text-gray-800">
            <span class="mr-3"><i class="bi bi-person"></i></span> Employee
        </div>
        <div class="flex items-center h-14 font-semibold px-5 text-gray-800">
            <span class="mr-3"><i class="bi bi-box-arrow-left"></i></span> Leave
        </div>
        <div class="flex items-center h-14 font-semibold px-5 text-gray-800">
            <span class="mr-3"><i class="bi bi-clock"></i></span> Attendance
        </div>
        <div class="flex items-center h-14 font-semibold px-5 text-gray-800">
            <span class="mr-3"><i class="bi bi-folder"></i></span> Administration
        </div>
        <div class="flex items-center h-14 font-semibold px-5 text-gray-800">
            <span class="mr-3"><i class="bi bi-gear"></i></span> Setting
        </div>
    </div>
</div>
<?php require_once Application::$ROOT_PATH . "/view/partial/footer.php"; ?>
