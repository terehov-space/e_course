<template>
    <div>
        <v-btn @click="query('casee')">CASE</v-btn>
        <v-btn @click="query('cor')">Кореляция</v-btn>
        <v-btn @click="query('uncor')">Не Кореляция</v-btn>
        <v-btn @click="query('select')">Не Кореляция SELECT</v-btn>
        <v-btn @click="query('from')">Не Кореляция FROM</v-btn>
        <v-btn @click="query('having')">HAVING</v-btn>
        <v-btn @click="query('any')">ANY/SOME/ALL</v-btn>
        <v-data-table
            v-if="items.length > 0"
            :headers="headers"
            :items="items"
            class="elevation-1"
        ></v-data-table>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: 'Queries',
    data: () => ({
        items: [],
        headers: [],
    }),
    methods: {
        async query(type) {
            const { data } = await axios.get(`/query/${type}`);
            this.items = data.items;
            this.headers = data.headers;
        }
    }
};
</script>

<style scoped>

</style>
