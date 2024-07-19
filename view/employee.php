<?php
use app\core\Application;
use app\model\EmployeeModel;
/**
 * @var $model EmployeeModel
**/
?>
<div class="flex flex-col gap-5 h-full relative">
    <div id="addEmployeeContainer" class="hidden">
        <?php require_once Application::$ROOT_PATH . "/view/partial/addEmployeeForm.php"?>
    </div>
    <div class="flex items-center justify-between">
        <h1 class="text-gray-800 text-xl text-black font-bold">All Employee</h1>
        <button id="addEmployeeButton"
                class="bg-indigo-900 text-white text-xs text-semibold rounded-lg px-3 h-7 text-center hover:opacity-75 transition duration-150">
            <span><i class="bi bi-plus"></i></span>
            Add Employee
        </button>
    </div>
    <div class="container flex flex-col h-full bg-white p-3 rounded-lg gap-3">
        <h1 class="text-black text-md text-black font-bold">Employees</h1>
        <div class="overflow-hidden rounded-lg">
            <table class="table-auto w-full ">
                <thead class="bg-gray-200 ">
                <tr class="">
                    <th class="text-start p-2 text-xs text-black font-medium border-r border-gray-300">Name</th>
                    <th class="text-start p-2 text-xs text-black font-medium border-r border-gray-300">Id</th>
                    <th class="text-start p-2 text-xs text-black font-medium border-r border-gray-300">Status</th>
                    <th class="text-start p-2 text-xs text-black font-medium border-r border-gray-300">Department</th>
                    <th class="text-start p-2 text-xs text-black font-medium border-r border-gray-300">Joining Date</th>
                    <th class="text-start p-2 text-xs text-black font-medium">Role</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($model as $employee): ?>
                    <tr class="border-b text-gray-300">
                        <th class="text-start p-2 text-xs text-black font-medium">
                            <div class="whitespace-nowrap flex items-center gap-2">
                                <img class="h-8 w-8 rounded-full" src="/image/speed.jpg" alt="profile">
                                <p><?= $employee['firstName'] . " " . $employee['lastName'] ?></p>
                            </div>
                        </th>
                        <th class="text-start p-2 text-xs text-black font-medium">#<?= $employee['id']?></th>
                        <th class="text-start p-2 text-xs text-black font-medium">
                            <span class="text-center px-3 py-1 text-black font-medium bg-yellow-500 rounded-full">Part-time</span>
                        </th>
                        <th class="text-start p-2 text-xs text-black font-medium">HR</th>
                        <th class="text-start p-2 text-xs text-black font-medium">09/16/2023</th>
                        <th class="text-start p-2 text-xs text-black font-medium">Streamer</th>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="animation/Form.js"></script>