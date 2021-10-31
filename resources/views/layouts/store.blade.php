<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}">
    @hasSection('title')
        @yield('title')
    @else
        <title>
            olex-repelica
        </title>
    @endif
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

    </style>
    @stack('CSS')

</head>

<body class="bg-gray-50 font-sans leading-normal tracking-normal">

    <div class="container mx-auto w-2/3">
        <div class="my-20 flex lg:flex-row sm:flex-col align-baseline justify-between ">
            <a class="text-blue-500  no-underline hover:text-blue-700 hover:no-underline"
                href="{{ route('store.home') }}">
                <span class=" text-2xl pl-2"><i class="em em-grinning"></i> olx-repilica</span>
            </a>
            <div class="lg:flex flex-row">
                <a class=" transition duration-500 ease-in-out text-blue-500 text-xl hover:border-blue-400 p-3 no-underline hover:bg-blue-400 hover:text-white rounded-lg hover:no-underline"
                    href="{{ route('store.home') }}">
                    help and contact
                </a>
                <div class="relative">
                    <!-- Dropdown toggle button -->
                    <button id='auth-trigger'
                        class="relative flex flex-row z-10  transition duration-500 ease-in-out text-blue-500 text-xl hover:border-blue-400 p-3 no-underline hover:bg-blue-400 hover:text-white rounded-lg hover:no-underline focus:outline-none">

                        my account <svg class="w-6 h-7 ml-2 dark:text-white" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id='auth-dropdown'
                        class="absolute hidden  right-0 z-20 w-48 py-2 mt-2 bg-white rounded-md shadow-xl dark:bg-gray-800">
                        @auth

                            @if (Auth::user()->type === 'Admin')
                                <a href="{{ route('dashboard') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-blue-500 hover:text-white dark:hover:text-white">
                                    dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-blue-500 hover:text-white dark:hover:text-white">
                                    my Ads
                                </a>
                            @endif

                            <a href="{{ route('login') }}"
                                class="block px-4 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-blue-500 hover:text-white dark:hover:text-white">
                                profile
                            </a>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit"
                                    class="block px-4 py-2 text-sm text-gray-700 capitalize w-full text-left transition-colors duration-200 transform dark:text-gray-300 hover:bg-blue-500 hover:text-white dark:hover:text-white">
                                    logout
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}"
                                class="block px-4 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-blue-500 hover:text-white dark:hover:text-white">
                                login
                            </a>
                            <a href="{{ route('register') }}"
                                class="block px-4 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-blue-500 hover:text-white dark:hover:text-white">
                                regiester
                            </a>
                        @endauth

                    </div>
                </div>
                @auth
                    <button
                        class="bg-yellow-500 text-white active:bg-yellow-600 flex flex-row flex-nowrap font-bold text-md px-2 py-3 ml-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                        type="button" onclick="toggleModal('modal-id')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <p>place an ad </p>
                    </button>
                    <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center"
                        id="modal-id">
                        <div class="relative w-auto my-6 mx-auto max-w-3xl">
                            <!--content-->
                            <div
                                class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                                <!--header-->
                                <div
                                    class="flex items-start justify-between p-5 text-blue-400 border-b border-solid border-blueGray-200 rounded-t">
                                    <h3 class="text-3xl font-semibold">
                                        create an ad
                                    </h3>
                                    <button
                                        class=" transition duration-300 ml-auto border border-transparent float-right text-3xl bg-red-500 p-1 hover:bg-red-900 rounded-lg text-black hover:text-white leading-none font-semibold outline-none focus:outline-none"
                                        onclick="toggleModal('modal-id')">
                                        <span
                                            class="  h-6 w-6 text-2xl block outline-none text-center mb-2 focus:outline-none">
                                            ×
                                        </span>
                                    </button>
                                </div>
                                <div class="bg-red-500 w-4/5 mx-auto hidden flex flex-row rounded-lg text-small"
                                    id='error-alert'>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 m-1 ml-3 text-red-300"
                                        fill="none" viewBox="0 0 24 24 " stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                    <small class="error-alert-text text-white text-justify ml-2 mt-1 text-sm">
                                    </small>
                                    <button
                                        class=" transition duration-300 ml-auto border border-transparent float-right text-3xl rounded-lg text-black hover:text-white leading-none font-semibold outline-none focus:outline-none"
                                        onclick="close_alert('error-alert')">
                                        <span
                                            class="  h-8 w-3 text-2xl block outline-none mr-5 text-center focus:outline-none">
                                            ×
                                        </span>
                                    </button>
                                </div>
                                <div class="bg-green-500 w-4/5 mx-auto hidden flex flex-row rounded-lg text-small"
                                    id='success-alert'>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 m-1 ml-3 text-green-300"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                    </svg>
                                    <small class="success-alert-text text-white text-justify ml-2 mt-1 text-sm">

                                    </small>
                                    <button
                                        class=" transition duration-300 ml-auto border border-transparent float-right text-3xl rounded-lg text-black hover:text-white leading-none font-semibold outline-none focus:outline-none"
                                        onclick="close_alert('success-alert')">
                                        <span
                                            class="  h-8 w-3 text-2xl block outline-none mr-5 text-center focus:outline-none">
                                            ×
                                        </span>
                                    </button>
                                </div>
                                <!--body-->
                                <form id='ad-form' enctype="multipart/form-data" action="" method="post">
                                    <div class="relative p-6 flex-col">

                                        <div class="flex flex-row justify-between">
                                            <div class="p-2">
                                                <label for="name"
                                                    class="text-sm font-semibold inline-block py-1 px-2 rounded text-blue-600 last:mr-0 mr-1">Title</label>
                                                <small class="text-red-500 text-xs text-center"
                                                    id='name-input-error'></small>
                                                <input type="text" id="Name" name="name" :value="old('name')" required
                                                    class="px-2 py-1 ad-form-input placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm border border-blue-300 shadow outline-none focus:outline-none focus:ring w-full">
                                            </div>
                                            <div class="p-2">
                                                <label for="category"
                                                    class="text-sm font-semibold inline-block py-1 px-2 rounded text-blue-600 last:mr-0 mr-1">select
                                                    category</label>
                                                <small class="text-red-500 text-xs text-center"
                                                    id='category_id-input-error'></small>
                                                <select name="category_id" id="category_id" required
                                                    class="px-2 py-1 ad-form-input placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm border border-blue-300 shadow outline-none focus:outline-none focus:ring w-full">
                                                    @if (request()->has('category_id'))
                                                        <option value=""> select a category ... </option>
                                                    @else
                                                        <option value="" selected> select a category ... </option>
                                                    @endif
                                                    @foreach ($categories as $category)
                                                        @if (request()->filled('category_id') && request('category_id') === $category->id)
                                                            <option value="{{ $category->id }}" selected>
                                                                {{ $category->name }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $category->id }}"> {{ $category->name }}
                                                            </option>
                                                        @endif

                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="flex flex-row justify-between">
                                            <div class="p-2">
                                                <label for="image"
                                                    class="text-sm font-semibold inline-block py-1 px-2 rounded text-blue-600 last:mr-0 mr-1">upload
                                                    an image</label>
                                                <small class="text-red-500 text-xs text-center "
                                                    id='image-input-error'></small>
                                                <input type="file" id="image" name="image" :value="old('image')" required
                                                    class="px-2 py-1 ad-form-input placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm border border-blue-300 shadow outline-none focus:outline-none focus:ring w-full">
                                            </div>
                                            <div class=" p-2">

                                                <div class="relative flex w-full flex-wrap items-stretch mb-3">
                                                    <label for="price"
                                                        class="text-sm font-semibold inline-block py-1 px-2 rounded text-blue-600 last:mr-0 mr-1">price</label>
                                                    <small class="text-red-500 text-xs text-center"
                                                        id='price-input-error'></small>
                                                    <input type="number" name="price" id="price" :value="old('price')"
                                                        required
                                                        class="px-2 py-1 ad-form-input placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm border border-blue-300 shadow outline-none focus:outline-none focus:ring w-full" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex flex-row justify-between">

                                            <div class="p-2">
                                                <label for="discription"
                                                    class="text-sm font-semibold inline-block py-1 px-2 rounded text-blue-600 last:mr-0 mr-1">discription</label>
                                                <small class="text-red-500 text-xs text-center"
                                                    id='discription-input-error'></small>
                                                <textarea type="text" id="discription" name="discription" required
                                                    class="px-2 py-1 ad-form-input placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm border border-blue-300 shadow outline-none focus:outline-none focus:ring w-full">{{ old('discription') ?? '' }}</textarea>
                                            </div>
                                            <div class="p-2">
                                                <label for="tags"
                                                    class="text-sm font-semibold inline-block py-1 px-2 rounded text-blue-600 last:mr-0 mr-1">tags</label>
                                                <small class="text-red-500 text-xs text-center"
                                                    id='tags-input-error'></small>
                                                <small class="text-blue-500 text-xs opacity-90 ">tags are seperated by
                                                    space</small>
                                                <textarea type="text" id="tags" name="tags" required
                                                    class="px-2 py-1 ad-form-input placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm border border-blue-300 shadow outline-none focus:outline-none focus:ring w-full">{{ old('tags') ?? '' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <input id='user-id' type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                </form>
                                <!--footer-->
                                <div
                                    class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b">
                                    <button
                                        class="text-red-300 hover:text-white bg-red-500 hover:bg-red-900 rounded font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                        type="button" onclick="toggleModal('modal-id')">
                                        Close
                                    </button>
                                    <button
                                        class="bg-blue-500 hover:bg-blue-700 rounded flex flex-row flex-nowrap text-white active:bg-emerald-600 font-bold uppercase text-sm px-6 py-3  shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                        type="button" onclick="SubmitForm('ad-form')" id="submit-ad">
                                        <svg class=" hidden animate-spin duration-200 h-5 w-5 mr-3 border border-t-2 border-solid border-gray-300 rounded-full"
                                            viewBox="0 0 24 24" style="border-top-color: #3498db" id="spinner">

                                        </svg>
                                        <p>Save Changes</p>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>
                @endauth
            </div>


        </div>

        <div class=" mx-auto w-auto bg-blue-500 border rounded-lg mt-20">
            <form action="" method="post">
                <div class="flex flex-row flex-wrap my-5 justify-evenly">

                    <input type="text" class="form-input rounded-lg focus:border-blue-800" name="search-item"
                        id="search-item" placeholder="search your item here">
                    <input type="text" class="form-input rounded-lg focus:border-blue-800" name="search-area"
                        id="search-area" placeholder="search your area here">
                    <button type="submit" name="submit" id="submit"
                        class=" transition duration-500 ease-in-out bg-gray-100 text-blue-500 hover:text-black border flex flex-row flex-nowrap border-black hover:border-transparent cursor-pointer hover:bg-blue-300 rounded-md p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg> search
                    </button>
                </div>
            </form>
        </div>



        @yield('content')
    </div>


</body>

@stack('js')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    document.getElementById('auth-trigger').onclick = function() {
        document.getElementById('auth-dropdown').classList.toggle('hidden')
    }

    function close_alert(alert_id) {
        document.getElementById(alert_id).classList.toggle("hidden");
    }

    function toggleModal(modalID) {
        document.getElementById(modalID).classList.toggle("hidden");
        document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
        document.getElementById(modalID).classList.toggle("flex");
        document.getElementById(modalID + "-backdrop").classList.toggle("flex");
    }

    function SubmitForm(FormId) {
        const form = document.getElementById(FormId)
        const form_inputs = document.querySelectorAll('.ad-form-input')
        const data = new FormData(form)
        data.append('_token', "{{ csrf_token() }}");
        const spinner = document.getElementById('spinner');
        const submit = document.getElementById('submit-ad');
        submit.disabled = true;
        submit.classList.toggle('hover:cursor-not-allowed');
        spinner.classList.toggle('hidden');
        axios.post("{{ route('store.advertisement.store') }}", data, {
                header: {
                    "Content-Type": 'multipart/form-data',
                    "accept": "application/json",
                    'X-CSRF-TOKEN': document.querySelector('meta[name="_token"]').content
                }
            }).then(res => {
                console.log(res);
                if (!(document.getElementById('error-alert').classList.contains('hidden'))) {
                    document.getElementById('error-alert').classList.add('hidden')
                };
                document.getElementById('success-alert').classList.toggle('hidden')
                document.querySelector('.success-alert-text').textContent = res.data.message;
                form_inputs.forEach(input => {
                    input.value = '';
                })
                form_inputs.forEach(input => {
                    const input_error = document.getElementById(input.name + '-input-error');
                    input_error.textContent = "";
                    if (input.classList.contains('border-red-500')) {
                        input.classList.remove('border-red-500');
                    }
                    if (!(input.classList.contains('border-blue-300'))) {
                        input.classList.add('border-blue-300');
                    }


                })
                // if (res.errors) {
                //     document.getElementById('error-alert').classList.remove('hidden')
                //     document.querySelector('.alert-text').textContent = newData.message;
                //     form_inputs.forEach(input => {
                //     if (res.errors.hasOwnProperty(input.name)) {
                //         input.classList.add('border-red-500')
                //         input.classList.remove('border-blue-300')
                //         document.getElementById(input.name + '-input-error').textContent = res
                //             .errors[input.name];
                //     } else {
                //         input.classList.remove('border-red-500')
                //         input.classList.add('border-blue-300')
                //     }
                // })
                // } else {
                //     if (!(document.getElementById('error-alert').classList.contains('hidden'))) {
                //         document.getElementById('error-alert').classList.add('hidden')
                //     };
                // }
            }).catch(err => {
                const data = err.response.data;
                const errors = err.response.data.errors;
                console.log(data);
                console.log(errors);
                document.getElementById('error-alert').classList.remove('hidden')
                document.getElementById('success-alert').classList.add('hidden')
                document.querySelector('.error-alert-text').textContent = data.message;
                document.querySelector('.success-alert-text').textContent = '';
                form_inputs.forEach(input => {
                    const input_error = document.getElementById(input.name + '-input-error');
                    if (errors.hasOwnProperty(input.name)) {
                        input.classList.add('border-red-500');
                        input.classList.remove('border-blue-300');
                        input_error.textContent = errors[input
                            .name];
                    } else {
                        input.classList.remove('border-red-500');
                        input.classList.add('border-blue-300');
                        input_error.textContent = "";
                    }
                })

            })
            .then(res => {
                submit.disabled = false;
                submit.classList.toggle('hover:cursor-not-allowed');
                spinner.classList.toggle('hidden');
            });

    }
    // async function newpost(url = '', data = {}) {
    //     const form_inputs = document.querySelectorAll('.ad-form-input')
    //     form_inputs.forEach(input => {
    //         data.append(input.name, input.value);
    //         console.log(data.get(input.name))
    //     })
    //     data.append('_token', "{{ csrf_token() }}")
    //     const response = await fetch(url, {
    //         method: 'POST',
    //         credentials: "same-origin",
    //         headers: {
    //             "Content-Type": "application/json",
    //             "accept": "application/json",
    //             'X-CSRF-TOKEN': document.querySelector('meta[name="_token"]').content
    //         },
    //         body: data,
    //     });
    //     try {
    //         const newData = await response.json();
    //         return newData
    //     } catch (error) {
    //         console.log("error", error);
    //         // appropriately handle the error
    //     }
    // }

    var textArea = document.getElementById('tags')
    textArea.addEventListener('change', (event) => {
        var newText = event.target.value.trim().replace(/ /g, ',')
        event.target.value = newText
    })
</script>


</html>
