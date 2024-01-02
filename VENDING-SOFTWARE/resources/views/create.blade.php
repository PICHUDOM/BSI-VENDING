    <div class="container-fluid" id="formbg">
        <div class="row">
            <div class="card-body myForm">
                <ul id="savaform_errlist"></ul>
                <div class="row g-3">
                    <div class="border-gray-900/10 pb-2">
                        <h5 class="text-base font-semibold leading-7 text-gray-900">ពត័មានអ្នកជំងឺ</h5>
                        <hr>
                    </div>
                    <div class="col-md-6">
                        <div>
                            <label for="name"
                                class="block text-sm font-medium leading-6 text-gray-900">ឈ្នោះអ្នកជំងឺ</label>
                            <div class="relative mt-2 rounded-md shadow-sm">
                                <input type="text" placeholder="បញ្ចូលឈ្នោះអ្នកជំងឺ" name="name" id="name"
                                    class=" block w-full rounded-md  py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 ">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div>
                            <label for="email"
                                class=" block text-sm font-medium leading-6 text-gray-900">អុីមែ</label>
                            <div class="relative mt-2 rounded-md shadow-sm">
                                <input type="email" name="email" id="email" placeholder="បញ្ចូលអុីមែ"
                                    pattern="^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$"
                                    class="@error('email')border-red-600 text-red-900 placeholder-red-700 @endif block w-full rounded-md  py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mt-6 space-y-6">
                            <div class="flex items-center gap-x-3">
                                <label for="" class="block text-sm font-medium leading-6 text-gray-900">ភេទ​
                                    ៖</label>
                                <input id="gender" name="gender" value="ប្រុស" type="radio"
                                    class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                <label for="Female"
                                    class="block text-sm font-medium leading-6 text-gray-900">ប្រុស</label>
                                <input id="gender" name="gender" value="ស្រី" type="radio"
                                    class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                <label for="push-email"
                                    class="block text-sm font-medium leading-6 text-gray-900">ស្រី</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div>
                            <label for="phone"
                                class=" block text-sm font-medium leading-6 text-gray-900">លេខទូរសព៍</label>
                            <div class="relative mt-2 rounded-md shadow-sm">
                                <input type="text" name="phone" id="phone" placeholder="(885)00-000-000"
                                    class=" block w-full rounded-md  py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div>
                            <label for="date_of_birth"
                                class="block text-sm font-medium leading-6 text-gray-900">ថ្ងៃខែឆ្នាំកំណើត</label>
                            <div class="relative mt-2 rounded-md shadow-sm">
                                <input type="date" placeholder="ថ្ងៃខែឆ្នាំកំណើត" name="date_of_birth"
                                    id="date_of_birth"
                                    class="block w-full rounded-md  py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 ">
                            </div>
                        </div>
                    </div>
                    <div class=" border-gray-900/10  pb-2 ">
                        <h5 class="text-base font-semibold leading-7 text-gray-900">អាសដ្ថាន</h5>
                        <hr>
                    </div>
                    <div class="col-md-6">
                        <div>
                            <label for="province"
                                class=" block text-sm font-medium leading-6 text-gray-900">ខេត្ត</label>
                            <div class="relative mt-2 rounded-md shadow-sm">
                                <select id="province" name="province" autocomplete="country-name"
                                    class="block w-full rounded-md  py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option value="" selected>សូមជ្រើសរើស</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div>
                            <label for="districts"
                                class=" block text-sm font-medium leading-6 text-gray-900">ស្រុក</label>
                            <div class="relative mt-2 rounded-md shadow-sm">
                                <select id="districts" name="districts" autocomplete="country-name"
                                    class="block w-full rounded-md  py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 ">
                                    <option selected>សូមជ្រើសរើស</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div>
                            <label for="communes" class="block text-sm font-medium leading-6 text-gray-900">ឃុំ</label>
                            <div class="relative mt-2 rounded-md shadow-sm">
                                <select id="communes" name="communes" autocomplete="country-name"
                                    class="block w-full rounded-md  py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 ">
                                    <option selected>សូមជ្រើសរើស</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div>
                            <label for="villages" class="block text-sm font-medium leading-6 text-gray-900">ភូមិ</label>
                            <div class="relative mt-2 rounded-md shadow-sm">
                                <select id="villages" name="villages" autocomplete="country-name"
                                    class="block w-full rounded-md  py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 ">
                                    <option selected>សូមជ្រើសរើស</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <button type="button" data-bs-dismiss="modal"
                            class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover: bg-red-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            <i class="fa fa-chevron-left" aria-hidden="true"></i> បោះបង់</button>
                        <button type="submit" id="submit"
                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"><i
                                class="bi bi-save"></i><i class="fa fa-save"></i> រក្សាទុក</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
