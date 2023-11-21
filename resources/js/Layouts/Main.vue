<template>
    <Aside />

    <div class="p-4 sm:ml-64">
        <transition name="page" mode="out-in" appear>
            <main :key="$page.url">
                <slot />
            </main>
        </transition>
    </div>
</template>

<script setup>
import Aside from "../Shared/Aside.vue";
</script>

<style>
    .page-enter-active,
    .page-leave-active {
        transition: all .2s;
    }

    .page-enter,
    .page-leave-active {
        opacity: 0;
    }
</style>