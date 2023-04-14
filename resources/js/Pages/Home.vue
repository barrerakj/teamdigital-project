<script setup>
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'

defineProps({ errors: Object })

const user = reactive({
  first_name: null,
  last_name: null,
  email: null,
  phone: null,
  accepts_rules: false,
  subscribed: false,
})

function submit() {
  router.post('/register', user)
}
</script>

<template>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="container bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight center">
                Welcome to the Great Sweepstake!
            </h2>

            <form @submit.prevent="submit" class="w-full max-w-sm">
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-first-name">
                            First Name
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input
                            v-model="user.first_name"
                            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-first-name" type="text"
                        >
                    </div>
                    <div class="text-gray-300" v-if="errors.first_name">{{ errors.first_name }}</div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-last-name">
                            Last Name
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input
                            v-model="user.last_name"
                            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-last-name" type="text"
                            >
                    </div>
                    <div class="text-gray-300" v-if="errors.last_name">{{ errors.last_name }}</div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-email">
                            Email
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input
                            v-model="user.email"
                            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-emails" type="email"
                            >
                    </div>
                    <div class="text-gray-300" v-if="errors.email">{{ errors.email }}</div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-phorne">
                            Phone
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input
                            v-model="user.phone"
                            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-phone"
                            >
                    </div>
                    <div class="text-gray-300" v-if="errors.phone">{{ errors.phone }}</div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3"></div>
                    <label class="md:w-2/3 block text-gray-500 font-bold">
                    <input
                        v-model="user.accepts_rules"
                        class="mr-2 leading-tight" type="checkbox"
                        >
                    <span class="text-sm">
                        I accept the rules!
                    </span>
                    </label>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3"></div>
                    <label class="md:w-2/3 block text-gray-500 font-bold">
                    <input
                        v-model="user.subscribed"
                        class="mr-2 leading-tight" type="checkbox"
                    >
                    <span class="text-sm">
                        Send me your newsletter!
                    </span>
                    </label>
                </div>
                <div class="md:flex md:items-center">
                    <div class="md:w-1/3"></div>
                    <div class="md:w-2/3">
                    <button
                        class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit"
                        >
                        Register
                    </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
