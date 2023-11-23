<template>
    <aside
        id="default-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full"
        aria-label="Sidebar"
        ref="aside"
        v-click-outside="close"
    >
        <div
            class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800"
        >
            <Link href="/" class="flex items-center ps-2.5 mb-5">
                <img
                    :src="$page.props.app.logo"
                    class="h-6 me-3 sm:h-7"
                    alt="todo-app-logo"
                />
                <span
                    class="self-center text-xl font-semibold whitespace-nowrap dark:text-white"
                    >{{ $page.props.app.name }}</span
                >
            </Link>

            <ul class="space-y-2 font-medium">
                <Navlink :href="route('boards')" header="Усі дошки">
                    <i class="fa-solid fa-table-columns"></i>
                </Navlink>

                <Navlink :href="route('boards')" header="Обрані">
                    <i class="fa-solid fa-star"></i>
                </Navlink>

                <!-- <Navlink :href="route('shared')" header="Спільні дошки">
                    <i class="fa-solid fa-share-nodes"></i>
                </Navlink> -->
            </ul>

            <div
                class="pt-4 mt-4 space-y-2 border-t border-gray-200 dark:border-gray-700"
            ></div>

            <ul class="space-y-2 font-medium">
                <Navlink href="#" header="Налаштування">
                    <i class="fa-solid fa-gear"></i>
                </Navlink>

                <Navlink
                    method="post"
                    as="button"
                    :href="route('logout')"
                    header="Вийти"
                >
                    <i class="fa-solid fa-right-from-bracket"></i>
                </Navlink>
            </ul>
        </div>

        <button
            @click="toggle"
            data-drawer-target="default-sidebar"
            data-drawer-toggle="default-sidebar"
            aria-controls="default-sidebar"
            :class="{
                'z-50 absolute top-2 -right-16 inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg hover:bg-gray-600 dark:text-gray-400 bg-gray-700':
                    isOpen,
                'z-50 absolute top-2 -right-16 inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700':
                    !isOpen,
            }"
        >
            <div class="w-6 h-6 flex items-center">
                <div class="w-6 h-4 relative">
                    <div
                        class="absolute top-0 bg-white w-[100%] h-[2px] rounded-lg"
                    ></div>
                    <div
                        :class="{
                            'absolute top-2 bg-white w-[100%] h-[1.5px] rounded-lg':
                                !isOpen,
                            'absolute top-2 bg-white w-[80%] h-[1.5px] rounded-lg':
                                isOpen,
                        }"
                    ></div>
                    <div
                        :class="{
                            'absolute top-4 bg-white w-[100%] h-[1.4px] rounded-lg':
                                !isOpen,
                            'absolute top-4 bg-white w-[50%] h-[1.4px] rounded-lg':
                                isOpen,
                        }"
                    ></div>
                </div>
            </div>
        </button>
    </aside>
</template>

<script setup>
import { onMounted, ref } from "vue";
import Navlink from "./Navlink.vue";

const isOpen = ref(false);

const toggle = () => {
    isOpen.value = !isOpen.value;
};

const close = () => {
    isOpen.value = false;
};
</script>
