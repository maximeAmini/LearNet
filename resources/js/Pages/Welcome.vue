<template>
    <div v-if="canLogin" class="p-4 flex items-center w-full inset-x-0 top-0 z-20 text-white fixed">
        <div class="text-2xl font-bold mr-6 flex items-center">
            <img class="w-8 mr-2" src="@/img/logo.png" />LearNet
        </div>
        <div class="ml-auto">
            <inertia-link v-if="$page.props.user" href="/dashboard" class="text-gray-200 hover:text-green-600">
                Dashboard
            </inertia-link>

            <template v-else>
                <inertia-link :href="route('login')" class="text-gray-200 hover:text-green-600">
                    Log in
                </inertia-link>

                <inertia-link v-if="canRegister" :href="route('register')" class="ml-4 text-gray-200 hover:text-green-600">
                    Register
                </inertia-link>
            </template>
        </div>
    </div>

    <div class="home flex flex-col items-center justify-center h-screen">
        <h1 class="text-3xl sm:w-3/6 text-center font-bold text-white mb-4">
            Bienvenu sur notre site de formations 100% gratuit dans tout domaine...
        </h1>
        <form class="w-full grid justify-items-center">
            <input type="search" name="search" id="search" placeholder="Recherche..."
                class="sm:w-3/6 py-2 px-4 text-2xl border border-gray-400 rounded-lg focus:outline-none focus:border-green-600 focus:shadow-lg">
            <legend class="text-center text-sm m-2">
                Suggestion:
                <span class="text-gray-300 text-xs">Apprendre le C, Les reseaux, Comment dévlopper un site web,
                </span>
                <router-link to="/formations" class="text-blue-800 bold">plus...</router-link>
            </legend>
        </form>
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
