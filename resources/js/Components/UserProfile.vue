<template>
    <div class="w-full flex items-center lg:w-5/12 m-4 p-4 border border-gray-200">
        <inertia-link :href="route('user.show', {id:this.user.id})" class="">
            <img :src="this.user.profile_photo_url" class="cursor-pointer rounded-full h-14 w-14" />
        </inertia-link>
        <div class="ml-2">
            <inertia-link :href="route('user.show', {id:this.user.id})" class="text-lg font-extrabold ml-1 w-full">
                {{this.user.name}}
            </inertia-link>
            <div class="w-full text-xs"><strong>Email : </strong><a :href="'mailto:'+this.user.name">{{this.user.email}}</a></div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            user: Object,
        }
    }

</script>
