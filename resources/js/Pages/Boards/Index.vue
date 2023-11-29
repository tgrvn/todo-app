<template>
    <section class="py-8 px-6 mt-12">
        <div
            class="mb-10 flex flex-col gap-4 items-center sm:flex-row sm:items-end sm:justify-between"
        >
            <h3 class="text-xl font-bold">Ваші робочі дошки</h3>

            <div class="relative sm:w-[50%] w-full">
                <input
                    type="text"
                    name="search"
                    v-model="search"
                    id="search-dropdown"
                    class="rounded-s-lg block p-2.5 w-full pr-20 z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                    placeholder="Пошук дошки...."
                />

                <button
                    class="absolute z-20 top-0 bottom-0 right-14"
                    :class="{ 'right-4': !showClear }"
                    @click="clear"
                >
                    <i class="fa-solid fa-xmark"></i>
                </button>

                <button
                    disabled
                    class="absolute top-0 end-0 p-2.5 z-30 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600"
                >
                    <i class="fa-solid fa-magnifying-glass w-5 h-5"></i>
                </button>
            </div>
        </div>

        <transition name="page" mode="out-in" apear>
            <main
                class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-7"
                :key="$page.url"
            >
                <div
                    v-for="b in boards.data"
                    :key="b.id"
                    :class="
                        (b.theme ? b.theme.class_name : '') + ' ' + 'rounded-sm'
                    "
                >
                    <Link href="#">
                        <div
                            class="group px-2 py-4 font-semibold text-sm min-w-[140px] h-28 backdrop-brightness-75 hover:backdrop-brightness-50 relative overflow-hidden"
                            :title="b.title"
                        >
                            <p>
                                {{
                                    b.title.length >= 87
                                        ? b.title.slice(0, 84) + " ..."
                                        : b.title
                                }}
                            </p>

                            <span
                                class="group-hover:right-2 absolute bottom-2 -right-4 text-md hover:text-lg transition-all duration-100 cursor-pointer"
                            >
                                <Link as="button" method="post">
                                    <i class="fa-regular fa-star"></i>
                                </Link>
                            </span>
                        </div>
                    </Link>
                </div>

                <div
                    id="createBoardToggle"
                    data-dropdown-toggle="createBoard"
                    data-dropdown-placement="right"
                    class="px-2 py-4 font-semibold text-sm min-w-[140px] h-28 flex justify-center items-center bg-slate-600 hover:bg-slate-500 select-none"
                >
                    <p>Створити дошку</p>
                </div>

                <div
                    id="createBoard"
                    class="z-10 hidden transition-none bg-white divide-y divide-gray-100 border-2 border-gray-600 rounded-lg w-80 shadow-md dark:bg-gray-700"
                >
                    <div
                        aria-labelledby="createBoardToggle"
                        class="px-1 py-2 border-b rounded-t-lg border-gray-600 bg-gray-700"
                    >
                        <h3
                            class="font-semibold text-center text-gray-900 dark:text-white"
                        >
                            Створити дошку
                        </h3>
                    </div>

                    <div class="px-[17px] py-8">
                        <div class="px-6">
                            <div
                                class="flex justify-center bg-red-300 p-4 rounded-md"
                            >
                                <img
                                    src="https://trello.com/assets/14cda5dc635d1f13bc48.svg"
                                />
                            </div>
                        </div>

                        <div class="mt-4">
                            <p class="font-bold text-sm">Фон</p>

                            <div class="flex justify-between">
                                <div
                                    v-for="t in gradientsPreview"
                                    :key="t.id"
                                    :class="t.class_name"
                                    class="cursor-pointer rounded-md w-[64px] h-[40px] hover:brightness-125"
                                ></div>
                            </div>

                            <div class="flex justify-between mt-2">
                                <div
                                    v-for="t in colorsPreview"
                                    :key="t.id"
                                    :class="t.class_name"
                                    class="cursor-pointer rounded-md w-[40px] h-[32px] hover:brightness-125"
                                ></div>

                                <template>
                                    <div
                                        id="moreThemesToggler"
                                        data-dropdown-toggle="dropdownRight"
                                        offsetSkidding="0"
                                        data-dropdown-placement="left"
                                        class="cursor-pointer rounded-md w-[40px] h-[32px] bg-gray-600 text-white flex justify-center items-center hover:brightness-125"
                                    >
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </div>

                                    <div
                                        id="dropdownRight"
                                        class="z-10 shadow-lg transition-none hidden bg-white divide-y divide-gray-100 rounded-lg border-2 border-gray-600 w-44 dark:bg-gray-700"
                                    >
                                        <ul
                                            class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                            aria-labelledby="moreThemesToggler"
                                        >
                                            <li>
                                                <a
                                                    href="#"
                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                                    >Dashboard</a
                                                >
                                            </li>
                                            <li>
                                                <a
                                                    href="#"
                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                                    >Settings</a
                                                >
                                            </li>
                                            <li>
                                                <a
                                                    href="#"
                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                                    >Earnings</a
                                                >
                                            </li>
                                            <li>
                                                <a
                                                    href="#"
                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                                    >Sign out</a
                                                >
                                            </li>
                                        </ul>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </transition>
    </section>

    <div class="flex justify-end mt-8">
        <Paginator :links="boards.links" />
    </div>

    <pre>
        {{ themes }}
    </pre>
</template>

<script setup>
import { router } from "@inertiajs/vue3";
import Paginator from "../../Shared/Paginator.vue";
import { ref, watch } from "vue";
import debounce from "lodash/debounce";

const { themes } = defineProps({
    boards: Object,
    themes: Array,
});

const gradients = themes.filter((g) => {
    return g.type === "gradient";
});
const gradientsPreview = gradients.splice(0, 4);

const colors = themes.filter((c) => {
    return c.type === "color";
});
const colorsPreview = colors.splice(0, 5);

const search = ref("");
const showClear = ref(false);

watch(
    search,
    debounce(function (value) {
        if (value.length > 0) {
            showClear.value = true;
        } else {
            showClear.value = false;
        }

        router.get(
            "/",
            { search: value },
            { preserveState: true, replace: true }
        );
    }, 300)
);

function clear() {
    search.value = "";
}
</script>

<style>
.page-enter-active,
.page-leave-active {
    transition: all 0.2s;
}

.page-enter,
.page-leave-active {
    opacity: 0;
}
</style>
