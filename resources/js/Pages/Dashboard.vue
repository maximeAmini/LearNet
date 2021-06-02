<template>
    <app-layout>
        <div class="w-full border border-gray-200" v-if='this.cours.length != 0'>
            <div class="flex p-4 w-full text-xl leading-tight font-extrabold border-b border-gray-200 bg-gray-100 dark:bg-gray-800">
                <h1>Vos Cours</h1>
                <a @click="showAll" class="text-right ml-auto"><i class="fas fa-chevron-down cursor-pointer"></i></a>
            </div>
            <div class="flex flex-wrap items-center justify-center p-4 w-full">
                <Mycour v-for="cour in this.myCours" v-bind:key="cour.id" :cour='cour' />
            </div>
        </div>
        <div class="w-full border border-gray-200" v-if='this.cours.length != 0'>
            <div class="flex p-4 w-full text-xl leading-tight font-extrabold border-b border-gray-200 bg-gray-100 dark:bg-gray-800">
                <h1>Les cours que vous avez crée</h1>
                <a @click="showAll" class="text-right ml-auto"><i class="fas fa-chevron-up cursor-pointer"></i></a>
            </div>
            <div class="flex flex-wrap items-center justify-center p-4 w-full">
                <Cour v-for="cour in this.cours" v-bind:key="cour.id" :cour='cour' />
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Cour from '@/Components/CourCmp'
    import Mycour from '@/Components/Mycour'
    export default {
        components: {
            AppLayout,
            Cour,
            Mycour
        },
        props: {
            myCours:Object,
            cours: Object,
        }
    }

</script>
