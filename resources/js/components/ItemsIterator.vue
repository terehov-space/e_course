<template>
    <div>
        <v-btn @click="openModal">Добавить</v-btn>
        <v-data-table
            :headers="data.headers"
            :items="data.items"
            class="elevation-1"
            @click:row="openModal"
        ></v-data-table>
        <teacher-modal v-if="data.cafedras" :options="data.cafedras" ref="teacher"/>
        <group-modal v-if="data.cafedras" :options="data.cafedras" ref="group"/>
        <subject-modal v-if="data.teachers" :options="data.teachers" ref="subject"/>
        <cafedra-modal ref="cafedra"/>
        <schedule-modal v-if="data.groups && data.subjects" :subjects="data.subjects" :groups="data.groups" ref="schedule"/>
    </div>
</template>

<script>
import TeacherModal from './modals/TeacherModal';
import GroupModal from './modals/GroupModal';
import SubjectModal from './modals/SubjectModal';
import CafedraModal from './modals/CafedraModal';
import ScheduleModal from "./modals/ScheduleModal";

export default {
    name: 'ItemsIterator',
    components: {
        ScheduleModal,
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
