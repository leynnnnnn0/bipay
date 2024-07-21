<?php

use app\core\Style;
use app\model\EmployeeModel;
/**
 * @var $model EmployeeModel
 */
?>
<div class="flex flex-col gap-5 h-full w-full">
    <h1 class="font-bold text-xl text-gray-800">Job Desk</h1>
    <main class="flex gap-5 h-full w-full">
        <section class="flex flex-col gap-5 bg-white rounded-lg w-64 p-5">
            <!--        Personal Information-->
            <div class="container flex items-center gap-2 bg-white">
                <img class="h-10 w-10 rounded-full" src="/avatar/<?= Style::emptyImage($model['photo']) ?>" alt="profile">
                <div>
                    <h1 class="text-black font-bold text-sm"><?= $model['firstName'] . " " . $model['lastName'] ?></h1>
                    <p class="text-gray-500 text-[12px]">Streamer</p>
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
                            <h1 class="text-black font-semibold text-sm">Admin & HRM</h1>
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
                            <h1 class="text-black font-semibold text-sm">Regular</h1>
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
                            <h1 class="text-black font-semibold text-sm"><?= $model['email'] ?></h1>
                            <p class="text-gray-500 text-[10px]">email</p>
                        </div>
                    </div>
                    <div class="container flex items-center gap-2 bg-white">
                        <span class="h-8 w-8 rounded-lg bg-gray-200 flex items-center justify-center text-black">
                            <i class="bi bi-phone"></i>
                        </span>
                        <div>
                            <h1 class="text-text font-semibold text-sm">+63<?= $model['phoneNumber'] ?></h1>
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
                            <h1 class="text-black font-semibold text-sm"><?= $model['city'] ?></h1>
                            <p class="text-gray-500 text-[10px]">City</p>
                        </div>
                    </div>
                    <div class="container flex items-center gap-2 bg-white">
                        <span class="h-8 w-8 rounded-lg bg-gray-200 flex items-center justify-center text-black">
                            <i class="bi bi-map"></i>
                        </span>
                        <div>
                            <h1 class="text-text font-semibold text-sm"><?= $model['state'] ?></h1>
                            <p class="text-gray-500 text-[10px]">State</p>
                        </div>
                    </div>
                    <div class="container flex items-center gap-2 bg-white">
                        <span class="h-8 w-8 rounded-lg bg-gray-200 flex items-center justify-center text-black">
                            <i class="bi bi-globe-americas"></i>
                        </span>
                        <div>
                            <h1 class="text-text font-semibold text-sm">The United States</h1>
                            <p class="text-gray-500 text-[10px]">Country</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="flex-1 bg-white rounded-lg flex items-center justify-center min-w-[800px]">
            <h1 class="text-black text-xl font-bold">COMING SOON....</h1>
        </section>
    </main>
</div>