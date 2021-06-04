<template>
    <div class="auth flex flex-col content-center justify-center items-center h-screen dark:bg-gray-900 dark:text-white">
        <x-jet-validation-errors class="mb-4" />
        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>
        <div class="bg-white shadow-lg max-w-lg max-h-bg md:flex">
            <img src="@/img/cover.jpg" alt="cover" class="flex-1 w-full h-28 object-cover md:h-full">

            <div class="h-80 flex-1 p-4 sm:pt-20 flex flex-col items-center justify-center">
                <h1 class="text-2xl font-bold text-gray-800">Connexion</h1>

                <form @submit.prevent="submit" class="my-2">
                    <!-- Email input -->
                    <label for="email" class="block text-gray-600 mb-1">Email</label>
                    <input type="text" id="email" name="email"
                        class="mb-4 input"
                        placeholder="Email" v-model="form.email" required autofocus>
                    <!-- Password input -->
                    <label for="password" class="block text-gray-600 mb-1">Mot de passe</label>
                    <input type="password" id="password" name="password"
                        class="w-full input"
                        placeholder="Mot de passe" v-model="form.password" required>
                    <!-- Link -->
                    <inertia-link class="float-right text-blue-600 hover:text-blue-900 text-xs"
                        :href="route('password.request')">
                        Mot de passe oublié ?
                    </inertia-link>
                    <!-- Remember me input -->
                    <label for="remember" class="flex items-center mt-5">
                        <jet-checkbox name="remember" id="remember" v-model:checked="form.remember" />
                        <span class="ml-2 text-sm text-gray-600">se souvenir de moi</span>
                    </label>
                    <!-- Submit button -->
                    <input type="submit"
                        class="btn-blue"
                        value="se connecter">
                    <!-- link -->
                    <inertia-link :href="route('register')" class="text-blue-600 hover:text-blue-900 text-xs mt-8">
                        Vous n'avez pas de compte ?
                    </inertia-link>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import JetCheckbox from '@/Jetstream/Checkbox'
    import JetValidationErrors from '@/Jetstream/ValidationErrors'

    export default {
        components: {
            JetCheckbox,
            JetValidationErrors
        },

        props: {
            canResetPassword: Boolean,
            status: String
        },

        data() {
            return {
                form: this.$inertia.form({
                    email: '',
                    password: '',
                    remember: false
                })
            }
        },

        methods: {
            submit() {
                this.form
                    .transform(data => ({
                        ...data,
                        remember: this.form.remember ? 'on' : ''
                    }))
                    .post(this.route('login'), {
                        onFinish: () => this.form.reset('password'),
                    })
            }
        }
    }

</script>
