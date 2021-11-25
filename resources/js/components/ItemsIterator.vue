<template>
    <div>
        <v-btn @click="openModal">Добавить</v-btn>
        <v-data-table
            :headers="data.headers"
            :items="data.items"
            class="elevation-1"
            @click:row="openModal"
        ></v-data-table>
        <teacher-modal ref="teacher"/>
        <group-modal ref="group"/>
        <subject-modal ref="subject"/>
        <cafedra-modal ref="cafedra"/>
    </div>
</template>

<script>
import TeacherModal from './modals/TeacherModal';
import GroupModal from './modals/GroupModal';
import SubjectModal from './modals/SubjectModal';
import CafedraModal from './modals/CafedraModal';

export default {
    name: 'ItemsIterator',
    components: {
        TeacherModal,
        GroupModal,
        SubjectModal,
        CafedraModal,
    },
    props: {
        data: {},
    },
    methods: {
        openModal(item) {
            this.$refs[this.data.type].openModal(item);
        }
    }
};
</script>

<style scoped>

</style>
