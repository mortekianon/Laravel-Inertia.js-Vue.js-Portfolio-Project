<script setup>
import { ref } from "vue";

defineProps({
    specializations: Object,
    skills: Object,
    projects: Object,
});

// State untuk menyimpan nama yang ditampilkan di button
const buttonName = ref("");

// Fungsi untuk mengganti nama menjadi 'NIGEL'
const changeName = () => {
    buttonName.value = "NIGEL";
};
</script>

<template>
    <div class="container mx-auto">
        <nav class="mb-12 max-w-6xl mx-auto px-4">
            <ul
                class="flex flex-col lg:flex-row justify-evenly items-center border-b-2 border-light-tail-100"
            >
                <li
                    class="cursor-pointer capitalize m-4"
                    v-for="specialization in specializations.data"
                    :key="specialization.id"
                >
                    <button
                        class="flex text-center px-4 py-2 hover:text-light-tail-500 dark:text-dark-navy-100"
                        @click="changeName"
                    >
                        {{ buttonName || specialization.name }}
                        <!-- Tampilkan nama yang sudah diubah jika ada -->
                    </button>
                </li>
            </ul>
        </nav>
    </div>
</template>
