<template>
    <Head title="Skills" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Skills
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-end m-2 p-2">
                    <Link
                        :href="route('skills.create')"
                        class="px-2 py-3 bg-indigo-500 hover:bg-indigo-700 text-white rounded-md"
                    >
                        New Skill
                    </Link>
                </div>
                <div class="relative overflow-x-auto">
                    <table
                        class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
                    >
                        <thead
                            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                        >
                            <tr>
                                <th scope="col" class="px-6 py-3">No</th>
                                <th scope="col" class="px-6 py-3">
                                    Specialization
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Skill Name
                                </th>
                                <th scope="col" class="px-6 py-3">Image</th>
                                <th scope="col" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="(skill, index) in skills.data"
                                :key="skill.id"
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200"
                            >
                                <th scope="row" class="px-6 py-4">
                                    {{ index + 1 }}
                                </th>

                                <!-- Specializations -->
                                <td
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                                >
                                    <span
                                        v-if="skill.specializations.length > 0"
                                    >
                                        {{
                                            skill.specializations
                                                .map((s) => s.name)
                                                .join(", ")
                                        }}
                                    </span>
                                    <span v-else>No specialization</span>
                                </td>

                                <!-- Skill Name -->
                                <td
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                                >
                                    {{ skill.name }}
                                </td>

                                <!-- Skill Image -->
                                <td class="px-6 py-4">
                                    <img
                                        :src="skill.image"
                                        alt="skill image"
                                        class="h-12 w-12 object-cover rounded-md"
                                    />
                                </td>

                                <td class="px-6 py-4">
                                    <Link
                                        :href="route('skills.edit', skill.id)"
                                        class="font-medium text-blue-500 hover:text-blue-700 mr-2"
                                    >
                                        Edit
                                    </Link>
                                    <Link
                                        :href="
                                            route('skills.destroy', skill.id)
                                        "
                                        method="delete"
                                        as="button"
                                        type="button"
                                        class="font-medium text-red-500 hover:text-red-700 mr-2"
                                    >
                                        Delete
                                    </Link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

defineProps({
    skills: Object,
});
</script>
