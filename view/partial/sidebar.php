<?php use \app\core\Application;
use app\core\Style; ?>
<div class="flex flex-col gap-2 w-64 bg-gray-200 border-r border-gray-300">
    <div class="flex items-center h-14 font-semibold px-5 text-gray-800 cursor-pointer <?= Application::$application->style->sideBarButton('/') ?>">
        <a href="/"><span class="mr-3"><i class="bi bi-house-door"></i></span> Dashboard</a>
    </div>
    <div class="flex items-center h-14 font-semibold px-5 text-gray-800 cursor-pointer <?= Application::$application->style->sideBarButton('/job-desk') ?>">
        <a href="/job-desk"><span class="mr-3"><i class="bi bi-person-workspace"></i></span> Job Desk</a>
    </div>
    <?php if(Application::$application->applicationUser->getRole() === "ADMIN"): ?>
        <div class="flex items-center h-14 font-semibold px-5 text-gray-800 cursor-pointer <?= Application::$application->style->sideBarButton('/employee') ?>">
            <a href="/employee"><span class="mr-3"><i class="bi bi-person"></i></span> Employee</a>
        </div>
        <div class="flex gap-4 h-14 items-center justify-between font-semibold px-5 text-gray-800 cursor-pointer <?= Application::$application->style->sideBarButton('/leave')?> <?= Application::$application->style->sideBarButton('/leave-request')?>">
            <a href="/leave"><span class="mr-3"><i class="bi bi-box-arrow-left"></i></span> Leave</a>
            <span id="leaveOptions" class="mr-3"><i class="bi bi-chevron-down"></i></span>
        </div>
        <div id="leaveOptionsContainer" class="container bg-gray-200 <?= Style::isOptionsVisible("/leave") || Style::isOptionsVisible("/leave-request")  ? '' : 'hidden' ?>">
            <div class="flex rounded-lg h-10 items-center text-sm font-semibold px-5 text-gray-800 cursor-pointer <?= Application::$application->style->sideBarButton('/leave') ?>">
                <a href="/leave">Summary</a>
            </div>
            <!--        <div class="flex h-10 items-center text-sm font-semibold px-5 text-gray-800 cursor-pointer">-->
            <!--            <a href="/leave">Status</a>-->
            <!--        </div>-->
            <div class="flex h-10 items-center text-sm font-semibold px-5 text-gray-800 cursor-pointer <?= Application::$application->style->sideBarButton('/leave-request') ?>">
                <a href="/leave-request">Request</a>
            </div>
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
    <?php endif; ?>
    <div class="flex-1 flex items-end">
        <div class="flex items-center h-14 font-semibold px-5 text-gray-800 cursor-pointer">
            <a href="/logout"><span class="mr-3"><i class="bi bi-box-arrow-left"></i></span>Log out</a>
        </div>
    </div>
</div>
<script src="/animation/sidebar.js"></script>