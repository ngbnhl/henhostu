<template>
    <div id="app">
        <div class="flex h-screen bg-gray-50 dark:bg-gray-900">
            <!-- Desktop sidebar -->
            <aside
                class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0"
            >
                <div class="py-4 text-gray-500 dark:text-gray-400">
                    <div class="flex justify-center">
                        <div class="relative w-24 h-24">
                            <img alt="user image"
                                 class="rounded-full border border-gray-100 shadow-sm"
                                 src="https://randomuser.me/api/portraits/women/81.jpg"/>
                            <div
                                class="absolute top-0 right-0 h-6 w-6 my-1 border-4 border-white rounded-full bg-green-400 z-2"></div>
                        </div>
                    </div>

                    <div class="flex justify-center mt-8">
                        <!--Avatar Icon-->
                        <button class="mr-4" @click="openModalAvatar()">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"/>
                            </svg>
                        </button>
                        <dialog-modal :show="modalAvatar" v-on:close="close">
                            <template v-slot:title>
                                Change Profile Avatar
                            </template>
                            <template v-slot:content>
                                <div class="flex w-full items-center justify-center bg-grey-lighter">
                                    <label
                                        class="w-64 flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-white"
                                        for="my-file">
                                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z"/>
                                        </svg>
                                        <span class="mt-2 text-base leading-normal">Select a file</span>
                                        <input id="my-file" accept="image/*" class="form-control-file"
                                               style="display: none" type="file" @change="previewImage">
                                    </label>
                                </div>
                                <div class="border p-2 mt-3">
                                    <p>Preview Here:</p>
                                    <template v-if="preview">
                                        <img :src="preview" class="img-fluid"/>
                                        <p class="mb-0">file name: {{ image.name }}</p>
                                        <p class="mb-0">size: {{ image.size / 1024 }}KB</p>
                                    </template>
                                </div>

                            </template>
                            <template v-slot:footer>
                                <div class="flex justify-end px-8 pb-8 pt-4">
                                    <button
                                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l"
                                        @click="upload()">
                                        Upload
                                    </button>
                                    <button
                                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-r"
                                        @click="close()">
                                        Cancel
                                    </button>
                                </div>
                            </template>
                        </dialog-modal>
                        <button class="mr-4">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"/>
                            </svg>
                        </button>
                        <button class="mr-4">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"/>
                            </svg>
                        </button>
                        <button class="mr-4">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"/>
                            </svg>
                        </button>
                    </div>
                    <ul class="mt-6">
                        <li class="relative px-6 py-3">
                          <span
                              aria-hidden="true"
                              class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                          ></span>
                            <jet-nav-link :href="route('home')"
                                          class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100">
                                <svg
                                    class="h-6 w-6"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"
                                    />
                                </svg>
                                <span class="ml-4">Dashboard</span>
                            </jet-nav-link>
                        </li>
                    </ul>
                    <ul>
                        <li class="relative px-6 py-3">
                            <jet-nav-link :href="route('userprofile')">
                                <svg
                                    class="h-6 w-6"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                    />
                                </svg>
                                <span class="ml-4">Your Profile</span>
                            </jet-nav-link>
                        </li>
                        <li class="relative px-6 py-3">
                            <jet-nav-link :href="route('friends')">
                                <svg class="h-6 w-6"
                                     fill="none"
                                     stroke="currentColor"
                                     stroke-linecap="round"
                                     stroke-linejoin="round"
                                     stroke-width="2"
                                     viewBox="0 0 24 24"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>

                                <span class="ml-4">Friends</span>
                            </jet-nav-link>
                        </li>
                        <li class="relative px-6 py-3">
                            <jet-nav-link :href="route('messages')">
                                <svg
                                    class="h-6 w-6"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                    />
                                </svg>
                                <span class="ml-4">Messages</span>
                            </jet-nav-link>
                        </li>
                        <li class="relative px-6 py-3">
                            <a
                                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                href="buttons.html"
                            >
                                <svg
                                    class="h-6 w-6"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                    />
                                </svg>
                                <span class="ml-4">Albums</span>
                            </a>
                        </li>
                        <li class="relative px-6 py-3">
                            <a
                                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                href="modals.html"
                            >
                                <svg
                                    class="h-6 w-6"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"/>
                                </svg>
                                <span class="ml-4">Posts</span>
                            </a>
                        </li>
                        <li class="relative px-6 py-3">
                            <a
                                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                href="tables.html"
                            >
                                <svg
                                    class="h-6 w-6"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                    />
                                </svg>
                                <span class="ml-4">Star</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </aside>
            <div class="flex flex-col flex-1">
                <header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
                    <div
                        class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600 dark:text-purple-300"
                    >
                        <!-- Search input -->
                        <div class="flex justify-center flex-1 lg:mr-32">
                            <div
                                class="relative w-full max-w-xl mr-6 focus-within:text-purple-500"
                            >
                                <div class="absolute inset-y-0 flex items-center pl-2">
                                    <svg
                                        aria-hidden="true"
                                        class="w-4 h-4"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                    >
                                        <path
                                            clip-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            fill-rule="evenodd"
                                        ></path>
                                    </svg>
                                </div>
                                <input
                                    aria-label="Search"
                                    class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
                                    placeholder="Search for projects"
                                    type="text"
                                />
                            </div>
                        </div>
                        <ul class="flex items-center flex-shrink-0 space-x-6">
                            <!-- Theme toggler -->
                            <li class="flex">
                                <button v-cloak aria-hidden="true" class="relative focus:outline-none"
                                        @click="toggleTheme">
                                    <div
                                        class="w-12 h-6 transition rounded-full outline-none bg-primary-100 dark:bg-primary-lighter"
                                    >

                                    </div>
                                    <div
                                        :class="{ 'translate-x-0 -translate-y-px  bg-white text-primary-dark': !isDark, 'translate-x-6 text-primary-100 bg-primary-darker': isDark }"
                                        class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-200 transform scale-110 rounded-full shadow-sm"
                                    >
                                        <svg
                                            v-show="!isDark"
                                            class="h-6 w-6"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="
                                            M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"
                                                  stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  stroke-width="2"/>
                                        </svg>
                                        <svg
                                            v-show="isDark"
                                            class="h-6 w-6"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"/>
                                        </svg>
                                    </div>
                                </button>
                            </li>
                            <!-- Notification button -->
                            <li class="relative">
                                <button
                                    class="p-2 transition-colors duration-200 rounded-full text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker"
                                    @click="openNotificationsPanel"
                                >
                                    <span class="sr-only">Open Notification panel</span>
                                    <svg
                                        aria-hidden="true"
                                        class="w-7 h-7"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                        />
                                    </svg>
                                </button>
                            </li>
                            <!-- Search button -->
                            <li class="relative">
                                <button
                                    class="p-2 transition-colors duration-200 rounded-full text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker"
                                    @click="openSearchPanel"
                                >
                                    <span class="sr-only">Open search panel</span>
                                    <svg
                                        aria-hidden="true"
                                        class="w-7 h-7"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                        />
                                    </svg>
                                </button>
                            </li>
                            <!-- Settings button -->
                            <li class="relative">
                                <button
                                    class="p-2 transition-colors duration-200 rounded-full text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker"
                                    @click="openSettingsPanel"
                                >
                                    <span class="sr-only">Open settings panel</span>
                                    <svg
                                        aria-hidden="true"
                                        class="w-7 h-7"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                        />
                                        <path
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                        />
                                    </svg>
                                </button>
                            </li>
                        </ul>
                    </div>
                </header>
                <main>
                    <slot></slot>
                </main>
            </div>

        </div>
        <!-- Panels -->

        <!-- Settings Panel -->
        <!-- Backdrop -->
        <div
            x-transition:enter="transition duration-300 ease-in-out"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition duration-300 ease-in-out"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            v-show="isSettingsPanelOpen"
            @click="isSettingsPanelOpen = false"
            class="fixed inset-0 z-10 bg-primary-darker"
            style="opacity: 0.5"
            aria-hidden="true"
        ></div>
        <!-- Panel -->
        <section
            x-transition:enter="transition duration-300 ease-in-out transform sm:duration-500"
            x-transition:enter-start="translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition duration-300 ease-in-out transform sm:duration-500"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full"
            x-ref="settingsPanel"
            tabindex="-1"
            v-show="isSettingsPanelOpen"
            @keydown.escape="isSettingsPanelOpen = false"
            class="fixed inset-y-0 right-0 z-20 w-full max-w-xs bg-white shadow-xl dark:bg-darker dark:text-light sm:max-w-md focus:outline-none"
            aria-labelledby="settinsPanelLabel"
        >
            <div class="absolute left-0 p-2 transform -translate-x-full">
                <!-- Close button -->
                <button
                    @click="isSettingsPanelOpen = false"
                    class="p-2 text-white rounded-md focus:outline-none focus:ring"
                >
                    <svg
                        class="w-5 h-5"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <!-- Panel content -->
            <div class="flex flex-col h-screen">
                <!-- Panel header -->
                <div
                    class="flex flex-col items-center justify-center flex-shrink-0 px-4 py-8 space-y-4 border-b dark:border-primary-dark"
                >
              <span aria-hidden="true" class="text-gray-500 dark:text-primary">
                <svg
                    class="w-8 h-8"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                  <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"
                  />
                </svg>
              </span>
                    <h2 id="settinsPanelLabel" class="text-xl font-medium text-gray-500 dark:text-light">Settings</h2>
                </div>
                <!-- Content -->
                <div class="flex-1 overflow-hidden hover:overflow-y-auto">
                    <!-- Theme -->
                    <div class="p-4 space-y-4 md:p-8">
                        <h6 class="text-lg font-medium text-gray-400 dark:text-light">Mode</h6>
                        <div class="flex items-center space-x-8">
                            <!-- Light button -->
                            <button
                                @click="setLightTheme"
                                class="flex items-center justify-center px-4 py-2 space-x-4 transition-colors border rounded-md hover:text-gray-900 hover:border-gray-900 dark:border-primary dark:hover:text-primary-100 dark:hover:border-primary-light focus:outline-none focus:ring focus:ring-primary-lighter focus:ring-offset-2 dark:focus:ring-offset-dark dark:focus:ring-primary-dark"
                                :class="{ 'border-gray-900 text-gray-900 dark:border-primary-light dark:text-primary-100': !isDark, 'text-gray-500 dark:text-primary-light': isDark }"
                            >
                    <span>
                      <svg
                          class="w-6 h-6"
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                      >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"
                        />
                      </svg>
                    </span>
                                <span>Light</span>
                            </button>

                            <!-- Dark button -->
                            <button
                                @click="setDarkTheme"
                                class="flex items-center justify-center px-4 py-2 space-x-4 transition-colors border rounded-md hover:text-gray-900 hover:border-gray-900 dark:border-primary dark:hover:text-primary-100 dark:hover:border-primary-light focus:outline-none focus:ring focus:ring-primary-lighter focus:ring-offset-2 dark:focus:ring-offset-dark dark:focus:ring-primary-dark"
                                :class="{ 'border-gray-900 text-gray-900 dark:border-primary-light dark:text-primary-100': isDark, 'text-gray-500 dark:text-primary-light': !isDark }"
                            >
                    <span>
                      <svg
                          class="w-6 h-6"
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                      >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"
                        />
                      </svg>
                    </span>
                                <span>Dark</span>
                            </button>
                        </div>
                    </div>

                    <!-- Colors -->
                    <div class="p-4 space-y-4 md:p-8">
                        <h6 class="text-lg font-medium text-gray-400 dark:text-light">Colors</h6>
                        <div>
                            <button
                                @click="setColors('cyan')"
                                class="w-10 h-10 rounded-full"
                                style="background-color: var(--color-cyan)"
                            ></button>
                            <button
                                @click="setColors('teal')"
                                class="w-10 h-10 rounded-full"
                                style="background-color: var(--color-teal)"
                            ></button>
                            <button
                                @click="setColors('green')"
                                class="w-10 h-10 rounded-full"
                                style="background-color: var(--color-green)"
                            ></button>
                            <button
                                @click="setColors('fuchsia')"
                                class="w-10 h-10 rounded-full"
                                style="background-color: var(--color-fuchsia)"
                            ></button>
                            <button
                                @click="setColors('blue')"
                                class="w-10 h-10 rounded-full"
                                style="background-color: var(--color-blue)"
                            ></button>
                            <button
                                @click="setColors('violet')"
                                class="w-10 h-10 rounded-full"
                                style="background-color: var(--color-violet)"
                            ></button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Notification panel -->
        <!-- Backdrop -->
        <div
            x-transition:enter="transition duration-300 ease-in-out"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition duration-300 ease-in-out"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            v-show="isNotificationsPanelOpen"
            @click="isNotificationsPanelOpen = false"
            class="fixed inset-0 z-10 bg-primary-darker"
            style="opacity: 0.5"
            aria-hidden="true"
        ></div>
        <!-- Panel -->
        <section
            x-transition:enter="transition duration-300 ease-in-out transform sm:duration-500"
            x-transition:enter-start="-translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition duration-300 ease-in-out transform sm:duration-500"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-full"
            x-ref="notificationsPanel"
            v-show="isNotificationsPanelOpen"
            @keydown.escape="isNotificationsPanelOpen = false"
            tabindex="-1"
            aria-labelledby="notificationPanelLabel"
            class="fixed inset-y-0 z-20 w-full max-w-xs bg-white dark:bg-darker dark:text-light sm:max-w-md focus:outline-none"
        >
            <div class="absolute right-0 p-2 transform translate-x-full">
                <!-- Close button -->
                <button
                    @click="isNotificationsPanelOpen = false"
                    class="p-2 text-white rounded-md focus:outline-none focus:ring"
                >
                    <svg
                        class="w-5 h-5"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex flex-col h-screen" x-data="{ activeTabe: 'action' }">
                <!-- Panel header -->
                <div class="flex-shrink-0">
                    <div class="flex items-center justify-between px-4 pt-4 border-b dark:border-primary-darker">
                        <h2 id="notificationPanelLabel" class="pb-4 font-semibold">Notifications</h2>
                        <div class="space-x-2">
                            <button
                                @click.prevent="activeTabe = 'action'"
                                class="px-px pb-4 transition-all duration-200 transform translate-y-px border-b focus:outline-none"
                                :class="{'border-primary-dark dark:border-primary': activeTabe == 'action', 'border-transparent': activeTabe != 'action'}"
                            >
                                Action
                            </button>
                            <button
                                @click.prevent="activeTabe = 'user'"
                                class="px-px pb-4 transition-all duration-200 transform translate-y-px border-b focus:outline-none"
                                :class="{'border-primary-dark dark:border-primary': activeTabe == 'user', 'border-transparent': activeTabe != 'user'}"
                            >
                                User
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Panel content (tabs) -->
                <div class="flex-1 pt-4 overflow-y-hidden hover:overflow-y-auto">
                    <!-- Action tab -->
                    <div class="space-y-4" x-show.transition.in="activeTabe == 'action'">
                        <a href="#" class="block">
                            <div class="flex px-4 space-x-4">
                                <div class="relative flex-shrink-0">
                      <span
                          class="z-10 inline-block p-2 overflow-visible rounded-full bg-primary-50 text-primary-light dark:bg-primary-darker"
                      >
                        <svg
                            class="w-7 h-7"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                          <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                          />
                        </svg>
                      </span>
                                    <div class="absolute h-24 p-px -mt-3 -ml-px bg-primary-50 left-1/2 dark:bg-primary-darker"></div>
                                </div>
                                <div class="flex-1 overflow-hidden">
                                    <h5 class="text-sm font-semibold text-gray-600 dark:text-light">
                                        New project "KWD Dashboard" created
                                    </h5>
                                    <p class="text-sm font-normal text-gray-400 truncate dark:text-primary-lighter">
                                        Looks like there might be a new theme soon
                                    </p>
                                    <span class="text-sm font-normal text-gray-400 dark:text-primary-light"> 9h ago </span>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="block">
                            <div class="flex px-4 space-x-4">
                                <div class="relative flex-shrink-0">
                      <span
                          class="inline-block p-2 overflow-visible rounded-full bg-primary-50 text-primary-light dark:bg-primary-darker"
                      >
                        <svg
                            class="w-7 h-7"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                          <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                          />
                        </svg>
                      </span>
                                    <div class="absolute h-24 p-px -mt-3 -ml-px bg-primary-50 left-1/2 dark:bg-primary-darker"></div>
                                </div>
                                <div class="flex-1 overflow-hidden">
                                    <h5 class="text-sm font-semibold text-gray-600 dark:text-light">
                                        KWD Dashboard v0.0.2 was released
                                    </h5>
                                    <p class="text-sm font-normal text-gray-400 truncate dark:text-primary-lighter">
                                        Successful new version was released
                                    </p>
                                    <span class="text-sm font-normal text-gray-400 dark:text-primary-light"> 2d ago </span>
                                </div>
                            </div>
                        </a>
                        <template x-for="i in 20" x-key="i">
                            <a href="#" class="block">
                                <div class="flex px-4 space-x-4">
                                    <div class="relative flex-shrink-0">
                        <span
                            class="inline-block p-2 overflow-visible rounded-full bg-primary-50 text-primary-light dark:bg-primary-darker"
                        >
                          <svg
                              class="w-7 h-7"
                              xmlns="http://www.w3.org/2000/svg"
                              fill="none"
                              viewBox="0 0 24 24"
                              stroke="currentColor"
                          >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                            />
                          </svg>
                        </span>
                                        <div
                                            class="absolute h-24 p-px -mt-3 -ml-px bg-primary-50 left-1/2 dark:bg-primary-darker"
                                        ></div>
                                    </div>
                                    <div class="flex-1 overflow-hidden">
                                        <h5 class="text-sm font-semibold text-gray-600 dark:text-light">
                                            New project "KWD Dashboard" created
                                        </h5>
                                        <p class="text-sm font-normal text-gray-400 truncate dark:text-primary-lighter">
                                            Looks like there might be a new theme soon
                                        </p>
                                        <span class="text-sm font-normal text-gray-400 dark:text-primary-light"> 9h ago </span>
                                    </div>
                                </div>
                            </a>
                        </template>
                    </div>

                    <!-- User tab -->
                    <div class="space-y-4" x-show.transition.in="activeTabe == 'user'">
                        <a href="#" class="block">
                            <div class="flex px-4 space-x-4">
                                <div class="relative flex-shrink-0">
                      <span class="relative z-10 inline-block overflow-visible rounded-ful">
                        <img
                            class="object-cover rounded-full w-9 h-9"
                            src="build/images/avatar.jpg"
                            alt="Ahmed kamel"
                        />
                      </span>
                                    <div class="absolute h-24 p-px -mt-3 -ml-px bg-primary-50 left-1/2 dark:bg-primary-darker"></div>
                                </div>
                                <div class="flex-1 overflow-hidden">
                                    <h5 class="text-sm font-semibold text-gray-600 dark:text-light">Ahmed Kamel</h5>
                                    <p class="text-sm font-normal text-gray-400 truncate dark:text-primary-lighter">
                                        Shared new project "K-WD Dashboard"
                                    </p>
                                    <span class="text-sm font-normal text-gray-400 dark:text-primary-light"> 1d ago </span>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="block">
                            <div class="flex px-4 space-x-4">
                                <div class="relative flex-shrink-0">
                      <span class="relative z-10 inline-block overflow-visible rounded-ful">
                        <img
                            class="object-cover rounded-full w-9 h-9"
                            src="build/images/avatar-1.jpg"
                            alt="Ahmed kamel"
                        />
                      </span>
                                    <div class="absolute h-24 p-px -mt-3 -ml-px bg-primary-50 left-1/2 dark:bg-primary-darker"></div>
                                </div>
                                <div class="flex-1 overflow-hidden">
                                    <h5 class="text-sm font-semibold text-gray-600 dark:text-light">John</h5>
                                    <p class="text-sm font-normal text-gray-400 truncate dark:text-primary-lighter">
                                        Commit new changes to K-WD Dashboard project.
                                    </p>
                                    <span class="text-sm font-normal text-gray-400 dark:text-primary-light"> 10h ago </span>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="block">
                            <div class="flex px-4 space-x-4">
                                <div class="relative flex-shrink-0">
                      <span class="relative z-10 inline-block overflow-visible rounded-ful">
                        <img
                            class="object-cover rounded-full w-9 h-9"
                            src="build/images/avatar.jpg"
                            alt="Ahmed kamel"
                        />
                      </span>
                                    <div class="absolute h-24 p-px -mt-3 -ml-px bg-primary-50 left-1/2 dark:bg-primary-darker"></div>
                                </div>
                                <div class="flex-1 overflow-hidden">
                                    <h5 class="text-sm font-semibold text-gray-600 dark:text-light">Ahmed Kamel</h5>
                                    <p class="text-sm font-normal text-gray-400 truncate dark:text-primary-lighter">
                                        Release new version "K-WD Dashboard"
                                    </p>
                                    <span class="text-sm font-normal text-gray-400 dark:text-primary-light"> 20d ago </span>
                                </div>
                            </div>
                        </a>
                        <template x-for="i in 10" x-key="i">
                            <a href="#" class="block">
                                <div class="flex px-4 space-x-4">
                                    <div class="relative flex-shrink-0">
                        <span class="relative z-10 inline-block overflow-visible rounded-ful">
                          <img
                              class="object-cover rounded-full w-9 h-9"
                              src="build/images/avatar.jpg"
                              alt="Ahmed kamel"
                          />
                        </span>
                                        <div
                                            class="absolute h-24 p-px -mt-3 -ml-px bg-primary-50 left-1/2 dark:bg-primary-darker"
                                        ></div>
                                    </div>
                                    <div class="flex-1 overflow-hidden">
                                        <h5 class="text-sm font-semibold text-gray-600 dark:text-light">Ahmed Kamel</h5>
                                        <p class="text-sm font-normal text-gray-400 truncate dark:text-primary-lighter">
                                            Release new version "K-WD Dashboard"
                                        </p>
                                        <span class="text-sm font-normal text-gray-400 dark:text-primary-light"> 20d ago </span>
                                    </div>
                                </div>
                            </a>
                        </template>
                    </div>
                </div>
            </div>
        </section>

        <!-- Search panel -->
        <!-- Backdrop -->
        <div
            x-transition:enter="transition duration-300 ease-in-out"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition duration-300 ease-in-out"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            v-show="isSearchPanelOpen"
            @click="isSearchPanelOpen = false"
            class="fixed inset-0 z-10 bg-primary-darker"
            style="opacity: 0.5"
            aria-hidden="ture"
        ></div>
        <!-- Panel -->
        <section
            x-transition:enter="transition duration-300 ease-in-out transform sm:duration-500"
            x-transition:enter-start="-translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition duration-300 ease-in-out transform sm:duration-500"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-full"
            v-show="isSearchPanelOpen"
            @keydown.escape="isSearchPanelOpen = false"
            class="fixed inset-y-0 z-20 w-full max-w-xs bg-white shadow-xl dark:bg-darker dark:text-light sm:max-w-md focus:outline-none"
        >
            <div class="absolute right-0 p-2 transform translate-x-full">
                <!-- Close button -->
                <button @click="isSearchPanelOpen = false" class="p-2 text-white rounded-md focus:outline-none focus:ring">
                    <svg
                        class="w-5 h-5"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <h2 class="sr-only">Search panel</h2>
            <!-- Panel content -->
            <div class="flex flex-col h-screen">
                <!-- Panel header (Search input) -->
                <div
                    class="relative flex-shrink-0 px-4 py-8 text-gray-400 border-b dark:border-primary-darker dark:focus-within:text-light focus-within:text-gray-700"
                >
              <span class="absolute inset-y-0 inline-flex items-center px-4">
                <svg
                    class="w-5 h-5"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                  <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                  />
                </svg>
              </span>
                    <input
                        x-ref="searchInput"
                        type="text"
                        class="w-full py-2 pl-10 pr-4 border rounded-full dark:bg-dark dark:border-transparent dark:text-light focus:outline-none focus:ring"
                        placeholder="Search..."
                    />
                </div>

                <!-- Panel content (Search result) -->
                <div class="flex-1 px-4 pb-4 space-y-4 overflow-y-hidden h hover:overflow-y-auto">
                    <h3 class="py-2 text-sm font-semibold text-gray-600 dark:text-light">History</h3>
                    <a href="#" class="flex space-x-4">
                        <div class="flex-shrink-0">
                            <img class="w-10 h-10 rounded-lg" src="build/images/cover.jpg" alt="Post cover" />
                        </div>
                        <div class="flex-1 max-w-xs overflow-hidden">
                            <h4 class="text-sm font-semibold text-gray-600 dark:text-light">Header</h4>
                            <p class="text-sm font-normal text-gray-400 truncate dark:text-primary-lighter">
                                Lorem ipsum dolor, sit amet consectetur.
                            </p>
                            <span class="text-sm font-normal text-gray-400 dark:text-primary-light"> Post </span>
                        </div>
                    </a>
                    <a href="#" class="flex space-x-4">
                        <div class="flex-shrink-0">
                            <img class="w-10 h-10 rounded-lg" src="build/images/avatar.jpg" alt="Ahmed Kamel" />
                        </div>
                        <div class="flex-1 max-w-xs overflow-hidden">
                            <h4 class="text-sm font-semibold text-gray-600 dark:text-light">Ahmed Kamel</h4>
                            <p class="text-sm font-normal text-gray-400 truncate dark:text-primary-lighter">
                                Last activity 3h ago.
                            </p>
                            <span class="text-sm font-normal text-gray-400 dark:text-primary-light"> Offline </span>
                        </div>
                    </a>
                    <a href="#" class="flex space-x-4">
                        <div class="flex-shrink-0">
                            <img class="w-10 h-10 rounded-lg" src="build/images/cover-2.jpg" alt="K-WD Dashboard" />
                        </div>
                        <div class="flex-1 max-w-xs overflow-hidden">
                            <h4 class="text-sm font-semibold text-gray-600 dark:text-light">K-WD Dashboard</h4>
                            <p class="text-sm font-normal text-gray-400 truncate dark:text-primary-lighter">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                            </p>
                            <span class="text-sm font-normal text-gray-400 dark:text-primary-light"> Updated 3h ago. </span>
                        </div>
                    </a>
                    <template x-for="i in 10" x-key="i">
                        <a href="#" class="flex space-x-4">
                            <div class="flex-shrink-0">
                                <img class="w-10 h-10 rounded-lg" src="build/images/cover-3.jpg" alt="K-WD Dashboard" />
                            </div>
                            <div class="flex-1 max-w-xs overflow-hidden">
                                <h4 class="text-sm font-semibold text-gray-600 dark:text-light">K-WD Dashboard</h4>
                                <p class="text-sm font-normal text-gray-400 truncate dark:text-primary-lighter">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                </p>
                                <span class="text-sm font-normal text-gray-400 dark:text-primary-light"> Updated 3h ago. </span>
                            </div>
                        </a>
                    </template>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import JetApplicationMark from '@/Jetstream/ApplicationMark'
