<!doctype html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/style/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Bipay</title>
</head>
<body class="h-full relative">
<div class="flex items-center justify-center h-full w-full bg-indigo-900 bg-opacity-75 absolute z-10">
    <div class="flex flex-col gap-5 w-[800px] bg-white h-auto rounded-xl p-5">
        <h1 class="text-gray-800 text-2xl font-bold">Personal Information</h1>
<!--        Profile photo-->
        <div class="flex gap-3 items-center">
            <section class="flex flex-col gap-2 items-center w-auto">
                <h1 class="text-gray-700 text-sm font-semibold">Upload Avatar</h1>
                <img class="h-16 w-16 rounded-full" src="/image/speed.jpg" alt="avatar">
            </section>
            <section class="flex-1 gap-1">
                <input type="file" class="w-full mt-2 border border-gray-300 rounded-full py-2 px-4 text-gray-700 bg-gray-100">
                <p class="text-xs text-gray-500">PNG, JPG, JPEG</p>
            </section>
        </div>
        <section class="grid grid-cols-2 gap-3">
            <div class="flex flex-col gap-2">
                <label class="text-gray-700 text-sm font-semibold" for="firstName">First Name</label>
                <input class=" border border-gray-300 rounded-lg bg-gray-100" id="firstName" type="text" name="firstName">
            </div>
            <div class="flex flex-col gap-2">
                <label class="text-gray-700 text-sm font-semibold" for="middleName">Middle Name</label>
                <input class=" border border-gray-300 rounded-lg bg-gray-100" id="middleName" type="text" name="middleName">
            </div>
            <div class="flex flex-col gap-2">
                <label class="text-gray-700 text-sm font-semibold" for="lastName">Last Name</label>
                <input class=" border border-gray-300 rounded-lg bg-gray-100" id="lastName" type="text" name="lastName">
            </div>
            <div class="flex flex-col gap-2">
                <label class="text-gray-700 text-sm font-semibold" for="dateOfBirth">Date of Birth</label>
                <input class=" border border-gray-300 rounded-lg bg-gray-100" id="dateOfBirth" type="date" name="dateOfBirth" value="2024-07-20">
            </div>
        </section>
        <h1 class="text-gray-800 text-2xl font-bold">Contact Information</h1>
        <section class="grid grid-cols-2 gap-3">
            <div class="flex flex-col gap-2">
                <label class="text-gray-700 text-sm font-semibold" for="email">Email</label>
                <input class=" border border-gray-300 rounded-lg bg-gray-100" id="email" type="email" name="email">
            </div>
            <div class="flex flex-col gap-2">
                <label class="text-gray-700 text-sm font-semibold" for="phoneNumber">Phone Number</label>
                <input class=" border border-gray-300 rounded-lg bg-gray-100" id="phoneNumber" type="text" name="phoneNumber">
            </div>
        </section>
        <h1 class="text-gray-800 text-2xl font-bold">Address</h1>
        <section class="grid grid-cols-2 gap-3">
            <div class="flex flex-col gap-2">
                <label class="text-gray-700 text-sm font-semibold" for="streetAddress">Street Address</label>
                <input class=" border border-gray-300 rounded-lg bg-gray-100" id="streetAddress" type="text" name="streetAddress">
            </div>
            <div class="flex flex-col gap-2">
                <label class="text-gray-700 text-sm font-semibold" for="city">City</label>
                <input class=" border border-gray-300 rounded-lg bg-gray-100" id="city" type="text" name="city">
            </div>
            <div class="flex flex-col gap-2">
                <label class="text-gray-700 text-sm font-semibold" for="state">State</label>
                <input class=" border border-gray-300 rounded-lg bg-gray-100" id="state" type="text" name="state">
            </div>
            <div class="flex flex-col gap-2">
                <label class="text-gray-700 text-sm font-semibold" for="zipCode">Zip Code</label>
                <input class=" border border-gray-300 rounded-lg bg-gray-100" id="zipCode" type="text" name="zipCode">
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
            <span id="addEmployeeCancelButton" class="cursor-pointer px-4 py-2 rounded-lg text-semibold text-sm border border-gray-500 text-gray-500">Cancel</span>
            <button type="submit"
                    class="px-4 py-2 rounded-lg text-semibold text-sm bg-indigo-900 text-white transition ease-in-out duration-300 hover:bg-indigo-500">
                Update
            </button>
        </div>
    </div>

</div>