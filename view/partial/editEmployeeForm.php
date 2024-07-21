<?php

use app\constant\Department;
use app\constant\Gender;
use app\constant\Role;
use app\constant\Status;
use app\core\Style;
use app\model\EmployeeModel;
/**
 * @var $employee EmployeeModel;
 **/
?>
<div class="flex items-center justify-center h-fit w-full drop-shadow-2xl absolute z-10">
    <form id="updateEmployeeForm" class="flex flex-col gap-5 w-[800px] bg-white h-auto rounded-xl p-5">
        <input type="text" hidden value="<?= $employee['photo'] ?>" name="currentPhoto">
        <input type="text" hidden value="<?= $employee['id'] ?>" name="id">
        <input type="email" hidden value="<?= $employee['email'] ?>" name="currentEmail">
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
                <p id="editFirstNameError" class="text-red-500 text-sm"></p>
            </div>
            <div class="flex flex-col gap-2">
                <label class="text-gray-700 text-sm font-semibold" for="middleName">Middle Name</label>
                <input class=" border border-gray-300 rounded-lg bg-gray-100" id="middleName" type="text" name="middleName" value="<?= $employee['middleName'] ?>">
            </div>
            <div class="flex flex-col gap-2">
                <label class="text-gray-700 text-sm font-semibold" for="lastName">Last Name</label>
                <input class=" border border-gray-300 rounded-lg bg-gray-100" id="lastName" type="text" name="lastName" value="<?= $employee['lastName'] ?>">
                <p id="editLastNameError" class="text-red-500 text-sm"></p>
            </div>
            <div class="flex flex-col gap-2">
                <label class="text-gray-700 text-sm font-semibold" for="dateOfBirth">Date of Birth</label>
                <input class=" border border-gray-300 rounded-lg bg-gray-100" id="dateOfBirth" type="date" name="dateOfBirth" value="<?= $employee['dateOfBirth'] ?>">
                <p id="editDateOfBirthError" class="text-red-500 text-sm"></p>
            </div>
            <div class="flex flex-col gap-2">
                <label class="text-gray-700 text-sm font-semibold" for="gender">Gender</label>
                <select name="gender" id="gender">
                    <?php foreach (Gender::getGenders() as $gender): ?>
                        <?php if ($gender == $employee['gender']): ?>
                            <option value="<?= $gender ?>" selected><?= $gender ?></option>
                        <?php continue; ?>
                    <?php endif; ?>
                        <option value="<?= $gender ?>"><?= $gender ?></option>
                        <?php endforeach; ?>
                </select>
            </div>
        </section>
        <h1 class="text-gray-800 text-2xl font-bold">Contact Information</h1>
        <section class="grid grid-cols-2 gap-3">
            <div class="flex flex-col gap-2">
                <label class="text-gray-700 text-sm font-semibold" for="email">Email</label>
                <input class=" border border-gray-300 rounded-lg bg-gray-100" id="email" type="email" name="email" value="<?= $employee['email'] ?>">
                <p id="editEmailError" class="text-red-500 text-sm"></p>
            </div>
            <div class="flex flex-col gap-2">
                <label class="text-gray-700 text-sm font-semibold" for="phoneNumber">Phone Number</label>
                <input class=" border border-gray-300 rounded-lg bg-gray-100" id="phoneNumber" type="text" name="phoneNumber" value="<?= $employee['phoneNumber'] ?>">
                <p id="editPhoneNumberError" class="text-red-500 text-sm"></p>
            </div>
        </section>
        <h1 class="text-gray-800 text-2xl font-bold">Address</h1>
        <section class="grid grid-cols-2 gap-3">
            <div class="flex flex-col gap-2">
                <label class="text-gray-700 text-sm font-semibold" for="streetAddress">Street Address</label>
                <input class=" border border-gray-300 rounded-lg bg-gray-100" id="streetAddress" type="text" name="streetAddress" value="<?= $employee['streetAddress'] ?>">
                <p id="editStreetAddressError" class="text-red-500 text-sm"></p>
            </div>
            <div class="flex flex-col gap-2">
                <label class="text-gray-700 text-sm font-semibold" for="city">City</label>
                <input class=" border border-gray-300 rounded-lg bg-gray-100" id="city" type="text" name="city" value="<?= $employee['city'] ?>">
                <p id="editCityError" class="text-red-500 text-sm"></p>
            </div>
            <div class="flex flex-col gap-2">
                <label class="text-gray-700 text-sm font-semibold" for="state">State</label>
                <input class=" border border-gray-300 rounded-lg bg-gray-100" id="state" type="text" name="state" value="<?= $employee['state'] ?>">
                <p id="editStateError" class="text-red-500 text-sm"></p>
            </div>
            <div class="flex flex-col gap-2">
                <label class="text-gray-700 text-sm font-semibold" for="zipCode">Zip Code</label>
                <input class=" border border-gray-300 rounded-lg bg-gray-100" id="zipCode" type="text" name="zipCode" value="<?= $employee['zipCode'] ?>">
                <p id="editZipCodeError" class="text-red-500 text-sm"></p>
            </div>
        </section>
        <h1 class="text-gray-800 text-2xl font-bold">Work Information</h1>
        <section class="grid grid-cols-2 gap-3">
            <div class="flex flex-col gap-2">
                <label class="text-gray-700 text-sm font-semibold" for="status">Status</label>
                <select class=" border border-gray-300 rounded-lg bg-gray-100" name="status" id="status">
                    <?php foreach(Status::getStatus() as $status): ?>
                    <?php if ($status == $employee['status']): ?>
                        <option value="<?= $status ?>" selected><?= $status ?></option>
                    <?php continue; ?>
                    <?php endif; ?>
                        <option value="<?= $status ?>"><?= $status ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="flex flex-col gap-2">
                <label class="text-gray-700 text-sm font-semibold" for="department">Department</label>
                <select class=" border border-gray-300 rounded-lg bg-gray-100" name="department" id="department">
                    <?php foreach(Department::getDepartments() as $department): ?>
                        <?php if ($department == $employee['department']): ?>
                            <option value="<?= $department ?>" selected><?= $department ?></option>
                            <?php continue; ?>
                        <?php endif; ?>
                        <option value="<?= $department ?>"><?= $department ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="flex flex-col gap-2">
                <label class="text-gray-700 text-sm font-semibold" for="role">Role</label>
                <select class=" border border-gray-300 rounded-lg bg-gray-100" name="role" id="role">
                    <?php foreach(Role::getRole() as $role): ?>
                        <?php if ($role == $employee['role']): ?>
                            <option value="<?= $role ?>" selected><?= $role ?></option>
                            <?php continue; ?>
                        <?php endif; ?>
                        <option value="<?= $role ?>"><?= $role ?></option>
                    <?php endforeach; ?>
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
<script src="/animation/employeeTableActions.js"></script>
