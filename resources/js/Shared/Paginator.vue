<template>
    <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm">
        <template v-for="l in links" :key="l.id">
            <Component
                v-if="l.label.includes('Previous')"
                :is="l.url ? 'Link' : 'span'"
                :href="l.url"
                :class="{
                    'relative inline-flex items-center rounded-l-md px-2 py-2 border bg-gray-800 border-gray-700 text-gray-400 hover:bg-gray-700 hover:text-white':
                        l.active,
                    'cursor-pointer relative inline-flex items-center rounded-l-md px-2 py-2 border bg-gray-800 border-gray-700 text-gray-400 hover:bg-gray-700 hover:text-white':
                        !l.active,
                }"
            >
                <i class="fa-solid fa-chevron-left"></i>
            </Component>

            <Component
                v-else-if="l.label.includes('Next')"
                :is="l.url ? 'Link' : 'span'"
                :href="l.url"
                :class="{
                    'relative inline-flex items-center rounded-r-md px-2 py-2 border bg-gray-800 border-gray-700 text-gray-400 hover:bg-gray-700 hover:text-white':
                        l.active,
                    'cursor-pointer relative inline-flex items-center rounded-r-md px-2 py-2 border bg-gray-800 border-gray-700 text-gray-400 hover:bg-gray-700 hover:text-white':
                        !l.active,
                }"
            >
                <i class="fa-solid fa-chevron-right"></i>
            </Component>

            <Component
                v-else
                :is="l.url ? 'Link' : 'span'"
                :href="l.url"
                :class="{
                    'relative inline-flex items-center px-4 py-2 text-sm font-semibold border bg-gray-700 border-gray-700 text-white focus:z-20 focus:outline-offset-0':
                        l.active,
                    'cursor-pointer relative inline-flex items-center px-4 py-2 text-sm font-semibold border bg-gray-800 border-gray-700 text-gray-400 hover:bg-gray-700 hover:text-white focus:z-20 focus:outline-offset-0':
                        !l.active,
                }"
            >
                {{ l.label }}
            </Component>
        </template>
    </nav>
</template>

<script setup>
defineProps({
    links: Array,
});
</script>
