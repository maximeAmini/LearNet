<template>
    <div class="flex flex-col items-center justify-center z-30">
        <div
            class="absolute  bg-white dark:bg-gray-900 shadow-lg w-11/12 sm:w-1/2 z-30 rounded-sm transition-all duration-500 ease-in-out">
            <div class="p-4 text-xl leading-tight font-extrabold w-full flex items-center border border-gray-200 dark:border-gray-700">
                Les personnes que vous suivez :
                <a class="ml-auto cursor-pointer" @click="$emit('un-show')"> <i class="fa fa-times"></i></a>
            </div>
            <ul class="h-96 sm:h-80 overflow-scroll w-full flex flex-wrap items-center justify-center">
                <User-Profile v-for="abonné in this.abonnes" v-bind:key="abonné.id" :user='abonné' />
            </ul>
        </div>
    </div>
    <div @click="$emit('un-show')"
        class="fixed top-0 bottom-0 right-0 left-0 h-screen w-screen bg-black opacity-30 z-20 overflow-hidden">
    </div>
</template>

<script>
    import UserProfile from '@/Components/UserProfile'
    export default {
        components: {
            UserProfile
        },
        props: {
            abonnes: Object
        }
    }

</script>
