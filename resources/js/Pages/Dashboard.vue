<template>
    <app-layout>
        <!--Profile-->
        <div class="flex flex-wrap items-center sm:justify-start justify-center p-4 w-full border-b border-gray-200">
            <img :src="this.user1.profile_photo_url" class="cursor-pointer rounded-full h-44 w-44" />
            <div class="sm:ml-8 ml-0">
                <h1 class="text-xl leading-tight font-extrabold">{{this.user1.name}} {{isAbonné}}</h1>
                <div>
                    <strong>Email : </strong><a :href="'mailto:'+this.user1.name">{{this.user1.email}}</a>
                </div>
                <strong class="text-red-800">{{this.cours.length}} cours publié</strong> |
                <strong @click="showModal"
                    class="text-green-800 hover:text-green-600 cursor-pointer">{{this.abonné.length}} personnes
                    suivis.</strong>
            </div>
            <inertia-link :href="route('cours.create')"
                class="transition duration-500 ease-in-out border border-green-700 dark:text-white px-4 py-2 hover:bg-green-800 hover:text-white ml-auto">
                Crée une formation</inertia-link>
        </div>
        <!--Modal-->
        <Modal-Abo v-if="showM" @un-show="showModal" :abonnes="this.abonné" />
        <!--les cours suivi-->
        <div class="w-full">
            <div class="w-full flex p-4 text-xl leading-tight font-extrabold border-b border-gray-200">
                <h1>Cours suivis</h1>
                <a @click="this.showAll" class="text-right ml-auto">
                    <i class="fas cursor-pointer" :class="showM1 ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
                </a>
            </div>
            <transition enter-active-class="transition ease-out duration-500"
                enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100"
                leave-active-class="transition ease-in duration-500" leave-from-class="transform opacity-100 scale-100"
                leave-to-class="transform opacity-0 scale-95">
                <div v-show="showM1">
                    <div class="w-full flex flex-wrap items-center justify-center p-4" v-if='this.myCours.length != 0'>
                        <Mycour :cours='myCours' />
                    </div>
                    <div v-else class="flex justify-center w-full">
                        <div
                            class="w-1/2 mt-4 p-4 rounded-md border border-red-300 bg-red-200 text-gray-600 text-center shadow">
                            Retrouvez tout nos cours
                            <inertia-link :href="route('cours.index')" class="text-blue-600 hover:text-blue-500">ici.
                            </inertia-link>
                        </div>
                    </div>
                </div>
            </transition>
        </div>
        <!--les cours crée-->
        <div class="w-full">
            <div class="w-full flex p-4 text-xl leading-tight font-extrabold border-b border-gray-200">
                <h1>Les cours que vous avez crée</h1>
                <a @click="this.showAll1" class="text-right ml-auto">
                    <i class="fas cursor-pointer" :class="showM2 ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
                </a>
            </div>
            <transition enter-active-class="transition ease-out duration-500"
                enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100"
                leave-active-class="transition ease-in duration-500" leave-from-class="transform opacity-100 scale-100"
                leave-to-class="transform opacity-0 scale-95">
                <div v-show="showM2">
                    <div class="flex flex-wrap items-center justify-center p-4 w-full" v-if='this.cours.length != 0'>
                        <Mycrea :cours='cours' />
                    </div>
                    <div v-else class="flex justify-center w-full">
                        <div
                            class="w-1/2 mt-4 p-4 rounded-md border border-green-300 bg-green-200 text-gray-600 text-center shadow">
                            Commencez a crée vos propres cours
                            <inertia-link :href="route('cours.create')"
                                class="text-blue-600 hover:text-blue-500 font-bold">
                                ici.</inertia-link>
                        </div>
                    </div>
                </div>
            </transition>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Cour from '@/Components/CourCmp'
    import Mycour from '@/Components/Mycour'
    import Mycrea from '@/Components/Mycrea'
    import ModalAbo from '@/Components/ModalAbo'
    export default {
        components: {
            AppLayout,
            Cour,
            Mycour,
            Mycrea,
            ModalAbo
        },
        props: {
            user1: Object,
            abonné: Object,
            myCours: Object,
            cours: Object,
        },
        data() {
            return {
                showM: false,
                showM1: true,
                showM2: true,
            }
        },
        methods: {
            showModal() {
                this.showM = !this.showM
            },
            showAll() {
                this.showM1 = !this.showM1
            },
            showAll1() {
                this.showM2 = !this.showM2
            }
        }
    }

</script>
