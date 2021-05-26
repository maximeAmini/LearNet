<template>
    <div class="p-4 border-t border-gray-600">
        <a href="" class="hover:text-green-800">{{this.episode.title}}</a>
    </div>
</template>

<script>
    export default {
        props: {
            'episode': Object
        }
    }

</script>
