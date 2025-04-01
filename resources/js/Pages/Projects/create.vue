<template>
    <Head title="New Project" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                New Project
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-md mx-auto sm:px-6 lg:px-8 bg-white rounded-md">
                <form @submit.prevent="submit" class="p-4">
                    <div>
                        <InputLabel value="Skills" />
                        <div
                            v-for="skill in skills"
                            :key="skill.id"
                            class="flex items-center"
                        >
                            <input
                                type="checkbox"
                                :id="'skill-' + skill.id"
                                :value="skill.id"
                                v-model="form.skill_id"
                                class="mr-2"
                            />
                            <label :for="'skill-' + skill.id">{{
                                skill.name
                            }}</label>
                        </div>
                    </div>

                    <div>
                        <InputLabel for="name" value="Name" />
                        <TextInput
                            id="name"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.name"
                            required
                            autofocus
                            autocomplete="name"
                        />

                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>
                    <div>
                        <InputLabel for="image" value="Image" />
                        <TextInput
                            id="image"
                            type="file"
                            @input="form.image = $event.target.files[0]"
                            class="mt-1 block w-full"
                        />

                        <InputError class="mt-2" :message="form.errors.image" />
                    </div>
                    <div>
                        <InputLabel for="project_url" value="Project URL" />
                        <TextInput
                            id="project_url"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.project_url"
                            required
                            autofocus
                            autocomplete="project_url"
                        />

                        <InputError
                            class="mt-2"
                            :message="form.errors.project_url"
                        />
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <PrimaryButton
                            class="ms-4"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Add
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";

import { Head, useForm } from "@inertiajs/vue3";

defineProps({
    skills: Array,
});

const form = useForm({
    name: "",
    image: null,
    project_url: "",
    skill_id: [],
});

const submit = () => {
    form.post(route("projects.store"));
};
</script>
