<?php
use app\model\LeaveRequestModel;
/**
 * @var $data LeaveRequestModel;
 * @var $summary LeaveRequestModel;
**/
?>
<div class="flex flex-col gap-5 size-full">
    <h1 class="font-bold text-xl text-gray-800">Leave Summary</h1>
    <div class="size-full flex flex-col gap-3 rounded-lg bg-white p-5">
        <div class="grid grid-cols-3 border border-gray-300 rounded-lg w-full h-24 p-3">
            <section class="border-r border-gray-300 p-3">
                <h1 class="text-2xl text-gray-900 font-bold"><?= count($data) ?? 0 ?></h1>
                <p class="text-xs text-gray-500 text-nowrap">Leave Requests</p>
            </section>
            <section class="border-r border-gray-300 p-3">
                <h1 class="text-2xl text-gray-900 font-bold"><?= $summary['PENDING'] ?? 0 ?></h1>
                <p class="text-xs text-gray-500 text-nowrap">Pending Requests</p>
            </section>
            <section class="p-3">
                <h1 class="text-2xl text-gray-900 font-bold"><?= $summary['ON LEAVE'] ?? 0 ?></h1>
                <p class="text-xs text-gray-500 text-nowrap">On leave</p>
            </section>
        </div>
        <div class="overflow-hidden rounded-lg">
            <h1 class="text-black text-md text-black font-bold mb-3">On leave</h1>
            <table class="table-auto w-full">
                <thead class="bg-gray-200 ">
                <tr>
                    <th class="text-start p-2 text-xs text-black font-medium">Profile</th>
                    <th class="text-start p-2 text-xs text-black font-medium">Start date</th>
                    <th class="text-start p-2 text-xs text-black font-medium">End date</th>
                    <th class="text-start p-2 text-xs text-black font-medium">Department</th>
                    <th class="text-start p-2 text-xs text-black font-medium">Type</th>
                    <th class="text-start p-2 text-xs text-black font-medium">Attachment</th>
                </tr>
                </thead>
                <tbody>
                <tr class="border-b text-gray-300">
                    <th class="text-start p-2 text-xs text-black font-medium">
                        <div class="whitespace-nowrap flex items-center gap-2">
                            <img class="h-8 w-8 rounded-full" src="/avatar/empty.png" alt="profile">
                            <p>Darren Watkins</p>
                        </div>
                    </th>
                    <th class="text-start p-2 text-xs text-black font-medium">Dec 4, 2023</th>
                    <th class="text-start p-2 text-xs text-black font-medium">Dec 6, 2023</th>
                    <th class="text-start p-2 text-xs text-black font-medium">HR</th>
                    <th class="text-start p-2 text-xs text-black font-medium">Sick Leave</th>
                    <th class="text-start p-2 text-xs text-black font-medium">leave.pdf</th>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>