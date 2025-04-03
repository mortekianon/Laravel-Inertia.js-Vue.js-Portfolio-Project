<script setup>
import FrontendLayout from "@/Layouts/Frontend.vue";
import Hero from "@/Components/Hero.vue";
import About from "@/Components/About.vue";
import Skills from "@/Components/Skills.vue";
import Promote from "@/Components/Promote.vue";
import Portfolio from "@/Components/Portfolio.vue";
import { Head, Link } from "@inertiajs/vue3";

defineProps({
    specializations: Object,
    skills: Object,
    projects: Object,
});
</script>

<template>
    <Head title="Portfolio Project | mortekianond" />
    <FrontendLayout>
        <!-- Hero Primary -->
        <Hero />
        <!-- Promote Trail -->
        <Promote />
        <!-- About Secondary -->
        <About />
        <!-- Skills-tail-100 -->
        <Skills :skills="skills" />
        <!-- Project primary -->
        <Portfolio
            :specializations="specializations"
            :skills="skills"
            :projects="projects"
        />
        <!-- Services secondary -->
        <!-- Contact primary -->
    </FrontendLayout>
</template>
