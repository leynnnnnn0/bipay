<?php
use app\model\LeaveRequestModel;
/**
 * @var $requests LeaveRequestModel;
**/
?>
<div class="flex flex-col gap-5 size-full">
    <h1 class="font-bold text-xl text-gray-800">Leave Requests</h1>
    <div class="flex justify-between"></div>
    <div class="size-full flex flex-col gap-3 rounded-lg bg-white p-5">
        <div class="overflow-hidden rounded-lg">
            <h1 class="text-black text-md text-black font-bold mb-3">Requests List</h1>
            <table class="table-auto w-full">
                <thead class="bg-gray-200 ">
                <tr>
                    <th class="text-start p-2 text-xs text-black font-medium">Profile</th>
                    <th class="text-start p-2 text-xs text-black font-medium">Start date</th>
                    <th class="text-start p-2 text-xs text-black font-medium">End date</th>
                    <th class="text-start p-2 text-xs text-black font-medium">Department</th>
                    <th class="text-start p-2 text-xs text-black font-medium">Type</th>
                    <th class="text-start p-2 text-xs text-black font-medium">Status</th>
                    <th class="text-start p-2 text-xs text-black font-medium">Attachment</th>
                    <th class="text-start p-2 text-xs text-black font-medium">Action</th>

                </tr>
                </thead>
                <tbody>
                <?php foreach ($requests as $request): ?>
                    <tr class="border-b text-gray-300">
                        <th class="text-start p-2 text-xs text-black font-medium">N/A</th>
                        <th class="text-start p-2 text-xs text-black font-medium"><?= $request['startDate'] ?></th>
                        <th class="text-start p-2 text-xs text-black font-medium"><?= $request['endDate'] ?></th>
                        <th class="text-start p-2 text-xs text-black font-medium">N/A</th>
                        <th class="text-start p-2 text-xs text-black font-medium"><?= $request['leaveType'] ?></th>
                        <th class="text-start p-2 text-xs text-black font-medium">
                            <span class="text-center px-3 py-1 font-medium rounded-full bg-gray-500 text-white"><?= $request['status'] ?></span>
                        </th>
                        <th class="text-start p-2 text-xs text-black font-medium">
                            <form action="/download" method="POST">
                                <input type="text" name="fileName" value="<?= $request['attachment'] ?>" hidden>
                                <button type="submit" class="cursor-pointer underline"><?= $request['attachment'] ?></button>
                            </form>
                        </th>
                        <th class="text-start p-2 text-xs text-black font-medium">
                            <div id="requestListOptions" class="relative">
                                <button onclick="showRequestListOptions('<?= $request['attachment'] ?>')" class="container">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <div id="<?= $request['attachment'] ?>" class="hidden flex flex-col absolute drop-shadow-lg bg-white z-10" style="top: 100%; right: 30px;">
                                    <button class="py-2 px-4 border-b border-gray-300 hover:bg-gray-100">Approve</button>
                                    <button class="py-2 px-4 hover:bg-gray-100 ">Decline</button>
                                </div>
                            </div>
                        </th>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="/animation/requestTableActions.js"></script>
