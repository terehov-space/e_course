<template>
    <v-dialog
        v-model="show"
        @click:outside.prevent="closeModal"
    >
        <v-card class="rounded-lg">
            <v-card-title>
                Управление расписанием
            </v-card-title>

            <v-card-text>
                <v-form
                    ref="form"
                    lazy-validation
                >
                    <v-text-field
                        v-model="model.weekday"
                        label="Название"
                        required
                    />
                    <v-text-field
                        v-model="model.time"
                        label="Код"
                        required
                    />
                    <v-select
                        label="Кафедра"
                        v-model="model.subject_id"
                        item-value="id"
                        item-text="title"
                        :items="subjects"
                        required
                    >

                    </v-select>
                    <v-select
                        label="Кафедра"
                        v-model="model.group_id"
                        item-value="id"
                        item-text="title"
                        :items="groups"
                        required
                    >

                    </v-select>
                </v-form>
            </v-card-text>

            <v-divider/>

            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn
                    v-if="model.id !== -1"
                    color="primary"
                    text
                    @click="deleteModel"
                >
                    Удалить
                </v-btn>
                <v-btn
                    color="primary"
                    text
                    @click="save"
                >
                    Сохранить
                </v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>

<script>
import axios from "axios";

export default {
    name: 'ScheduleModal',
    props: {
        subjects: [],
        groups: [],
    },
    data: () => ({
        show: false,
        model: {
            id: -1,
            weekday: '',
            time: '',
            group_id: '',
            subject_id: '',
        },
    }),
    methods: {
        openModal(data) {
            if (data.id) {
                this.model = data;
            }
            this.show = true;
        },
        closeModal() {
            this.show = false;
        },
        save() {
            if (this.model.id === -1) {
                axios.post('/schedules', this.model);
            } else {
                axios.put(`/schedules/${this.model.id}`, this.model);
            }

            window.location.href = '/schedules';
        },
        deleteModel() {
            axios.delete(`/schedules/${this.model.id}`, this.model);

            window.location.href = '/schedules';
        },
    },
};
</script>

<style scoped>

</style>
