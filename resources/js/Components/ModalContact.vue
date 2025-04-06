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
    setTimeout(() => setNotifyMessage(false), 3000);
}

const submit = () => {
    form.post(route("contact"), {
        preserveScroll: true,
        onSuccess: () => cleanMessage(),
    });
};
</script>

<template>
    <form @submit.prevent="submit" class="space-y-8 w-full max-w-md">
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
        <span v-if="form.errors.messages" class="text-sm m-2 text-red-400">{{
            form.errors.messages
        }}</span>
        <button class="btn btn-lg bg-accent hover:bg-secondary text-white">
            Send Message
        </button>
    </form>
</template>
