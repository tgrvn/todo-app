<template>
    <section class="bg-gray-50 dark:bg-gray-900">
        <div
            class="flex flex-col items-center justify-center px-6 py-8 mx-auto"
        >
            <a
                href="#"
                class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white"
            >
                <img
                    class="w-8 h-8 mr-2"
                    :src="$page.props.app.logo"
                    alt="logo"
                />
                {{ $page.props.app.name }}
            </a>
            
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700"
            >
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1
                        class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white"
                    >
                        {{ header }}
                    </h1>
                    <slot name="form" />
                    
                    <p
                        class="text-sm font-light text-gray-500 dark:text-gray-400"
                    >
                        {{ footerTitle }}
                        <Link
                            :href="footerLinkHref"
                            class="font-medium text-blue-600 hover:underline dark:text-blue-500"
                            >{{footerLinkTitle}}</Link
                        >
                    </p>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
defineProps({
    header: String,
    footerTitle: String,
    footerLinkTitle: String,
    footerLinkHref: String,
});
</script>
