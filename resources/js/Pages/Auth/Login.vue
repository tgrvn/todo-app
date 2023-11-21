<template>
    <AuthFormLayout
        header="Увійдіть у свій аккаунт"
        footerTitle="Ще не маєте аккаунт?"
        footerLinkTitle="Зареєструватись"
        :footerLinkHref="route('register')"
    >
        <template v-slot:form>
            <form
                class="space-y-4 md:space-y-6"
                @submit.prevent="form.post(route('login-user'))"
            >
                <Input
                    name="email"
                    type="email"
                    v-model="form.email"
                    :error="form.errors.email"
                    placeholder="example@company.com"
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

                <div class="flex items-center justify-between">
                    <Checkbox name="remember" v-model:checked="form.remember">
                        Запамʼятати мене
                    </Checkbox>

                    <Link
                        href="#"
                        class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500"
                    >
                        Забули пароль?
                    </Link>
                </div>

                <Button type="submit"> Увійти </Button>
            </form>
        </template>
    </AuthFormLayout>
</template>

<script>
export default {
    layout: null,
    components: { Input, Checkbox },
};
</script>

<script setup>
import Checkbox from "../../Shared/Checkbox.vue";
import Input from "../../Shared/Input.vue";
import Button from "../../Shared/Button.vue";
import AuthFormLayout from "../../Layouts/AuthFormLayout.vue";
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    email: null,
    password: null,
    remember: false,
});
</script>
