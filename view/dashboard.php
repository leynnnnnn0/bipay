<?php
use app\model\EmployeeModel;
/**
 * @var $model EmployeeModel
 **/
?>
<div class="flex flex-col gap-5 h-full">
<!--    First container-->
    <div class="flex justify-between">
        <h1 class="font-bold text-xl text-gray-800">Dashboard</h1>
        <div class="flex items-center gap-2">
            <button class="bg-indigo-900 text-white text-xs text-semibold rounded-lg px-3 h-7 text-center"><span><i class="bi bi-plus"></i></span> Buddy Punching</button>
            <button class="bg-white text-black text-xs text-bold rounded-lg px-3 h-7 text-center border border-gray-300">Manager POV</button>
        </div>
    </div>
<!--    Second Container-->
    <div class="flex justify-between items-center bg-white rounded-lg p-3">
        <div class="container">
            <h1 class="text-md font-bold text-black">Good to see you, <?= \app\core\Application::$application->applicationUser->getUsername() ?> &#128075;</h1>
            <p class="text-[12px] text-gray-500">You came 25 minutes early today.</p>
        </div>
        <div class="flex gap-2 items-center">
            <div class="flex items-center w-24 gap-1">
                <span class="text-xl text-green-700 bg-green-100 rounded-md h-10 w-10 flex items-center justify-center cursor-pointer"><i class="bi bi-box-arrow-in-up-left"></i></span>
                <div class="">
                    <p class="text-[10px] text-gray-700 font-semibold">7:14 AM</p>
                    <p class="text-[10px] text-gray-500 font-semibold">Punch in</p>
                </div>
            </div>
            <div class="flex items-center w-24 gap-1">
                <span class="text-xl text-red-700 bg-red-100 rounded-md h-10 w-10 flex items-center justify-center cursor-pointer"><i class="bi bi-box-arrow-in-up-right"></i></span>
                <div class="">
                    <p class="text-[10px] text-gray-700 font-semibold">5:00 PM</p>
                    <p class="text-[10px] text-gray-500 font-semibold">Punch out</p>
                </div>
            </div>
        </div>
    </div>
<!--    Third Container-->
    <div class="h-24 bg-white rounded-lg flex p-3 items-center gap-3">
        <div class="container border-r-2 border-gray-300">
            <h3 class="text-gray-800 font-semibold text-xs">Total leave allowance</h3>
            <h1 class="text-blue-400 font-bold text-2xl">34</h1>
        </div>
        <div class="container border-r-2 border-gray-300">
            <h3 class="text-gray-800 font-semibold text-xs">Total leave taken</h3>
            <h1 class="text-blue-400 font-bold text-2xl">20</h1>
        </div>
        <div class="container border-r-2 border-gray-300">
            <h3 class="text-gray-800 font-semibold text-xs">Total leave available</h3>
            <h1 class="text-blue-400 font-bold text-2xl">16</h1>
        </div>
        <div class="container">
            <h6 class="text-gray-800 font-semibold text-xs">Total leave request</h6>
            <h1 class="text-blue-400 font-bold text-2xl">4</h1>
        </div>
    </div>
