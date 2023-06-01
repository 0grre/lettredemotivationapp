<template>
    <input
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
        type="text"
        id="search"
        name="appellation"
        placeholder="tu peux chercher un métier par mots clefs"
        v-model="searchTerm"
        autofocus
        required>
    <ul v-if="searchTerm !== selectedAppellation" class="w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        <li v-for="appellation in searchAppellations" class="block w-full px-4 py-2 border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white"
                :key="appellation.libelle"
                @click="selectAppellation(appellation.libelle)">
            {{ appellation.libelle }}
        </li>
    </ul>
</template>

<script>
import {ref, computed} from "vue";
import { onMounted } from 'vue'
import { initFlowbite } from 'flowbite'

// initialize components based on data attribute selectors
onMounted(() => {
    initFlowbite();
})
export default {
    props: ["appellations"],
    setup(props) {
        let searchTerm = ref('')
        let selectedAppellation = ref('')

        const searchAppellations = computed(() => {
            if (searchTerm.value === '') {
                return []
            }

            let matches = 0

            return props.appellations.filter(appellation => {
                if (
                    appellation.libelle.toLowerCase().includes(searchTerm.value.toLowerCase())
                    && matches < 20
                ) {
                    matches++
                    return appellation
                }
            })
        });
        const selectAppellation = (appellation) => {
            selectedAppellation.value = appellation
            searchTerm.value = appellation
        }

        return {
            searchTerm,
            searchAppellations,
            selectAppellation,
            selectedAppellation
        }
    },
};
</script>

