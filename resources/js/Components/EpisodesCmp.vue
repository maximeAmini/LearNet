<template>
    <div class="p-4 border-t border-gray-600">
        <inertia-link :href="route('episode.show',{'id':this.episode.cours_id})" class="hover:text-green-800">
            {{this.episode.title}}
        </inertia-link>
    </div>
</template>

<script>
    export default {
        props: {
            'episode': Object
        }
    }

</script>
