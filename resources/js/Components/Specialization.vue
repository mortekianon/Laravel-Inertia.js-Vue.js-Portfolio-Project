<script setup>
import { ref, computed } from "vue";

const props = defineProps({
    specializations: Object,
    skills: Object,
    projects: Object,
});

const selectedSpecialization = ref(null);
const selectedSkill = ref(null);

const changeSpecialization = (specializationId) => {
    selectedSpecialization.value =
        selectedSpecialization.value === specializationId
            ? null
            : specializationId;
    selectedSkill.value = null;
};

const changeSkill = (skillId) => {
    selectedSkill.value = selectedSkill.value === skillId ? null : skillId;
};

const filteredSkills = computed(() => {
    if (!selectedSpecialization.value) return [];

    return props.skills.data.filter((skill) =>
        skill.specializations.some(
            (spec) => spec.id === selectedSpecialization.value
        )
    );
});

const filteredProjects = computed(() => {
    if (!selectedSkill.value) return [];

    return props.projects.data.filter((project) =>
        project.skills.some((skill) => skill.id === selectedSkill.value)
    );
});
</script>

<template>
    <div class="container mx-auto">
        <nav class="mb-8 max-w-6xl mx-auto px-4">
            <ul
                class="flex flex-wrap justify-center border-b-2 border-gray-300"
            >
                <li
                    v-for="specialization in specializations.data"
                    :key="specialization.id"
                    class="cursor-pointer capitalize m-2"
                >
                    <button
                        @click="changeSpecialization(specialization.id)"
                        class="px-4 py-2 border rounded-lg transition-all"
                        :class="{
                            'bg-blue-500 text-white':
                                selectedSpecialization === specialization.id,
                            'bg-gray-200 text-black':
                                selectedSpecialization !== specialization.id,
                        }"
                    >
                        {{ specialization.name }}
                    </button>
                </li>
            </ul>
        </nav>

        <div
            v-if="filteredSkills.length > 0"
            class="grid grid-cols-2 md:grid-cols-4 gap-4"
        >
            <div
                v-for="skill in filteredSkills"
                :key="skill.id"
                class="p-4 border rounded-lg shadow-md text-center cursor-pointer"
                @click="changeSkill(skill.id)"
                :class="{
                    'border-blue-500 shadow-lg': selectedSkill === skill.id,
                }"
            >
                <img
                    :src="skill.image"
                    :alt="skill.name"
                    class="h-16 mx-auto mb-2"
                />
                <p class="font-semibold">{{ skill.name }}</p>
            </div>
        </div>

        <p
            v-if="filteredSkills.length === 0"
            class="text-center text-gray-500 mt-4"
        >
            Discover my skills through my specializations.
        </p>

        <div
            v-if="filteredProjects.length > 0"
            class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4"
        >
            <div
                v-for="project in filteredProjects"
                :key="project.id"
                class="p-4 border rounded-lg shadow-md text-center"
            >
                <img
                    :src="project.image"
                    :alt="project.name"
                    class="h-20 mx-auto mb-2 rounded-lg"
                />
                <p class="font-semibold">{{ project.name }}</p>
            </div>
        </div>

        <p
            v-if="selectedSkill && filteredProjects.length === 0"
            class="text-center text-gray-500 mt-4"
        >
            There's no project about this skill
        </p>
    </div>
</template>
