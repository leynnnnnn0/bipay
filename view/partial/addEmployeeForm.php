<div class="absolute h-full w-full flex items-center justify-center bg-gray-900 bg-opacity-50 rounded-lg">
    <form class="flex flex-col bg-white w-[900px] rounded-lg p-5" method="post" enctype="multipart/form-data">
        <div class="grid grid-cols-3 gap-3">
            <section class="flex flex-col gap-3">
                <div class="container flex flex-col gap-2">
                    <label for="photo" class="text-gray-800 text-xs font-medium">Photo *</label>
                    <input class="border-2 rounded-lg h-11" type="file" id="photo" name="photo">
                </div>
                <div class="container flex flex-col gap-2">
                    <label for="firstName" class="text-gray-800 text-xs font-medium">First Name *</label>
                    <input class="rounded-lg" placeholder="John" type="text" id="firstName" name="firstName">
                </div>
                <div class="container flex flex-col gap-2">
                    <label for="middleName" class="text-gray-800 text-xs font-medium">Middle Name</label>
                    <input class="rounded-lg" placeholder="" type="text" id="middleName" name="middleName">
                </div>
                <div class="container flex flex-col gap-2">
                    <label for="lastName" class="text-gray-800 text-xs font-medium">Last Name *</label>
                    <input class="rounded-lg" placeholder="Doe" type="text" id="lastName" name="lastName">
                </div>
                <div class="container flex flex-col gap-2">
                    <label for="dateOfBirth" class="text-gray-800 text-xs font-medium">Date of birth *</label>
                    <input class="rounded-lg" placeholder="Doe" type="date" id="dateOfBirth" name="dateOfBirth">
                </div>
            </section>
            <section class="flex flex-col gap-3">
                <div class="container flex flex-col gap-2">
                    <label for="streetAddress" class="text-gray-800 text-xs font-medium">Address / Street *</label>
                    <input class="rounded-lg" placeholder="Block 6 lot 2" type="text" id="streetAddress" name="streetAddress">
                </div>
                <div class="container flex flex-col gap-2">
                    <label for="city" class="text-gray-800 text-xs font-medium">City</label>
                    <input class="rounded-lg" placeholder="Ximpiang" type="text" id="city" name="city">
                </div>
                <div class="container flex flex-col gap-2">
                    <label for="state" class="text-gray-800 text-xs font-medium">State / Province *</label>
                    <input class="rounded-lg" placeholder="Norway" type="text" id="state" name="state">
                </div>
                <div class="container flex flex-col gap-2">
                    <label for="zipCode" class="text-gray-800 text-xs font-medium">Zip Code *</label>
                    <input class="rounded-lg" placeholder="3431" type="text" id="zipCode" name="zipCode">
                </div>
            </section>
            <section class="flex flex-col gap-3">
                <div class="container flex flex-col gap-2">
                    <label for="email" class="text-gray-800 text-xs font-medium">Email *</label>
                    <input class="rounded-lg" placeholder="johndoe@gmail.com" type="email" id="email" name="email">
                </div>
                <div class="container flex flex-col gap-2">
                    <label for="phoneNumber" class="text-gray-800 text-xs font-medium">Phone *</label>
                    <input class="rounded-lg" placeholder="94325453212" type="text" id="phoneNumber" name="phoneNumber">
                </div>
            </section>
        </div>
        <div class="container flex items-center justify-end gap-2">
            <span id="addEmployeeCancelButton" class="cursor-pointer px-4 py-1 font-semibold text-gray-800 text-center rounded-lg bg-gray-300 text-sm">Cancel</span>
            <button class="px-4 py-1 font-semibold text-white text-center rounded-lg bg-indigo-900 text-sm">Save</button>
        </div>
    </form>
</div>