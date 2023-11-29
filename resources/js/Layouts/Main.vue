<template>
    <div class="p-4">
        <slot />
    </div>

    <Aside />
</template>

<script setup>
import Aside from "../Shared/Aside.vue";
</script>
