<?php

use app\core\Style;
use app\model\EmployeeModel;
/**
 * @var $employee EmployeeModel;
 **/
?>
<div class="flex items-center justify-center h-full w-full drop-shadow-2xl absolute z-10">
    <form id="updateEmployeeForm" class="flex flex-col gap-5 w-[800px] bg-white h-auto rounded-xl p-5">
        <input type="text" hidden value="<?= $employee['photo'] ?>" name="current_photo">
        <input type="text" hidden value="<?= $employee['id'] ?>" name="id">
        <h1 class="text-gray-800 text-2xl font-bold">Personal Information</h1>
        <!--        Profile photo-->
        <div class="flex gap-3 items-center">
            <section class="flex flex-col gap-2 items-center w-auto">
                <h1 class="text-gray-700 text-sm font-semibold">Upload Avatar</h1>
                <img class="h-16 w-16 rounded-full" src="/avatar/<?= Style::emptyImage($employee['photo'])?>" alt="avatar">
            </section>
            <section class="flex-1 gap-1">
                <input type="file" name="photo" class="w-full mt-2 border border-gray-300 rounded-full py-2 px-4 text-gray-700 bg-gray-100">
                <p class="text-xs text-gray-500">PNG, JPG, JPEG</p>
            </section>
        </div>
        <section class="grid grid-cols-2 gap-3">
            <div class="flex flex-col gap-2">
                <label class="text-gray-700 text-sm font-semibold" for="firstName">First Name</label>
                <input class=" border border-gray-300 rounded-lg bg-gray-100" id="firstName" type="text" name="firstName" value="<?= $employee['firstName'] ?>">
            </div>
            <div class="flex flex-col gap-2">
                <label class="text-gray-700 text-sm font-semibold" for="middleName">Middle Name</label>
                <input class=" border border-gray-300 rounded-lg bg-gray-100" id="middleName" type="text" name="middleName" value="<?= $employee['middleName'] ?>">
            </div>
            <div class="flex flex-col gap-2">
                <label class="text-gray-700 text-sm font-semibold" for="lastName">Last Name</label>
                <input class=" border border-gray-300 rounded-lg bg-gray-100" id="lastName" type="text" name="lastName" value="<?= $employee['lastName'] ?>">
            </div>
            <div class="flex flex-col gap-2">
                <label class="text-gray-700 text-sm font-semibold" for="dateOfBirth">Date of Birth</label>
                <input class=" border border-gray-300 rounded-lg bg-gray-100" id="dateOfBirth" type="date" name="dateOfBirth" value="<?= $employee['dateOfBirth'] ?>">
            </div>
            <div class="flex flex-col gap-2">
                <label class="text-gray-700 text-sm font-semibold" for="gender">Gender</label>
                <input class=" border border-gray-300 rounded-lg bg-gray-100" id="gender" type="text" name="gender" value="<?= $employee['gender'] ?>">
            </div>
        </section>
        <h1 class="text-gray-800 text-2xl font-bold">Contact Information</h1>
        <section class="grid grid-cols-2 gap-3">
            <div class="flex flex-col gap-2">
                <label class="text-gray-700 text-sm font-semibold" for="email">Email</label>
                <input class=" border border-gray-300 rounded-lg bg-gray-100" id="email" type="email" name="email" value="<?= $employee['email'] ?>">
            </div>
            <div class="flex flex-col gap-2">
                <label class="text-gray-700 text-sm font-semibold" for="phoneNumber">Phone Number</label>
                <input class=" border border-gray-300 rounded-lg bg-gray-100" id="phoneNumber" type="text" name="phoneNumber" value="<?= $employee['phoneNumber'] ?>">
            </div>
        </section>
        <h1 class="text-gray-800 text-2xl font-bold">Address</h1>
        <section class="grid grid-cols-2 gap-3">
            <div class="flex flex-col gap-2">
                <label class="text-gray-700 text-sm font-semibold" for="streetAddress">Street Address</label>
                <input class=" border border-gray-300 rounded-lg bg-gray-100" id="streetAddress" type="text" name="streetAddress" value="<?= $employee['streetAddress'] ?>">
            </div>
            <div class="flex flex-col gap-2">
                <label class="text-gray-700 text-sm font-semibold" for="city">City</label>
                <input class=" border border-gray-300 rounded-lg bg-gray-100" id="city" type="text" name="city" value="<?= $employee['city'] ?>">
            </div>
            <div class="flex flex-col gap-2">
                <label class="text-gray-700 text-sm font-semibold" for="state">State</label>
                <input class=" border border-gray-300 rounded-lg bg-gray-100" id="state" type="text" name="state" value="<?= $employee['state'] ?>">
            </div>
            <div class="flex flex-col gap-2">
                <label class="text-gray-700 text-sm font-semibold" for="zipCode">Zip Code</label>
                <input class=" border border-gray-300 rounded-lg bg-gray-100" id="zipCode" type="text" name="zipCode" value="<?= $employee['zipCode'] ?>">
            </div>
        </section>
        <h1 class="text-gray-800 text-2xl font-bold">Work Information</h1>
        <section class="grid grid-cols-2 gap-3">
            <div class="flex flex-col gap-2">
                <label class="text-gray-700 text-sm font-semibold" for="status">Status</label>
                <select class=" border border-gray-300 rounded-lg bg-gray-100" name="status" id="status">
                    <option value="ONBOARDING">ONBOARDING</option>
                    <option value="FULL-TIME">FULL-TIME</option>
                    <option value="PART-TIME">PART-TIME</option>
                    <option value="SEASONAL">SEASONAL</option>
                </select>
            </div>
            <div class="flex flex-col gap-2">
                <label class="text-gray-700 text-sm font-semibold" for="department">Department</label>
                <select class=" border border-gray-300 rounded-lg bg-gray-100" name="department" id="department">
                    <option value="HR">HR</option>
                    <option value="IT">IT</option>
                    <option value="FINANCE">FINANCE</option>
                </select>
            </div>
            <div class="flex flex-col gap-2">
                <label class="text-gray-700 text-sm font-semibold" for="role">Role</label>
                <select class=" border border-gray-300 rounded-lg bg-gray-100" name="role" id="role">
                    <option value="ADMIN">ADMIN</option>
                    <option value="WEB DESIGNER">WEB DESIGNER</option>
                    <option value="WEB DEVELOPER">WEB DEVELOPER</option>
                </select>
            </div>
            <div class="flex flex-col gap-2">
                <label class="text-gray-700 text-sm font-semibold" for="joiningDate">Joining Date</label>
                <input class=" border border-gray-300 rounded-lg bg-gray-100" id="joiningDate" type="date" name="joiningDate" value="2024-07-20">
            </div>
        </section>
        <div class="container flex justify-end items-center p-5 gap-3">
            <span onclick="hideEditForm()" class="cursor-pointer px-4 py-2 rounded-lg text-semibold text-sm border border-gray-500 text-gray-500">Cancel</span>
            <button onclick="updateEmployeeDetails(event)"
                    class="px-4 py-2 rounded-lg text-semibold text-sm bg-indigo-900 text-white transition ease-in-out duration-300 hover:bg-indigo-500">
                Update
            </button>
        </div>
    </form>
</div>
