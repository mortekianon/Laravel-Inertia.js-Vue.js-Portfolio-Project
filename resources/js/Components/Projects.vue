<script setup>
defineProps({
    specializations: Object,
    skills: Object,
    projects: Object,
});
</script>

<template>
    <div class="container mx-auto">
        <nav class="mb-12 max-w-6xl mx-auto px-4">
            <!-- Menambahkan border-b di dalam ul agar garis bawah mengikuti ukuran konten -->
            <ul
                class="flex flex-col lg:flex-row justify-evenly items-center border-b-2 border-light-tail-100"
            >
                <li class="cursor-pointer capitalize m-4">
                    <button
                        class="flex text-center px-4 py-2 hover:text-light-tail-500 dark:text-dark-navy-100"
                    >
                        All
                    </button>
                </li>
                <li
                    class="cursor-pointer capitalize m-4"
                    v-for="projectSkill in skills.data"
                    :key="projectSkill.id"
                >
                    <button
                        class="flex text-center px-4 py-2 hover:text-light-tail-500 dark:text-dark-navy-100"
                    >
                        {{ projectSkill.name }}
                    </button>
                </li>
            </ul>
        </nav>
    </div>
</template>
