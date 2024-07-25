<?php

use app\constant\AuxTag;
use app\core\Application;
use app\core\Session;
use app\core\Style;
use app\model\AuxModel;
/**
*@var $employees AuxModel
 * @var $tags AuxTag
 **/
?>
<div class="flex flex-col gap-5 h-full">
    <div class="flex justify-between">
        <h1 class="font-bold text-xl text-gray-800">Dashboard</h1>
        <div class="flex items-center gap-2">
            <a class="flex items-center bg-indigo-900 text-white text-xs text-semibold rounded-lg px-3 h-7 text-center"><span><i class="bi bi-plus"></i></span> Buddy Punching</a>
            <a href="/" class="flex items-center bg-white text-black text-xs text-bold rounded-lg px-3 h-7 text-center border border-gray-300">Employee POV</a>
        </div>
    </div>
    <!--    Second Container-->
    <div class="flex justify-between items-center bg-white rounded-lg p-3">
        <div class="container">
            <h1 class="text-md font-bold text-black">Good to see you, <?= Application::$application->applicationUser->getUsername() ?> &#128075;</h1>
            <p class="text-[12px] text-gray-500">You came 25 minutes early today.</p>
        </div>
        <div class="flex gap-2 items-center">
            <div class="flex items-center w-32 gap-1">
                <button id="punchIn" <?php if(Session::get('PUNCH IN')) echo "disabled"?> class="cursor-pointer hover:bg-opacity-75 text-xl text-green-700 bg-green-200 rounded-md h-10 w-10 flex items-center justify-center cursor-pointer"><i class="bi bi-box-arrow-in-up-left"></i></button>
                <div class="">
                    <p id="punchInTime" class="text-[10px] text-gray-700 font-semibold"><?= Session::get('PUNCH IN')?></p>
                    <p class="text-[10px] text-gray-500 font-semibold">Punch in</p>
                </div>
            </div>
            <div class="flex items-center w-32 gap-1">
                <button id="punchOut" <?php if(!Session::get('PUNCH IN') || Session::get('PUNCH OUT')) echo "disabled" ?>  class="cursor-pointer text-xl text-red-700 bg-red-100 rounded-md h-10 w-10 flex items-center justify-center cursor-pointer"><i class="bi bi-box-arrow-in-up-right"></i></button>
                <div class="">
                    <p id="punchOutTime" class="text-[10px] text-gray-700 font-semibold"><?= Session::get('PUNCH OUT')?></p>
                    <p class="text-[10px] text-gray-500 font-semibold">Punch out</p>
                </div>
            </div>
        </div>
    </div>
    <div class="flex size-full gap-5">
        <div class="flex-1">
            <section class="grid grid-cols-4 gap-5 h-24 w-full ">
                <div class="flex items-center gap-3 p-5 bg-white rounded-lg">
                    <section>
                        <span class="bg-green-300 text-2xl p-2 rounded-lg"><i class="bi bi-person-workspace"></i></span>
                    </section>
                    <section>
                        <p class="text-xs text-gray-800 font-bold">Working</p>
                        <h1 class="text-indigo-900 font-bold text-xl"><?= $tags['WORKING'] ?? 0 ?></h1>
                    </section>
                </div>
                <div class="flex items-center gap-3 p-5 bg-white rounded-lg">
                    <section>
                        <span class="text-black bg-yellow-300 text-2xl p-2 rounded-lg"><i class="bi bi-person-workspace"></i></span>
                    </section>
                    <section>
                        <p class="text-xs text-gray-800 font-bold">Break / Meal</p>
                        <h1 class="text-indigo-900 font-bold text-xl"><?= ($tags['BREAK'] + $tags['MEAL BREAK']) ?? 0  ?></h1>
                    </section>
                </div>
                <div class="flex items-center gap-3 p-5 bg-white rounded-lg">
                    <section>
                        <span class="text-white bg-red-400 text-2xl p-2 rounded-lg"><i class="bi bi-person-workspace"></i></span>
                    </section>
                    <section>
                        <p class="text-xs text-gray-800 font-bold">Personal Time</p>
                        <h1 class="text-indigo-900 font-bold text-xl"><?= $tags['PERSONAL TIME'] ?? 0 ?></h1>
                    </section>
                </div>
                <div class="flex items-center gap-3 p-5 bg-white rounded-lg">
                    <section>
                        <span class="text-white bg-blue-500 text-2xl p-2 rounded-lg"><i class="bi bi-person-workspace"></i></span>
                    </section>
                    <section>
                        <p class="text-xs text-gray-800 font-bold">Meeting</p>
                        <h1 class="text-indigo-900 font-bold text-xl"><?= $tags['MEETING'] ?? 0 ?></h1>
                    </section>
                </div>
            </section>
        </div>
        <div class="w-[400px] bg-white rounded-lg p-5">
            <div class="overflow-hidden rounded-lg flex flex-col gap-2">
                <h1 class="text-sm text-gray-800 font-bold">Tags</h1>
                <table class="table-auto w-full ">
                    <thead class="bg-gray-100 ">
                    <tr class="border-b text-gray-300">
                        <th class="text-start p-2 text-xs text-black font-medium ">Name</th>
                        <th class="text-start p-2 text-xs text-black font-medium ">Aux</th>
                        <th class="text-start p-2 text-xs text-black font-medium">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($employees as $employee): ?>
                        <tr class="border-b text-gray-300">
                            <th class="text-start p-2 text-xs text-black font-medium"><?= $employee['firstName'] . " " . $employee['lastName']?></th>
                            <th class="text-start p-2 text-xs text-black font-medium">
                                <p class="w-fit text-center px-4 py-2 rounded-full <?= Style::auxTag($employee['aux']) ?>"><?= $employee['aux'] ?></p>
                            </th>
                            <th class="text-start p-2 text-xs text-black font-medium">...</th>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>