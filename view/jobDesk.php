<?php

use app\core\Application;
use app\core\Request;
use app\core\Style;
use app\model\EmployeeModel;
/**
 * @var $model EmployeeModel
 * @var $data array
 */
?>
<div class="flex flex-col gap-5 h-full w-full">
    <h1 class="font-bold text-xl text-gray-800">Job Desk</h1>
    <main class="flex gap-5 h-full w-full">
        <section class="flex flex-col gap-5 bg-white rounded-lg w-64 p-5">
            <!--        Personal Information-->
            <div class="container flex items-center gap-2 bg-white">
                <img class="size-10 rounded-full" src="/avatar/<?= Style::emptyImage(Application::$application->applicationUser->getPhoto()) ?>" alt="profile">
                <div>
                    <h1 class="text-black font-bold text-sm"><?= Application::$application->applicationUser->getFirstName() . " " . Application::$application->applicationUser->getLastName() ?></h1>
                    <p class="text-gray-500 text-[12px]"><?= Application::$application->applicationUser->getRole() ?></p>
                </div>
            </div>
<!--            Info-->
            <div class="container">
                <div class="flex flex-col gap-5">
                    <h1 class="text-sm text-black font-semibold">Info</h1>
                    <div class="container flex items-center gap-2 bg-white">
                        <span class="h-8 w-8 rounded-lg bg-gray-200 flex items-center justify-center text-black">
                            <i class="bi bi-clipboard"></i>
                        </span>
                        <div>
                            <h1 class="text-black font-semibold text-sm"><?= Application::$application->applicationUser->getDepartment() ?></h1>
                            <p class="text-gray-500 text-[10px]">Department</p>
                        </div>
                    </div>
                    <div class="container flex items-center gap-2 bg-white">
                        <span class="h-8 w-8 rounded-lg bg-gray-200 flex items-center justify-center text-black">
                            <i class="bi bi-wallet2"></i>
                        </span>
                        <div>
                            <h1 class="text-green-500 font-semibold text-sm">$20,000</h1>
                            <p class="text-gray-500 text-[10px]">Salary</p>
                        </div>
                    </div>
                    <div class="container flex items-center gap-2 bg-white">
                        <span class="h-8 w-8 rounded-lg bg-gray-200 flex items-center justify-center text-black">
                            <i class="bi bi-clock"></i>
                        </span>
                        <div>
                            <h1 class="text-black font-semibold text-sm"><?= Application::$application->applicationUser->getStatus() ?></h1>
                            <p class="text-gray-500 text-[10px]">Work Shift</p>
                        </div>
                    </div>
                    <div class="container flex items-center gap-2 bg-white">
                        <span class="h-8 w-8 rounded-lg bg-gray-200 flex items-center justify-center text-black">
                            <i class="bi bi-calendar"></i>
                        </span>
                        <div>
                            <h1 class="text-black font-semibold text-sm">12 February 2023</h1>
                            <p class="text-gray-500 text-[10px]">Joining Date</p>
                        </div>
                    </div>
                </div>
            </div>
            <!--  Contact -->
            <div class="container">
                <div class="flex flex-col gap-5">
                    <h1 class="text-sm text-black font-semibold">Contact</h1>
                    <div class="container flex items-center gap-2 bg-white">
                        <span class="h-8 w-8 rounded-lg bg-gray-200 flex items-center justify-center text-black">
                            <i class="bi bi-envelope"></i>
                        </span>
                        <div>
                            <h1 class="text-black font-semibold text-sm"><?= Application::$application->applicationUser->getEmail() ?></h1>
                            <p class="text-gray-500 text-[10px]">email</p>
                        </div>
                    </div>
                    <div class="container flex items-center gap-2 bg-white">
                        <span class="h-8 w-8 rounded-lg bg-gray-200 flex items-center justify-center text-black">
                            <i class="bi bi-phone"></i>
                        </span>
                        <div>
                            <h1 class="text-text font-semibold text-sm">+63<?= Application::$application->applicationUser->getPhoneNumber() ?></h1>
                            <p class="text-gray-500 text-[10px]">Phone</p>
                        </div>
                    </div>
                </div>
            </div>
            <!--  Contact -->
            <div class="container">
                <div class="flex flex-col gap-5">
                    <h1 class="text-sm text-black font-semibold">Address</h1>
                    <div class="container flex items-center gap-2 bg-white">
                        <span class="h-8 w-8 rounded-lg bg-gray-200 flex items-center justify-center text-black">
                            <i class="bi bi-geo-alt"></i>
                        </span>
                        <div>
                            <h1 class="text-black font-semibold text-sm"><?= Application::$application->applicationUser->getCity() ?></h1>
                            <p class="text-gray-500 text-[10px]">City</p>
                        </div>
                    </div>
                    <div class="container flex items-center gap-2 bg-white">
                        <span class="h-8 w-8 rounded-lg bg-gray-200 flex items-center justify-center text-black">
                            <i class="bi bi-map"></i>
                        </span>
                        <div>
                            <h1 class="text-text font-semibold text-sm"><?= Application::$application->applicationUser->getState() ?></h1>
                            <p class="text-gray-500 text-[10px]">State</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="flex-1 bg-white rounded-lg flex h-full min-w-[800px] p-5">
            <div class="flex flex-col gap-4 w-full">
                <div class="flex gap-3 w-full">
                    <a class="text-black text-md font-bold <?php if(!Request::param()) echo 'underline decoration-2' ?> <?= Style::underline('attendance')?>" href="/job-desk?attendance">Attendance</a>
                    <a class="text-black text-md font-bold <?= Style::underline('leave') ?>" href="/job-desk?leave">leave</a>
                </div>
            <?php if(!Request::param() || Request::param() === 'attendance'): ?>
                <?php require_once Application::$ROOT_PATH . '/view/partial/jobDeskAttendance.php'?>
            <?php endif ?>
                <?php if(Request::param() === 'leave'): ?>
                    <?php require_once Application::$ROOT_PATH . '/view/partial/jobDeskLeave.php'?>
                <?php endif ?>
            </div>
        </section>
    </main>
</div>