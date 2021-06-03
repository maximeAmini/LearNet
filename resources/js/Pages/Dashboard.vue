<template>
    <app-layout>
        <div class="w-full">
            <div class="w-full flex p-4 text-xl leading-tight font-extrabold border-b border-gray-200">
                <h1>Cours suivis</h1>
                <a @click="showAll" class="text-right ml-auto"><i class="fas fa-chevron-down cursor-pointer"></i></a>
            </div>
            <div class="w-full flex flex-wrap items-center justify-center p-4" v-if='this.myCours.length != 0'>
                <Mycour :cours='myCours' />
            </div>
            <div v-else class="flex justify-center w-full">
                <div class="w-1/2 mt-4 p-4 rounded-md border border-red-300 bg-red-200 text-gray-600 text-center shadow">
                    Retrouvez tout nos cours
                    <inertia-link :href="route('cours')" class="text-blue-600 hover:text-blue-500">ici.</inertia-link>
                </div>
            </div>
        </div>

        <div class="w-full">
            <div class="w-full flex p-4 text-xl leading-tight font-extrabold border-b border-gray-200">
                <h1>Les cours que vous avez crée</h1>
                <a @click="showAll" class="text-right ml-auto"><i class="fas fa-chevron-up cursor-pointer"></i></a>
            </div>
            <div class="flex flex-wrap items-center justify-center p-4 w-full" v-if='this.cours.length != 0'>
                <Mycrea :cours='cours' />
            </div>
            <div v-else class="flex justify-center w-full">
            <div class="w-1/2 mt-4 p-4 rounded-md border border-green-300 bg-green-200 text-gray-600 text-center shadow">
                Commencez a crée vos propres cours
                <inertia-link :href="route('cours.add')" class="text-blue-600 hover:text-blue-500 font-bold">ici.</inertia-link>
            </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Cour from '@/Components/CourCmp'
    import Mycour from '@/Components/Mycour'
    import Mycrea from '@/Components/Mycrea'
    export default {
        components: {
            AppLayout,
            Cour,
            Mycour,
            Mycrea
        },
        props: {
            myCours: Object,
            cours: Object,
        }
    }

</script>
