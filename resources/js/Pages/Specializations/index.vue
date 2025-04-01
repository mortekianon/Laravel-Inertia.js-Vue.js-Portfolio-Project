<template>
    <Head title="Specializations" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Specializations
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-end m-2 p-2">
                    <Link
                        :href="route('specializations.create')"
                        class="px-2 py-3 bg-indigo-500 hover:bg-indigo-700 text-white rounded-md"
                    >
                        New Specialization
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
                                    Specialization Name
                                </th>
                                <th scope="col" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="(
                                    specialization, index
                                ) in specializations.data"
                                :key="specialization.id"
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200"
                            >
                                <th scope="row" class="px-6 py-4">
                                    {{ index + 1 }}
                                </th>

                                <td
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                                >
                                    {{ specialization.name }}
                                </td>
                                <td class="px-6 py-4">
                                    <Link
                                        :href="
                                            route(
                                                'specializations.edit',
                                                specialization.id
                                            )
                                        "
                                        class="font-medium text-blue-500 hover:text-blue-700 mr-2"
                                    >
                                        Edit
                                    </Link>
                                    <Link
                                        :href="
                                            route(
                                                'specializations.destroy',
                                                specialization.id
                                            )
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
    specializations: Object,
});
</script>
