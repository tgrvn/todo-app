<template>
    <Aside />

    <div class="p-4 sm:ml-64">
        <slot />
    </div>
</template>

<script setup>
import Aside from "../Shared/Aside.vue";
</script>
