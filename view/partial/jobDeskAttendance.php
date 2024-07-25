<?php

use app\core\Application;
use app\core\Style;
use app\model\EmployeeModel;
/**
 * @var $model EmployeeModel
 * @var $data array
 */
?>
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
                <th class="text-start p-2 text-xs <?= Style::adherence($value[2]['adherence']) ?> font-medium"><?= isset($value[2]['adherence']) ? $value[2]['adherence'] . "%" : "" ?></th>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>