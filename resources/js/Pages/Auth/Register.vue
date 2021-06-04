<template>
    <div class="flex flex-col content-center justify-center items-center h-screen dark:bg-gray-900 dark:text-white">
        <x-jet-validation-errors class="mb-4" />
        <h1 class="text-2xl font-bold">Crée un compte</h1>
        <form @submit.prevent="submit" class="w-11/12 sm:w-4/12">
            <!-- Name input -->
            <label for="name" class="block mb-1">Nom</label>
            <input type="text" id="name" name="name" class="mb-4 input" placeholder="Nom" v-model="form.name" required
                autofocus>
            <!-- Email input -->
            <label for="email" class="block mb-1">Email</label>
            <input type="text" id="email" name="email" class="mb-4 input" placeholder="Email" v-model="form.email"
                required>
            <!-- pass input -->
            <label for="password" class="block mb-1">Mot de passe</label>
            <input type="password" id="password" name="password" class="mb-4 input" placeholder="Mot de passe"
                v-model="form.password" required>
            <!-- Passconfirmation input -->
            <label for="password_confirmation" class="block mb-1">Confirmez le mot de passe</label>
            <input type="password" id="password_confirmation" name="password_confirmation"
                class="mb-4 input" placeholder="Confirmez le mot de passe" v-model="form.password_confirmation"
                required>
            <!-- Button -->
            <input type="submit"
                class="cursor-pointer bg-green-500 text-white mt-4 px-4 py-2 rounded hover:bg-green-600 float-right"
                value="Crée le compte">
            <!-- Link -->
            <inertia-link :href="route('login')" class="text-blue-600 hover:text-blue-900 text-xs mt-8 block">
                Vous avez déja un compte ?
            </inertia-link>
        </form>
    </div>
</template>

<script>
    import JetValidationErrors from '@/Jetstream/ValidationErrors'

    export default {
        components: {
            JetValidationErrors
        },

        data() {
            return {
                form: this.$inertia.form({
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                    terms: false,
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('register'), {
                    onFinish: () => this.form.reset('password', 'password_confirmation'),
                })
            }
        }
    }

</script>
