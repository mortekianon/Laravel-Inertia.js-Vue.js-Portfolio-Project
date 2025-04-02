<template>
    <Head title="Edit Skill" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Skill
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-md mx-auto sm:px-6 lg:px-8 bg-white rounded-md">
                <form @submit.prevent="submit" class="p-4">
                    <div>
                        <InputLabel
                            for="specialization_id"
                            value="Specialization"
                        />
                        <select
                            v-model="form.specialization_id"
                            id="specialization_id"
                            name="specialization_id"
                            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
                        >
                            <option
                                v-for="specialization in specializations"
                                :key="specialization.id"
                                :value="specialization.id"
                            >
                                {{ specialization.name }}
                            </option>
                        </select>
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
                    <div class="flex items-center justify-end mt-4">
                        <PrimaryButton
                            class="ms-4"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Update
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
import { router } from "@inertiajs/vue3";

const props = defineProps({
    specializations: Array,
    skill: Object,
});

const form = useForm({
    name: props.skill?.name,
    image: null,
    specialization_id: props.skill?.specializations?.[0]?.id || "",
});

const submit = () => {
    router.post(`/skills/${props.skill.id}`, {
        _method: "put",
        image: form.image,
        name: form.name,
        specialization_id: form.specialization_id,
    });
};
</script>
