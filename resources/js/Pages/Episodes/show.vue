<template>
    <app-layout>
        <div class="flex flex-wrap w-full">
            <!--La video-->
            <div class="w-full lg:w-4/6">
                <iframe class="h-52 sm:h-96 w-full"
                    src="https://www.youtube.com/embed/SlX03hcCayE?list=PLeeuvNW2FHVjrsrvuVZwyqNIyDvYNn33E"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
                <!--Infos sur la video-->
                <div class="w-full">
                    <h1 class="flex w-full items-center justify-center text-xl lg:text-lg font-extrabold py-4">
                        {{this.episodes[this.idEp].title}}
                        <div class="w-2/6 text-xs font-extrabold text-gray-500 ml-auto text-right">
                            le :{{new Date(this.episodes[this.idEp].created_at).toLocaleString()}}
                        </div>
                    </h1>
                    <div class="w-full flex flex-wrap items-center justify-center py-4 border-t border-gray-300">
                        <img src="@/img/user.png" class="cursor-pointer rounded-full h-8 w-8" />
                        <h3 class="text-lg font-extrabold ml-1">{{this.cour.user.name}}</h3>
                        <button class="transition duration-500 ease-in-out border border-green-700 dark:text-white px-4 py-2 hover:bg-green-800 hover:text-white ml-auto">
                            Abonnée
                        </button>
                    </div>
                    <p>{{this.episodes[this.idEp].discription}}</p>
                </div>
            </div>
            <!--Les episodes-->
            <div class=" pl-2 w-full lg:w-2/6">
                <ul class="border-b border-r border-l border-gray-300 dark:border-gray-600 h-96 overflow-hidden">
                    <h3
                        class="text-xl font-extrabold p-4 border-t border-gray-300 dark:border-gray-600 bg-gray-100 dark:bg-gray-700">
                        Les épisodes:<i class="far fa-chevron-down"></i> <br>
                        <span class="text-sm">{{this.idEp+1}}/{{this.episodes.length}}</span>
                    </h3>
                    <div class="h-80 overflow-scroll">
                        <li v-for="(ep,index) in this.episodes" v-bind:key="ep.id"
                            class="p-4 border-t border-gray-300 dark:border-gray-600">
                            <a @click="switchEp(index)" class="text-sm hover:text-green-800 cursor-pointer">
                                {{ep.title}}
                            </a>
                        </li>
                    </div>
                </ul>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    export default {
        components: {
            AppLayout,
        },
        props: {
            'cour': Object
        },
        data() {
            return {
                episodes: this.cour.episodes,
                idEp: 0
            }
        },
        methods: {
            switchEp(index) {
                this.idEp = index
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                })
            }
        }
    }

</script>
