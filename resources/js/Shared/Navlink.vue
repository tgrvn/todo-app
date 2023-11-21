<template>
    <li>
        <Link
            :href="href"
            :as="as"
            class="cursor-pointer w-full flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
            :method="method"
        >
            <div
                class="flex items-center justify-center flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
            >
                <slot />
            </div>

            <span class="ms-3 whitespace-nowrap">{{ header }}</span>

            <!-- chevrons -->

            <!-- <span
                class="inline-flex items-center justify-center px-2 ms-3 text-sm font-medium text-gray-800 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300"
                >Pro
            </span> -->

            <!-- <span
                class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300"
            >
                3
            </span> -->
        </Link>
    </li>
</template>

<script setup>
const { href, header } = defineProps({
    href: String,
    header: String,
    method: {
        type: String,
        default: 'get'
    },
    as: {
        type: String,
        default: "link",
    },
});
</script>
