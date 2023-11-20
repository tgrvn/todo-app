<template>
    <div>
        <label
            :for="name"
            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
        >
            <slot />
        </label>
        <input
            class="outline-none bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            :type="type"
            :name="name"
            :id="name"
            :placeholder="placeholder"
            :required="required"
            :value="value"
        />
    </div>
</template>

<script setup>
defineProps({
    name: String,
    label: String,
    type: String,
    value: {
        type: String,
        default: "",
    },
    placeholder: String,
    required: {
        type: Boolean,
        default: false,
    },
});
</script>
