<script setup>
import Projects from "./Projects.vue";
import Specialization from "./Specialization.vue";

defineProps({
    specializations: Object,
    skills: Object,
    projects: Object,
});
</script>

<template>
    <section
        id="porfolio"
        class="section bg-light-primary dark:bg-dark-primary min-h-[1400px]"
    >
        <div class="container mx-auto">
            <div class="flex flex-col items-center text-center">
                <h2 class="section-title">My Projects</h2>
                <p class="subtitle">
                    This is the gallery of my projects, showcasing my enthusiasm
                    for web development and data analytics.
                </p>
            </div>
        </div>
        <Specialization
            :specializations="specializations"
            :skills="skills"
            :projects="projects"
        />
    </section>
</template>
