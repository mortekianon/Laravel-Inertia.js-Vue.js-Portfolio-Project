<script setup>
import { ref } from "vue";
const showMobileMenu = ref("false");

const navigations = [
    {
        name: "Home",
        href: "#home",
    },
    {
        name: "About",
        href: "#about",
    },
    {
        name: "Portfolio",
        href: "#portfolio",
    },
    {
        name: "Contact",
        href: "#contact",
    },
];

function scrollToSection(id) {
    const section = document.querySelector(id);
    if (section) {
        section.scrollIntoView({ behavior: "smooth" });
    }
}
</script>

<template>
    <nav
        class="bg-light-primary border-gray-200 px-2 sm:px-4 py-1rounded z-20 w-full fixed dark:bg-dark-primary"
    >
        <div
            class="max-w-screen-xl flex flex-wrap items-center justify-around mx-auto p-4"
        >
            <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                <span
                    class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"
                    >mortekianond.
                </span>
            </a>
            <button
                @click="showMobileMenu = !showMobileMenu"
                data-collapse-toggle="navbar-default"
                type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default"
                aria-expanded="false"
            >
                <span class="sr-only">Open main menu</span>
                <svg
                    class="w-5 h-5"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 17 14"
                >
                    <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15"
                    />
                </svg>
            </button>
            <div
                class="w-full md:block md:w-auto"
                :class="{ hidden: showMobileMenu }"
                id="navbar-default"
            >
                <ul
                    class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-light-trail-500 rounded-lg md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0"
                >
                    <li v-for="(navigation, index) in navigations" :key="index">
                        <a
                            :href="navigation.href"
                            @click.prevent="scrollToSection(navigation.href)"
                            class="block py-2 px-3 ..."
                        >
                            {{ navigation.name }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>
