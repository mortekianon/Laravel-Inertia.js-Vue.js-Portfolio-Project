<script setup></script>

<template>
    <section
        id="home"
        class="lg:h-[80vh] flex items-center bg-ligh-primary dark:bg-dark-primary py-32 lg:py-0 overflow-hidden"
    >
        <div class="container mx-auto h-full">
            <div class="flex flex-col md:flex-row items-center h-full pt-8">
                <div class="flex-1 flex flex-col items-center lg:items-start">
                    <p class="text-lg text-accent text-md mb-[22px]">
                        mortekianond / portfolio /
                    </p>
                    <h1
                        class="text-4xl leading-[44px] md:text-5xl md:leading-tight lg:text-7xl lg:leading-[1.2] font-bold md:tracking-[-2px]"
                    >
                        Web Development <br />
                        & Data Analytics.
                    </h1>
                    <a
                        href="https://github.com/mortekianon/Laravel-Inertia.js-Vue.js-Portfolio-Project"
                        target="_blank"
                        class="pt-4 pb-6 md:pt-6 md:pb-12 max-w-[480px] text-lg text-center lg:text-left hover:text-white"
                    >
                        Built with Vue.Js and Inertia.Js
                    </a>
                    <button
                        class="btn btn-md bg-accent hover:bg-light-secondary hover:text-black md:btn-lg transition-all mt-1 rounded-lg"
                    >
                        Work with me
                    </button>
                </div>
                <div
                    class="flex flex-1 justify-end items-center h-full mt-8 md:mt-0"
                >
                    <img
                        class="rounded-lg"
                        src="http://127.0.0.1:8000/img/hero.png"
                        alt="hero-img"
                    />
                </div>
            </div>
        </div>
    </section>
</template>
