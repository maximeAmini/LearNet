<template>
    <app-layout>
        <!--Le titre-->
        <div class="w-full flex flex-wrap items-center justify-center mb-4">
            <h1 class="text-xl leading-tight font-extrabold">
                Liste des Cours
            </h1>
            <inertia-link :href="route('cours.create')"
                class="transition duration-500 ease-in-out border border-green-700 dark:text-white px-4 py-2 hover:bg-green-800 hover:text-white ml-auto">
                Crée une formation</inertia-link>
        </div>
        <!--Les cours-->
        <div class="w-full flex flex-wrap items-center justify-center">
            <Cour v-for="cour in this.cours.data" v-bind:key="cour.id" :cour='cour' />
        </div>
        <div class="flex items-center">
            <inertia-link v-if="this.cours.prev_page_url!=null" :href="this.cours.prev_page_url"
                class=" text-green-700 hover:text-green-500 px-2">Précédent</inertia-link>
            <inertia-link v-if="this.cours.next_page_url!=null" :href="this.cours.next_page_url"
                class=" text-green-700 hover:text-green-500 px-2 ml-auto">Suivant</inertia-link>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Cour from '@/Components/CourCmp'
    export default {
        components: {
            AppLayout,
            Cour
        },
        props: {
            'cours': String
        }
    }

</script>
