<template>
    <div class="p-4 flex items-center justify-center border-t border-gray-600">
        <inertia-link :href="route('episodes.show',{'cour':this.episode.cours_id, 'episode':this.index})" class="hover:text-green-800 transition duration-500 ease-in-out">
            {{this.episode.title}}
        </inertia-link>
        <Set-btn v-if="this.allowed" :idC="this.episode.cours_id" :idE="this.episode.id"/>
        <Done-btn v-else :epId="this.episode.id" :watched="this.watched"/>
    </div>
</template>

<script>
    import DoneBtn from '@/Components/DoneBtn'
    import SetBtn from '@/Components/SetBtn'
    export default {
        components: {
            DoneBtn,
            SetBtn
        },
        props: {
            'episode': Object,
            'index': Number,
            'idUser': Number,
            'watched': Object,
            'allowed': Boolean
        }
    }
</script>
