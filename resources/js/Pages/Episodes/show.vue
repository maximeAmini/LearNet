<template>
    <app-layout>
        <div class="flex flex-wrap w-full">
            <!--La video-->
            <div class="w-full lg:w-4/6">
                <iframe class="h-52 sm:h-96 w-full" :src="this.episodes[this.idEp].video_url"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
                <!--Infos sur la video-->
                <div class="w-full">
                    <h1 class="flex w-full items-center justify-center text-xl lg:text-lg font-extrabold py-4">
                        <div>{{this.episodes[this.idEp].title}}</div>
                        <div class="sm:w-2/6 w-full text-xs font-extrabold text-gray-500 ml-auto text-right">
                            le :{{new Date(this.episodes[this.idEp].created_at).toLocaleString()}}
                        </div>
                    </h1>
                    <!--Utilisateur-->
                    <div class="w-full flex flex-wrap items-center justify-center py-4 border-t border-gray-300">
                        <inertia-link :href="route('user.show', {id:this.cour.user.id})" class="flex items-center">
                            <img :src="this.cour.user.profile_photo_url" class="cursor-pointer rounded-full h-8 w-8" />
                            <span class="text-lg font-extrabold ml-1">{{this.cour.user.name}}</span>
                        </inertia-link>
                        <Follow :idU="this.cour.user.id" />
                    </div>
                    <p>{{this.episodes[this.idEp].discription}}</p>
                </div>
            </div>
            <!--Les episodes-->
            <div class=" pl-2 sm:pt-0 pt-2 w-full lg:w-2/6">
                <ul class="border-b border-r border-l border-gray-300 dark:border-gray-600 h-96 overflow-hidden">
                    <h3
                        class="text-xl font-extrabold p-4 border-t border-gray-300 dark:border-gray-800 bg-gray-100 dark:bg-gray-700">
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
    import DoneBtn from '@/Components/DoneBtn'
    import Follow from '@/Components/FollowBtn'
    export default {
        components: {
            AppLayout,
            DoneBtn,
            Follow
        },
        props: {
            'cour': Object,
            'watched': Object,
            'idE': Number
        },
        data() {
            return {
                episodes: this.cour.episodes,
                idEp: this.idE
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
