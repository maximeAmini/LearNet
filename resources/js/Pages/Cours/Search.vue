<template>
    <app-layout>
        <!--Le titre-->
        <div class="w-full flex flex-wrap items-center justify-center mb-4">
            <h1 class="text-xl leading-tight font-extrabold">
                Resultat pour votre recherche "{{this.search}}"
            </h1>
        </div>
        <div class="flex flex-wrap mb-4 ">
            <inertia-link :href="route('cours.search',{'search':this.search})"
                class="transition duration-500 ease-in-out hover:text-green-300 w-1/2 text-center border border-gray-200 p-4"
                :class="!this.user1? 'bg-green-600 text-white':''">
                <i class="fas fa-book text-xl"></i>
            </inertia-link>
            <inertia-link :href="route('user.search',{'search':this.search})"
                class="transition duration-500 ease-in-out hover:text-green-300 w-1/2 text-center border border-gray-200 p-4"
                :class="this.user1? 'bg-green-600 text-white':''">
                <i class="fas fa-user text-xl"></i>
            </inertia-link>
        </div>
        <!--Les cours-->
        <div v-if="!this.user1" class="w-full flex flex-wrap items-center justify-center">
            <Cour v-for="cour in this.cours" v-bind:key="cour.id" :cour='cour' />
        </div>
        <!--Les users -->
        <div v-else class="w-full flex flex-wrap items-center justify-center">
            <User-Profile v-for="cour in this.cours" v-bind:key="cour.id" :user='cour' />
         </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Cour from '@/Components/CourCmp'
    import UserProfile from '@/Components/UserProfile'
    export default {
        components: {
            AppLayout,
            Cour,
            UserProfile
        },
        props: {
            cours: Object,
            search: String,
            user1: Boolean
        }
    }

</script>
