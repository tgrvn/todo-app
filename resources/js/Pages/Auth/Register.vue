<template>
    <AuthFormLayout
        header="Зареєструйте новий аккаунт"
        footerTitle="Вже є аккаунт?"
        footerLinkTitle="Увійти"
        :footerLinkHref="route('login')"
    >
        <template v-slot:form>
            <form class="space-y-4 md:space-y-6" action="#">
                <Input name="usename" type="usename" placeholder="username">
                    Ваш нікнейм
                </Input>

                <Input
                    name="email"
                    type="email"
                    placeholder="example@company.com"
                >
                    Ваша пошта
                </Input>

                <Input name="password" type="password" placeholder="••••••••">
                    Ваш пароль
                </Input>

                <Input
                    name="password_confirmation"
                    type="password"
                    placeholder="••••••••"
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
</script>
