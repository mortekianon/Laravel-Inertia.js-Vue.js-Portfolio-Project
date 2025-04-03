<template>
    <section
        id="about"
        class="section bg-light-secondary dark:bg-dark-secondary"
    >
        <div class="container mx-auto">
            <div class="flex flex-col xl:flex-row gap-24">
                <img
                    class="object-cover h-full w-[566px] md:mx-auto lg:mx-0 rounded-2xl"
                    src="http://127.0.0.1:8000/img/hero.png"
                    alt="about"
                />
                <div
                    class="flex flex-col items-center text-center lg:items-start lg:text-left"
                >
                    <div class="flex flex-col">
                        <h2
                            class="text-3xl lg:text-4xl font-medium lg:font-extrabold mb-3"
                        >
                            About me
                        </h2>
                        <p class="mb-4 text-accent">
                            Website Developer & Data Analyst
                        </p>
                        <p class="mb-8">
                            Hi, my name is Mortekiano Nigel and I have
                            enthusiasm in website development and data analytics
                        </p>
                    </div>
                    <a
                        href=""
                        class="btn btn-md bg-accent text-slate-200 rounded-lg"
                        >Contact me</a
                    >
                </div>
            </div>
        </div>
    </section>
</template>
