<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";

const notifyMessage = ref(false);

const form = useForm({
    name: "",
    email: "",
    messages: "",
});

function setNotifyMessage(value) {
    notifyMessage.value = value;
}

function cleanMessage() {
    form.reset();
    setNotifyMessage(true);
    setTimeout(() => setNotifyMessage(false), 2000);
}

const submit = () => {
    form.post(route("contact"), {
        preserveScroll: true,
        onSuccess: () => cleanMessage(),
    });
};
</script>

<template>
    <section
        id="contact"
        class="section bg-light-secondary dark:bg-dark-secondary"
        tabindex="-1"
    >
        <div
            class="container mx-auto"
            v-motion="{
                initial: {
                    y: 100,
                    opacity: 0,
                },
                visible: {
                    y: 0,
                    opacity: 1,
                },
            }"
        >
            <div class="flex flex-col items-center text-center">
                <h2 class="section-title">Contact Me</h2>
                <p class="subtitle">
                    Please feel free to kindly contact me if you need a help or
                    just want to know me closer.
                </p>
            </div>
            <div class="flex flex-col lg:flex-row lg:gap-x-8">
                <div
                    class="flex flex-1 flex-col items-start space-y-8 mb-12 lg:mb-0 lg:pt-2"
                >
                    <div class="flex flex-col lg:flex-row gap-x-4">
                        <div
                            class="text-accent rounded-sm w-14 h-14 flex items-start justify-center mt-2 mb-4 lg:mb-0 text-1xl"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="size-6"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"
                                />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-body text-xl mb-1">
                                Have a question?
                            </h4>
                            <p class="mb-1 text-paragraph">Kindly email me!</p>
                            <p class="text-accent font-normal">
                                mortekianond@gmail.com
                            </p>
                        </div>
                    </div>
                    <div class="flex flex-col lg:flex-row gap-x-4">
                        <div
                            class="text-accent rounded-sm w-14 h-14 flex items-start justify-center mt-2 mb-4 lg:mb-0 text-1xl"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="size-6"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                                />
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"
                                />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-body text-xl mb-1">
                                Current Location
                            </h4>
                            <p class="mb-1 text-paragraph">
                                Jl Ikan Buntek 02 Waru - Sidoarjo
                            </p>
                            <p class="text-accent font-normal">
                                Serving clients worldwide
                            </p>
                        </div>
                    </div>
                    <div class="flex flex-col lg:flex-row gap-x-4">
                        <div
                            class="text-accent rounded-sm w-14 h-14 flex items-start justify-center mt-2 mb-4 lg:mb-0 text-1xl"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="size-6"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3"
                                />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-body text-xl mb-1">Phone</h4>
                            <p class="mb-1 text-paragraph">
                                Contact me through my phone number
                            </p>
                            <p class="text-accent font-normal">
                                (+62) 812 1777 1250
                            </p>
                        </div>
                    </div>
                </div>
                <form
                    @submit.prevent="submit"
                    class="space-y-8 w-full max-w-md"
                >
                    <div
                        class="m-1 p-4 bg-light-tail-500 dark:bg-dark-navy-100 text-light-secondary rounded-lg"
                        v-if="notifyMessage"
                    >
                        Thanks For Contacting me!
                    </div>
                    <div class="flex gap-8">
                        <div>
                            <input
                                v-model="form.name"
                                type="text"
                                class="input"
                                placeholder="Your Name"
                            />
                            <span
                                v-if="form.errors.name"
                                class="text-sm m-2 text-red-400"
                                >{{ form.errors.name }}</span
                            >
                        </div>
                        <div>
                            <input
                                v-model="form.email"
                                type="email"
                                class="input"
                                placeholder="Your Email"
                            />
                            <span
                                v-if="form.errors.email"
                                class="text-sm m-2 text-red-400"
                                >{{ form.errors.email }}</span
                            >
                        </div>
                    </div>
                    <textarea
                        v-model="form.messages"
                        class="textarea"
                        placeholder="Your Message..."
                        spellcheck="false"
                    >
                    </textarea>
                    <span
                        v-if="form.errors.messages"
                        class="text-sm m-2 text-red-400"
                        >{{ form.errors.messages }}</span
                    >
                    <button
                        class="btn btn-lg bg-accent hover:bg-secondary text-white"
                    >
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </section>
</template>
