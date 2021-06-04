<template>
    <div v-if="canLogin" class="p-4 flex items-center w-full inset-x-0 top-0 z-20 text-white fixed">
        <div class="text-2xl font-bold mr-6 flex items-center">
            <img class="block pl-4 h-9 w-auto" src="@/img/logo.png" />
        </div>
        <div class="ml-auto">
            <inertia-link v-if="$page.props.user" href="/dashboard" class="text-gray-200 hover:text-green-600">
                Tableau de bord
            </inertia-link>

            <template v-else>
                <inertia-link :href="route('login')" class="text-gray-200 hover:text-green-600">
                    Connexion
                </inertia-link>

                <inertia-link v-if="canRegister" :href="route('register')"
                    class="ml-4 text-gray-200 hover:text-green-600">
                    S'inscrire
                </inertia-link>
            </template>
        </div>
    </div>

    <div class="home flex flex-col items-center justify-center h-screen">
        <h1 class="text-3xl sm:w-3/6 text-center font-bold text-white mb-4">
            Bienvenu sur notre site de formations 100% gratuit dans tout domaine...
        </h1>
        <legend class="text-center text-sm m-2">
            Des cours dans:
            <span class="text-gray-300 text-xs">Apprendre le C, Les reseaux, Comment dévlopper un site web,
            </span>
            <inertia-link :href="route('cours.index')" class="text-blue-800 bold">plus...</inertia-link>
        </legend>
    </div>
</template>

<script>
    export default {
        props: {
            canLogin: Boolean,
            canRegister: Boolean
        }
    }

</script>

<style scoped>
    .home {
        background-image: url('@/img/home.jpg');
        background-size: cover
    }

</style>
