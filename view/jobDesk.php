<?php

use app\core\Application;
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
                <h1 class="text-black text-md font-bold">Attendance</h1>
                <div class="grid grid-cols-5 h-24 border border-gray-300 rounded-lg min-w-full p-3">
                    <section class="border-r border-bray-300 p-2">
                        <p class="text-lg text-blue-500 font-medium">132:00:00</p>
                        <p class="text-xs text-gray-500 font-light">Total Schedule Hour</p>
                    </section>
                    <section class="border-r border-bray-300 p-2">
                        <p class="text-lg text-green-500 font-medium">32:00:00</p>
                        <p class="text-xs text-gray-500 font-light">Worked Hours</p>
                    </section>
                    <section class="border-r border-bray-300 p-2">
                        <p class="text-lg text-red-500 font-medium">00:09:00</p>
                        <p class="text-xs text-gray-500 font-light">Late</p>
                    </section>
                    <section class="border-r border-bray-300 p-2">
                        <p class="text-lg text-red-500 font-medium">00:03:00</p>
                        <p class="text-xs text-gray-500 font-light">Over break</p>
                    </section>
                    <section class="p-2">
                        <p class="text-lg text-green-500 font-medium">93%</p>
                        <p class="text-xs text-gray-500 font-light">Adherence</p>
                    </section>
                </div>
                <div class="overflow-hidden rounded-lg flex flex-col gap-2">
                    <h1 class="text-sm text-gray-800 font-bold">History</h1>
                    <table class="table-auto w-full ">
                        <thead class="bg-gray-100 ">
                        <tr class="border-b text-gray-300">
                            <th class="text-start p-2 text-xs text-black font-medium ">Date</th>
                            <th class="text-start p-2 text-xs text-black font-medium ">Punched In</th>
                            <th class="text-start p-2 text-xs text-black font-medium">Punched Out</th>
                            <th class="text-start p-2 text-xs text-black font-medium">Adherence</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data as $key => $value): ?>
                                <tr class="border-b text-gray-300">
                                    <th class="text-start p-2 text-xs text-black font-medium"><?= $key ?></th>
                                    <th class="text-start p-2 text-xs text-black font-medium"><?= Style::time($value[0]['PUNCH IN']) ?></th>
                                    <th class="text-start p-2 text-xs text-black font-medium"><?= isset($value[1]['PUNCH OUT']) ? Style::time($value[1]['PUNCH OUT']) : ""  ?></th>
                                    <th class="text-start p-2 text-xs <?= Style::adherence($value['adherence']) ?> font-medium"><?= isset($value[2]['adherence']) ? $value[2]['adherence'] . "%" : "" ?></th>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>
</div>