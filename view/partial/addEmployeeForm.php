<div id="addEmployeeContainer" class="absolute h-full w-full flex items-center justify-center drop-shadow-2xl">
    <form class="container flex flex-col gap-1 bg-white rounded-lg w-[750px]" method="POST">
        <div class="container border-b border-gray-300 p-5">
            <h1 class="font-bold text-gray-800 text-2xl">New Employee Form</h1>
            <p class="text-gray-500 font-medium text-sm">Fill out the form carefully or <span class="underline text-indigo-900">Upload Employee File</span></p>
        </div>
        <div class="container p-5 flex flex-col gap-4">
            <!--  First Row-->
            <h1 class="text-gray-800 font-medium text-md">Employee Name</h1>
            <div class="grid grid-cols-3 gap-2">
                <div class="container flex flex-col gap-2">
                    <input class="border border-gray-300 rounded-md"
                           id="firstName"
                           name="firstName"
                           type="text">
                    <label for="firstName" class="text-gray-500 text-xs">First Name</label>
                </div>
                <div class="container flex flex-col gap-2">
                    <input class="border border-gray-300 rounded-md"
                           name="middleName"
                           id="middleName"
                           type="text">
                    <label for="middleName" class="text-gray-500 text-xs">Middle Name</label>
                </div>
                <div class="container flex flex-col gap-2">
                    <input class="border border-gray-300 rounded-md"
                           name="lastName"
                           id="lastName"
                           type="text">
                    <label for="lastName" class="text-gray-500 text-xs">Last Name</label>
                </div>
            </div>
            <!--        Second Row-->
            <div class="grid grid-cols-2 gap-2">
                <div class="container flex flex-col gap-4">
                    <h1 class="text-gray-800 font-medium text-md">Birth Date</h1>
                    <div class="grid grid-cols-3 gap-2">
                        <div class="container flex flex-col gap-2">
                            <select class="border border-gray-300 rounded-md font-medium text-gray-800"
                                    id="birthMonth"
                                    name="birthMonth"
                            >
                                <?php
                                use app\constant\Calendar;
                                use app\constant\Gender;

                                $months = Calendar::getMonths();
                                ?>
                                <?php foreach ($months as $month => $value): ?>
                                    <option value="<?= $value ?>"><?= $month ?></option>
                                <?php endforeach; ?>
                            </select>
                            <label for="birthMonth" class="text-gray-500 text-xs">Month</label>
                        </div>
                        <div class="container flex flex-col gap-2">
                            <select class="border border-gray-300 rounded-md font-medium text-gray-800"
                                    id="date"
                                    name="birthDate"
                            >
                                <?php
                                $dates = Calendar::getDates();
                                ?>
                                <?php foreach ($dates as $date): ?>
                                    <option value="<?= $date ?>"><?= $date ?></option>
                                <?php endforeach; ?>
                            </select>
                            <label for="date" class="text-gray-500 text-xs">Date</label>
                        </div>
                        <div class="container flex flex-col gap-2">
                            <select class="border border-gray-300 rounded-md font-medium text-gray-800"
                                    id="year"
                                    name="birthYear"
                            >
                                <?php
                                $years = Calendar::getYears();
                                ?>
                                <?php foreach ($years as $year): ?>
                                    <option value="<?= $year ?>"><?= $year ?></option>
                                <?php endforeach; ?>
                            </select>
                            <label for="year" class="text-gray-500 text-xs">Year</label>
                        </div>
                    </div>
                </div>
                <div class="container flex flex-col gap-4">
                    <h1 class="text-gray-800 font-medium text-md">Gender</h1>
                    <div class="container flex flex-col gap-2">
                        <select class="border border-gray-300 rounded-md font-medium text-gray-800"
                                id="gender"
                                name="gender"
                        >
                            <?php
                            $genders = Gender::getGenders();
                            ?>
                            <?php foreach ($genders as $gender): ?>
                                <option value="<?= $gender ?>"><?= $gender ?></option>
                            <?php endforeach; ?>
                        </select>
                        <label for="gender" class="text-gray-500 text-xs">Gender</label>
                    </div>
                </div>
            </div>
            <!--        here-->
            <!--        Third Row-->
            <div class="container flex flex-col gap-4">
                <h1 class="text-gray-800 font-medium text-md">Address</h1>
                <div class="container flex flex-col gap-2">
                    <div class="container flex flex-col gap-2">
                        <input class="border border-gray-300 rounded-md"
                               name="streetAddress"
                               id="streetAddress"
                               type="text">
                        <label for="streetAddress" class="text-gray-500 text-xs">Street Address</label>
                    </div>
                    <div class="grid grid-cols-3 gap-3">
                        <div class="container flex flex-col gap-2">
                            <input class="border border-gray-300 rounded-md"
                                   name="city"
                                   id="city"
                                   type="text">
                            <label for="city" class="text-gray-500 text-xs">City</label>
                        </div>
                        <div class="container flex flex-col gap-2">
                            <input class="border border-gray-300 rounded-md"
                                   name="state"
                                   id="state"
                                   type="text">
                            <label for="state" class="text-gray-500 text-xs">State</label>
                        </div>
                        <div class="container flex flex-col gap-2">
                            <input class="border border-gray-300 rounded-md"
                                   name="zipCode"
                                   id="zipCode"
                                   type="text">
                            <label for="zipCode" class="text-gray-500 text-xs">Zip Code</label>
                        </div>
                    </div>
                </div>
            </div>

            <!--        Fourth Row-->
            <div class="container flex flex-col gap-5">
                <h1 class="text-gray-800 font-medium text-md">Contact</h1>
                <div class="grid grid-cols-2 gap-2">
                    <div class="container flex flex-col gap-2">
                        <input class="border border-gray-300 rounded-md"
                               id="email"
                               name="email"
                               type="email">
                        <label for="email" class="text-gray-500 text-xs">Email</label>
                    </div>
                    <div class="container flex flex-col gap-2">
                        <input class="border border-gray-300 rounded-md"
                               id="phoneNumber"
                               name="phoneNumber"
                               type="text">
                        <label for="phoneNumber" class="text-gray-500 text-xs">Phone Number</label>
                    </div>
                </div>
            </div>
        </div>


        <div class="container flex justify-end items-center p-5 gap-3">
            <span id="addEmployeeCancelButton" class="cursor-pointer px-4 py-2 rounded-lg text-semibold text-sm border border-gray-500 text-gray-500">Cancel</span>
            <button id="submitEmployeeButton" class="px-4 py-2 rounded-lg text-semibold text-sm bg-indigo-900 text-white">Submit</button>
        </div>
    </form>
</div>