import JetNavLink from "../Jetstream/NavLink";
import Dropdown from "../Jetstream/Dropdown";
import Button from "../Jetstream/Button";
import Modal from "../Jetstream/Modal";
import DialogModal from "../Jetstream/DialogModal";

export default {
    name: "UserLayout",
    components: {
        DialogModal,
        Modal,
        Button,
        Dropdown,
        JetApplicationMark,
        JetNavLink,
    },
    data: function () {
        return {
            isDark: this.getTheme(),
            modalAvatar: false,
            preview: null,
            image: null,
            isSettingsPanelOpen: false,
            isSearchPanelOpen: false,
            isNotificationsPanelOpen: false,
        }
    },
    methods: {
        toggleTheme() {
            this.isDark = !this.isDark;
            this.isDark==true ? this.setTheme('dark') :  this.setTheme('light')
        },
        getTheme() {
            // On page load or when changing themes, best to add inline in `head` to avoid FOUC
            if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark')
            } else {
                document.documentElement.classList.remove('dark')
            }
        },
        setTheme(value) {
            localStorage.setItem('theme', value)
        },
        setLightTheme() {
            this.isDark = false;
            this.setTheme('light');
        },
        setDarkTheme() {
            this.isDark = true;
            this.setTheme('dark');
        },
        openModalAvatar() {
            this.modalAvatar = !this.modalAvatar;
        },
        close() {
            this.modalAvatar = false;
        },
        previewImage: function (event) {
            var input = event.target;
            if (input.files) {
                var reader = new FileReader();
                reader.onload = (e) => {
                    this.preview = e.target.result;
                }
                this.image = input.files[0];
                reader.readAsDataURL(input.files[0]);
            }
        },
        upload() {
            console.log('Upload');
        },
        openSettingsPanel() {
            console.log(1);
            this.isSettingsPanelOpen = true
            this.$nextTick(() => {
                this.$refs.settingsPanel.focus()
            })
        },

        openNotificationsPanel() {
            console.log(2);
            this.isNotificationsPanelOpen = true
            this.$nextTick(() => {
                this.$refs.notificationsPanel.focus()
            })
        },

        openSearchPanel() {
            console.log(3);
            this.isSearchPanelOpen = true
            this.$nextTick(() => {
                this.$refs.searchInput.focus()
            })
        },
    }
}
</script>

<style scoped>

</style>
