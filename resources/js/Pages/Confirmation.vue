<script setup>

const props = defineProps({ message: String })

</script>


<template>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="container bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight center">
                {{ props.message }}
            </h2>
        </div>
    </div>
</template>

