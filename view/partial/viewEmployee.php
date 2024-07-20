<?php
use app\model\EmployeeModel;
/**
 * @var $model EmployeeModel
 **/

?>
<div class="absolute h-full w-full flex items-center justify-center">
    <div class="flex flex-col gap-4 w-[600px] h-auto bg-white drop-shadow-xl p-5">
        <section class="flex items-center gap-5">
            <img src="/image/speed.jpg" class="h-[80px] w-[80px] rounded-full" alt="profile">
            <div class="container flex flex-col gap-1 w-auto">
                <h1 class="text-black text-lg font-bold"><?= $model[2]['firstName'] ?></h1>
                <p class="text-gray-500">Streamer</p>
            </div>
            <div class="flex-1 flex flex-col items-end h-full">
                <span id="hideEmployeeDetails" class="cursor-pointer text-red-500"><i class="bi bi-x-circle"></i></span>
            </div>
        </section>
        <section class="flex flex-col gap-5">
            <h1 class="text-black font-bold">Info</h1>
            <div class="grid grid-cols-2 gap-2">
                <div class="container flex items-center gap-2 bg-white">
                        <span class="h-12 w-12 rounded-lg bg-gray-200 flex items-center justify-center text-black">
                            <i class="bi bi-clipboard"></i>
                        </span>
                    <div>
                        <h1 class="text-black font-semibold text-md">Admin & HRM</h1>
                        <p class="text-gray-500 text-xs ">Department</p>
                    </div>
                </div>
                <div class="container flex items-center gap-2 bg-white">
                        <span class="h-12 w-12 rounded-lg bg-gray-200 flex items-center justify-center text-black">
                            <i class="bi bi-wallet2"></i>
                        </span>
                    <div>
                        <h1 class="text-green-500 font-semibold text-sm">$20,000</h1>
                        <p class="text-gray-500 text-[10px]">Salary</p>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-2">
                <div class="container flex items-center gap-2 bg-white">
                        <span class="h-12 w-12 rounded-lg bg-gray-200 flex items-center justify-center text-black">
                            <i class="bi bi-clock"></i>
                        </span>
                    <div>
                        <h1 class="text-black font-semibold text-sm">Regular</h1>
                        <p class="text-gray-500 text-[10px]">Work Shift</p>
                    </div>
                </div>
                <div class="container flex items-center gap-2 bg-white">
                        <span class="h-12 w-12 rounded-lg bg-gray-200 flex items-center justify-center text-black">
                            <i class="bi bi-calendar"></i>
                        </span>
                    <div>
                        <h1 class="text-black font-semibold text-sm">12 February 2023</h1>
                        <p class="text-gray-500 text-[10px]">Joining Date</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="flex flex-col gap-5">
            <h1 class="text-black font-bold">Contact</h1>
            <div class="grid grid-cols-2 gap-2">
                <div class="container flex items-center gap-2 bg-white">
                        <span class="h-12 w-12 rounded-lg bg-gray-200 flex items-center justify-center text-black">
                            <i class="bi bi-envelope"></i>
                        </span>
                    <div>
                        <h1 class="text-black font-semibold text-sm">speed@gmail.com</h1>
                        <p class="text-gray-500 text-[10px]">email</p>
                    </div>
                </div>
                <div class="container flex items-center gap-2 bg-white">
                        <span class="h-12 w-12 rounded-lg bg-gray-200 flex items-center justify-center text-black">
                            <i class="bi bi-phone"></i>
                        </span>
                    <div>
                        <h1 class="text-text font-semibold text-sm">+639266887267</h1>
                        <p class="text-gray-500 text-[10px]">Phone</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="flex flex-col gap-5">
            <h1 class="text-black font-bold">Address</h1>
            <div class="grid grid-cols-2 gap-2">
                <div class="container flex items-center gap-2 bg-white">
                        <span class="h-12 w-12 rounded-lg bg-gray-200 flex items-center justify-center text-black">
                            <i class="bi bi-geo-alt"></i>
                        </span>
                    <div>
                        <h1 class="text-black font-semibold text-sm">General Trias</h1>
                        <p class="text-gray-500 text-[10px]">City</p>
                    </div>
                </div>
                <div class="container flex items-center gap-2 bg-white">
                        <span class="h-12 w-12 rounded-lg bg-gray-200 flex items-center justify-center text-black">
                             <i class="bi bi-map"></i>
                        </span>
                    <div>
                        <h1 class="text-text font-semibold text-sm">Cavite</h1>
                        <p class="text-gray-500 text-[10px]">State</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>