<!--    Fourth Container-->
    <div class="container bg-white rounded-lg p-3 flex flex-col gap-2">
        <h1 class="text-sm text-black font-bold">Schedule</h1>
        <div class="container flex gap-2">
            <div class="container flex flex-col gap-2 border-r-2 border-gray-300">
                <h1 class="text-gray-800 font-semibold text-xs">This week</h1>
                <div class="flex justify-between p-2 gap-2">
                    <div class="bg-gray-200 rounded-lg p-4 flex-1">
                        <h1 class="text-black font-bold text-xs whitespace-nowrap">8:00 am</h1>
                        <p class="text-xs text-gray-500 whitespace-nowrap">Time start</p>
                    </div>
                    <div class="bg-gray-200 rounded-lg p-4 flex-1">
                        <h1 class="text-black font-bold text-xs whitespace-nowrap">10:00 am</h1>
                        <p class="text-xs text-gray-500 whitespace-nowrap">First break</p>
                    </div>
                    <div class="bg-gray-200 rounded-lg p-4 flex-1">
                        <h1 class="text-black font-bold text-xs whitespace-nowrap">12:00 pm</h1>
                        <p class="text-xs text-gray-500 whitespace-nowrap">Meal break</p>
                    </div>
                    <div class="bg-gray-200 rounded-lg p-4 flex-1">
                        <h1 class="text-black font-bold text-xs whitespace-nowrap">3:00 pm</h1>
                        <p class="text-xs text-gray-500 whitespace-nowrap">Second break</p>
                    </div>
                    <div class="bg-gray-200 rounded-lg p-4 flex-1">
                        <h1 class="text-black font-bold text-xs whitespace-nowrap">5:00 pm</h1>
                        <p class="text-xs text-gray-500 whitespace-nowrap">Time end</p>
                    </div>
                </div>
            </div>
            <div class="container flex flex-col gap-2">
                <h1 class="text-gray-800 font-semibold text-xs">Next Week</h1>
                <div class="flex justify-between p-2 gap-2">
                    <div class="bg-gray-200 rounded-lg p-4 flex-1">
                        <h1 class="text-black font-bold text-xs whitespace-nowrap">8:00 am</h1>
                        <p class="text-xs text-gray-500 whitespace-nowrap">Time start</p>
                    </div>
                    <div class="bg-gray-200 rounded-lg p-4 flex-1">
                        <h1 class="text-black font-bold text-xs whitespace-nowrap">10:00 am</h1>
                        <p class="text-xs text-gray-500 whitespace-nowrap">First break</p>
                    </div>
                    <div class="bg-gray-200 rounded-lg p-4 flex-1">
                        <h1 class="text-black font-bold text-xs whitespace-nowrap">12:00 pm</h1>
                        <p class="text-xs text-gray-500 whitespace-nowrap">Meal break</p>
                    </div>
                    <div class="bg-gray-200 rounded-lg p-4 flex-1">
                        <h1 class="text-black font-bold text-xs whitespace-nowrap">3:00 pm</h1>
                        <p class="text-xs text-gray-500 whitespace-nowrap">Second break</p>
                    </div>
                    <div class="bg-gray-200 rounded-lg p-4 flex-1">
                        <h1 class="text-black font-bold text-xs whitespace-nowrap">5:00 pm</h1>
                        <p class="text-xs text-gray-500 whitespace-nowrap">Time end</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--    Forth Container-->
    <div class="container flex-1 bg-white p-3 rounded-lg flex flex-col gap-3">
        <h1 class="text-black font-bold text-sm">Announcements</h1>
        <div class="overflow-hidden rounded-lg">
            <table class="table-auto w-full ">
                <thead class="bg-gray-200 ">
                    <tr>
                        <th class="text-start p-2 text-xs text-black font-medium">Title</th>
                        <th class="text-start p-2 text-xs text-black font-medium">Start date</th>
                        <th class="text-start p-2 text-xs text-black font-medium">End date</th>
                        <th class="text-start p-2 text-xs text-black font-medium">Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class="text-start p-2 text-xs text-black font-medium">Birthday</th>
                        <th class="text-start p-2 text-xs text-black font-medium">Dec 4, 2023</th>
                        <th class="text-start p-2 text-xs text-black font-medium">Dec 6, 2023</th>
                        <th class="text-start p-2 text-xs text-black font-medium">Happy Birthday to you</th>
                    </tr>
                    <tr>
                        <th class="text-start p-2 text-xs text-black font-medium">Team Building</th>
                        <th class="text-start p-2 text-xs text-black font-medium">Dec 23, 2023</th>
                        <th class="text-start p-2 text-xs text-black font-medium">Dec 25, 2023</th>
                        <th class="text-start p-2 text-xs text-black font-medium">A small hang out</th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>