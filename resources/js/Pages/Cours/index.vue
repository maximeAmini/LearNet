<template>
    <app-layout>
        <div class="w-full flex flex-wrap items-center justify-center mb-4">
            <h1 class="text-xl leading-tight font-extrabold">
                Liste des Cours
            </h1>
            <a class="transition duration-500 ease-in-out border border-green-700 text-white px-4 py-2 hover:bg-green-800 ml-auto">Crée une formation</a>
        </div>

        <div class="w-full flex flex-wrap items-center justify-center">
            <Cour v-for="cour in this.cours" v-bind:key="cour.id" :cour='cour' />
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
