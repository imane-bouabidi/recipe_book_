    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
        <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    </head>
    <style>
        /* Custom style */
        .header-right {
            width: calc(100% - 3.5rem);
        }

        .sidebar:hover {
            width: 16rem;
        }

        @media only screen and (min-width: 768px) {
            .header-right {
                width: calc(100% - 16rem);
            }
        }
    </style>

    <body>
        <div x-data="setup()" :class="{ 'dark': isDark }">
            <div
                class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white dark:bg-gray-700 text-black dark:text-white">

                <!-- Header -->
                <div class="fixed w-full flex items-center justify-between h-14 text-white z-10">
                    <div
                        class="flex items-center justify-end md:justify-center pl-3 w-14 md:w-64 h-14 bg-black dark:bg-gray-800 border-none">
                        <img class="w-5 h-5 md:w-10 md:h-10 mr-2 rounded-full overflow-hidden"
                            src="https://therminic2018.eu/wp-content/uploads/2018/07/dummy-avatar.jpg" />
                        <span class="hidden md:block">{{ auth()->user()->name }}</span>
                    </div>
                    <div class="flex justify-end items-center h-14 bg-black dark:bg-gray-800 header-right">
                        <ul class="flex items-center">

                            <li>
                                <a href="{{ route('home') }}"
                                    class="flex items-end justify-end mr-4 hover:text-blue-100">
                                    <span class="inline-flex mr-1">
                                    </span>
                                    Home
                                </a>
                            </li>
                            <li>


                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="index.php?action=logOut"
                                        class="flex items-end justify-end mr-4 hover:text-blue-100">
                                        <span class="inline-flex mr-1">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                                </path>
                                            </svg>
                                        </span>
                                        <button type="submit">Logout</button>
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- ./Header -->

                <!-- Sidebar -->
                <div
                    class="fixed flex flex-col top-14 left-0 w-14 hover:w-64 md:w-64 bg-gray-500 dark:bg-gray-900 h-full text-white transition-all duration-300 border-none z-10 sidebar">
                    <div class="overflow-y-auto overflow-x-hidden flex flex-col justify-between flex-grow">
                        <ul class="flex flex-col py-4 space-y-1">
                            <li class="px-5 hidden md:block">
                                <div class="flex flex-row items-center h-8">
                                    <div class="text-sm font-light tracking-wide text-gray-400 uppercase">Main</div>
                                </div>
                            </li>
                            <li>
                                <a href="{{ route('userRecipes') }}"
                                    class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-black dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-white dark:hover:border-gray-800 pr-6">
                                    <span class="inline-flex justify-center items-center ml-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25px" height="25px"
                                            viewBox="0 0 24 24" fill="none">
                                            <path clip-rule="evenodd"
                                                d="m12 3.75c-4.55635 0-8.25 3.69365-8.25 8.25 0 4.5563 3.69365 8.25 8.25 8.25 4.5563 0 8.25-3.6937 8.25-8.25 0-4.55635-3.6937-8.25-8.25-8.25zm-9.75 8.25c0-5.38478 4.36522-9.75 9.75-9.75 5.3848 0 9.75 4.36522 9.75 9.75 0 5.3848-4.3652 9.75-9.75 9.75-5.38478 0-9.75-4.3652-9.75-9.75zm9.75-.75c.4142 0 .75.3358.75.75v3.5c0 .4142-.3358.75-.75.75s-.75-.3358-.75-.75v-3.5c0-.4142.3358-.75.75-.75zm0-3.25c-.5523 0-1 .44772-1 1s.4477 1 1 1h.01c.5523 0 1-.44772 1-1s-.4477-1-1-1z"
                                                fill="white" fill-rule="evenodd" />
                                        </svg>
                                    </span>
                                    <span class="ml-2 text-sm tracking-wide truncate">Gestion des recettes</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('createRecipe') }}"
                                    class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-black dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-white dark:hover:border-gray-800 pr-6">
                                    <span class="inline-flex justify-center items-center ml-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25px" height="25px"
                                            viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path fill="#ffffff"
                                                d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zM200 344V280H136c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H248v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                                        </svg>
                                    </span>
                                    <span class="ml-2 text-sm tracking-wide truncate">Ajouter recette</span>
                                </a>
                            </li>
                        </ul>
                        <p class="mb-14 px-5 py-3 hidden md:block text-center text-xs">Copyright @2024</p>
                    </div>
                </div>
                <!-- ./Sidebar -->

                <div class="h-full ml-14 mt-14 mb-10 md:ml-64">

                    <div class="mt-4 mx-4 ">

                        <h1 class="text-center  m-10">Gestion Des Recettes</h1>
                        <!-- Client Table -->
                        <div class="mt-4 mx-4">
                            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                                <div class="w-full overflow-x-auto">
                                    <table class="w-full">
                                        <thead>
                                            <tr
                                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                                <th class="px-4 py-3">Image</th>
                                                <th class="px-4 py-3">Titre</th>
                                                <th class="px-4 py-3">Date de creation</th>
                                                <th class="px-4 py-3">Contenu</th>
                                                <th class="px-4 py-3">Update</th>
                                                <th class="px-4 py-3">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                            @foreach ($recipes as $recipe)
                                                <tr
                                                    class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                                                    <td class="px-4 py-3">
                                                        <div class="flex items-center text-sm">
                                                            <div>
                                                                <img class="w-16" src="storage/{{ $recipe->image }}">

                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-4 py-3">
                                                        <div class="flex items-center text-sm">
                                                            <div>
                                                                <p class="font-semibold">
                                                                    {{ $recipe->title }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-4 py-3">
                                                        <div class="flex items-center text-sm">
                                                            <div>
                                                                <p class="font-semibold">
                                                                    {{ $recipe->created_at }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-4 py-3">
                                                        <div class="flex items-center text-sm">
                                                            <div>
                                                                <a href="{{ route('recipe_book.details', $recipe->id) }}"
                                                                    class="px-2 py-1 font-semibold leading-tight text-black-700 bg-green-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                                                    View Recette
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-4 py-3">
                                                        <div class="flex items-center text-sm">
                                                            <div>
                                                                <a href="index.php?action=showUpdateWiki&id="
                                                                    class="px-2 py-1 font-semibold leading-tight text-black-700 bg-green-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                                                    Update Recette
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-4 py-3 text-sm">
                                                        <form action="{{ route('recipes.destroy', $recipe->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                                                Delete Recette
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- ./Client Table -->



                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>

    </html>
