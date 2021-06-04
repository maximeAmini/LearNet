<template>
    <app-layout>
        <div class="flex flex-wrap items-center sm:justify-start justify-center p-4 w-full border-b border-gray-400">
            <img :src="this.user1.profile_photo_url" class="cursor-pointer rounded-full h-44 w-44" />
            <div class="sm:ml-8 ml-0 sm:mt-0 mt-4">
                <h1 class="text-xl leading-tight font-extrabold">{{this.user1.name}}</h1>
                <div>
                <strong>Email : </strong><a :href="'mailto:'+this.user1.name">{{this.user1.email}}</a>
                </div>
                <strong class="text-red-800">{{this.cours.length}} cours disponible</strong>
            </div>
            <Follow :idU="this.user1.id" :abonne="this.isAbonné"/>
        </div>
        <div class="flex flex-wrap items-center justify-center w-full pt-2">
            <Cour v-for="cour in this.cours" v-bind:key="cour.id" :cour='cour' />
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Cour from '@/Components/CourCmp'
    import Follow from '@/Components/FollowBtn'
    export default {
        components: {
            AppLayout,
            Cour,
            Follow
        },
        props: {
            user1: Object,
            cours: Object,
            abonné: Object
        },
        computed:{
            isAbonné(){
                var uu = this.user1.id
                var found= this.abonné.find((el)=> el.id === uu   )
                if (found){
                    return true;
                }else{
                    return false
                }
            }
        }
    }

</script>
