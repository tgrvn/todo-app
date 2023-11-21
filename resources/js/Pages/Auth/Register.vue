<template>
    <AuthFormLayout
        header="Зареєструйте новий аккаунт"
        footerTitle="Вже є аккаунт?"
        footerLinkTitle="Увійти"
        :footerLinkHref="route('login')"
    >
        <template v-slot:form>
            <form
                class="space-y-4 md:space-y-6"
                @submit.prevent="form.post(route('register-user'))"
            >
                <Input
                    name="name"
                    type="text"
                    placeholder="Your name"
                    :error="form.errors.name"
                    v-model="form.name"
                >
                    Ваш нікнейм
                </Input>

                <Input
                    name="username"
                    type="text"
                    placeholder="Your username"
                    :error="form.errors.username"
                    v-model="form.username"
                >
                    Ваш нікнейм
                </Input>

                <Input
                    name="email"
                    type="email"
                    placeholder="example@company.com"
                    :error="form.errors.email"
                    v-model="form.email"
                >
                    Ваша пошта
                </Input>

                <Input
                    name="password"
                    type="password"
                    placeholder="••••••••"
                    :error="form.errors.password"
                    v-model="form.password"
                >
                    Ваш пароль
                </Input>

                <Input
                    name="password_confirmation"
                    type="password"
                    placeholder="••••••••"
                    :error="form.errors.password_confirmation"
                    v-model="form.password_confirmation"
                >
                    Повторити пароль
                </Input>

                <div class="my-6"></div>

                <Button type="submit"> Зареєструватись </Button>
            </form>
        </template>
    </AuthFormLayout>
</template>

<script>
export default {
    layout: null,
};
</script>

<script setup>
import Input from "../../Shared/Input.vue";
import Button from "../../Shared/Button.vue";
import AuthFormLayout from "../../Layouts/AuthFormLayout.vue";
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    username: null,
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
});
</script>
