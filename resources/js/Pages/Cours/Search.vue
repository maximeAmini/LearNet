<template>
    <app-layout>
        <!--Le titre-->
        <div class="w-full flex flex-wrap items-center justify-center mb-4">
            <h1 class="text-xl leading-tight font-extrabold">
                resultat de votre recherche
            </h1>
            <form class="p-3 w-full flex flex-wrap items-center justify-center">
                <input type="search" name="search" id="search" placeholder="Recherche..."
                    class="py-2 px-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:outline-none focus:ring-0 focus:border-green-600 mr-4 bg-gray-100 dark:bg-gray-700 w-1/2">
            </form>
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
