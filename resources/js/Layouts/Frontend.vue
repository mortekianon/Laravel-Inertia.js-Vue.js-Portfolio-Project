<script setup>
import Footer from "@/Components/Footer.vue";
import Header from "@/Components/Header.vue";
</script>
<template>
    <div class="bg-slate-200 dark:bg-slate-900">
        <!-- HEADER -->
        <Header />
        <main class="min-h-screen">
            <slot />
        </main>
        <Footer />
        <!-- FOOTER -->
    </div>
</template>
