<?php
use app\constant\LeaveType;
use app\model\LeaveRequestModel;
/**
 * @var $requests LeaveRequestModel;
**/
?>
<div class="flex flex-col gap-5 size-full relative">
    <div id="leaveRequestContainer" class="hidden flex items-center justify-center absolute size-full">
        <form id="leaveRequestForm" method="POST" class="flex flex-col h-auto w-[300px] drop-shadow-lg rounded-lg bg-white p-4" enctype="multipart/form-data">
            <input type="text" hidden name="id" value="<?= \app\core\Application::$application->applicationUser->getId()?>">
            <div class="flex flex-col gap-2">
                <div class="flex flex-col gap-1">
                    <label class="text-gray-700 text-xs font-semibold" for="leaveType">Leave Type</label>
                    <select class="h-8 border text-xs border-gray-300 rounded-lg bg-gray-100" name="leaveType" id="leaveType">
                        <?php foreach(LeaveType::getLeaveTypes() as $leave): ?>
                            <option value="<?= $leave ?>"><?= $leave ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-gray-700 text-sm font-semibold" for="startDate">Start Date</label>
                    <input class="text-xs h-8 border border-gray-300 rounded-lg bg-gray-100" id="startDate" type="date" name="startDate">
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-gray-700 text-sm font-semibold" for="endDate">End Date</label>
                    <input class="text-xs h-8 border border-gray-300 rounded-lg bg-gray-100" id="endDate" type="date" name="endDate">
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-gray-700 text-sm font-semibold" for="attachment">Attachment</label>
                    <input class="p-1 text-xs h-8 border border-gray-300 rounded-lg bg-gray-100" id="attachment" type="file" name="attachment">
                </div>
                <div class="flex justify-end items-center gap-2  mt-2">
                    <button onclick="hideRequestForm(event)" class="px-3 py-1 rounded-lg text-xs font-bold bg-white text-gray-500 border border-gray-500">Cancel</button>
                    <button onclick="sendForm(event)" class="px-3 py-1 rounded-lg text-xs font-bold bg-indigo-900 text-white hover:bg-opacity-75">Send</button>
                </div>
            </div>
        </form>
    </div>
    <div class="size-full flex flex-col gap-3 rounded-lg bg-white">
        <div class="overflow-hidden rounded-lg">
            <div class="flex justify-between items-center mb-3">
                <h1 class="text-black text-md text-black font-bold">Requests List</h1>
                <button onclick="showRequestForm()" class="py-1 px-3 bg-indigo-900 rounded-full text-xs text-white hover:bg-opacity-75 font-bold"><span><i class="bi bi-plus"></i></span> Create Request</button>
            </div>
            <table class="table-auto w-full">
                <thead class="bg-gray-200 ">
                <tr>
                    <th class="text-start p-2 text-xs text-black font-medium">Type</th>
                    <th class="text-start p-2 text-xs text-black font-medium">Start date</th>
                    <th class="text-start p-2 text-xs text-black font-medium">End date</th>
                    <th class="text-start p-2 text-xs text-black font-medium">Attachment</th>
                    <th class="text-start p-2 text-xs text-black font-medium">Status</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($requests as $request): ?>
                        <tr class="border-b text-gray-300">
                            <th class="text-start p-2 text-xs text-black font-medium"><?= $request['leaveType'] ?></th>
                            <th class="text-start p-2 text-xs text-black font-medium"><?= $request['startDate'] ?></th>
                            <th class="text-start p-2 text-xs text-black font-medium"><?= $request['endDate'] ?></th>
                            <th class="text-start p-2 text-xs text-black font-medium">
                                <form action="/download" method="POST">
                                    <input type="text" name="fileName" value="<?= $request['attachment'] ?>" hidden>
                                    <button type="submit" class="cursor-pointer underline"><?= $request['attachment'] ?></button>
                                </form>
                            </th>
                            <th class="text-start p-2 text-xs text-black font-medium">
                                <span class="text-center px-3 py-1 font-medium rounded-full bg-gray-500 text-white"><?= $request['status'] ?></span>
                            </th>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="/animation/leaveRequestForm.js"></script>