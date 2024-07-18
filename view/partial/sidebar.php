<?php use \app\core\Application; ?>
<div class="flex flex-col gap-2 w-64 bg-gray-200 border-r border-gray-300">
    <div class="flex items-center h-14 font-semibold px-5 text-gray-800 cursor-pointer <?= Application::$application->style->sideBarButton('/') ?>">
        <a href="/"><span class="mr-3"><i class="bi bi-house-door"></i></span> Dashboard</a>
    </div>
    <div class="flex items-center h-14 font-semibold px-5 text-gray-800 cursor-pointer <?= Application::$application->style->sideBarButton('/job-desk') ?>">
        <a href="/job-desk"><span class="mr-3"><i class="bi bi-person-workspace"></i></span> Job Desk</a>
    </div>
    <div class="flex items-center h-14 font-semibold px-5 text-gray-800 cursor-pointer <?= Application::$application->style->sideBarButton('/employee') ?>">
        <a href="/employee"><span class="mr-3"><i class="bi bi-person"></i></span> Employee</a>
    </div>
    <div class="flex items-center h-14 font-semibold px-5 text-gray-800 cursor-pointer <?= Application::$application->style->sideBarButton('/leave') ?>">
        <a href="/leave"><span class="mr-3"><i class="bi bi-box-arrow-left"></i></span> Leave</a>
    </div>
    <div class="flex items-center h-14 font-semibold px-5 text-gray-800 cursor-pointer <?= Application::$application->style->sideBarButton('/attendance') ?>">
        <span class="mr-3"><i class="bi bi-clock"></i></span> Attendance
    </div>
    <div class="flex items-center h-14 font-semibold px-5 text-gray-800 cursor-pointer <?= Application::$application->style->sideBarButton('/administration') ?>">
        <span class="mr-3"><i class="bi bi-folder"></i></span> Administration
    </div>
    <div class="flex items-center h-14 font-semibold px-5 text-gray-800 cursor-pointer <?= Application::$application->style->sideBarButton('/setting') ?>">
        <span class="mr-3"><i class="bi bi-gear"></i></span> Setting
    </div>
</div>