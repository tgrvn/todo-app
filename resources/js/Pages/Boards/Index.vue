<template>
    <section class="py-8 px-6 mt-12">
        <div
            class="mb-10 flex flex-col gap-4 items-center sm:flex-row sm:items-end sm:justify-between"
        >
            <h3 class="text-xl font-bold">Ваші робочі дошки</h3>

            <div class="relative sm:w-[50%] w-full">
                <input
                    type="search"
                    name="search"
                    v-model="search"
                    id="search-dropdown"
                    class="rounded-s-lg block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                    placeholder="Пошук дошки...."
                />
                <button
                    disabled
                    type="submit"
                    class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600"
                >
                    <i class="fa-solid fa-magnifying-glass w-5 h-5"></i>
                </button>
            </div>
        </div>

        <transition name="page" mode="out-in" appear>
            <main
                :key="$page.url"
                class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-7"
            >
                <div
                    v-for="b in boards.data"
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
                                    b.title.length >= 24
                                        ? b.title.slice(0, 21) + "..."
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

                <Link href="#">
                    <div
                        class="px-2 py-4 font-semibold text-sm min-w-[140px] h-28 flex justify-center items-center bg-slate-600 hover:bg-slate-500"
                    >
                        <p>Створити дошку</p>
                    </div>
                </Link>
            </main>
        </transition>

        <div class="flex justify-end mt-8">
            <Paginator :links="boards.links" />
        </div>
    </section>
</template>

<script setup>
import { router } from "@inertiajs/vue3";
import Paginator from "../../Shared/Paginator.vue";
import { ref, watch } from "vue";
import debounce from "lodash/debounce";

defineProps({
    boards: Object,
});

const search = ref("");

watch(
    search,
    debounce(function (value) {
        router.get(
            "/",
            { search: value },
            { preserveState: true, replace: true }
        );
    })
);
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
