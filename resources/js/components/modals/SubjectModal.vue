<template>
    <v-dialog
        v-model="show"
        @click:outside.prevent="closeModal"
    >
        <v-card class="rounded-lg">
            <v-card-title>
                Управление предметами
            </v-card-title>

            <v-card-text>
                <v-form
                    ref="form"
                    lazy-validation
                >
                    <v-text-field
                        v-model="model.title"
                        label="Название"
                        required
                    />

                    <v-select
                        label="Преподаватель"
                        v-model="model.teacher_id"
                        item-value="id"
                        item-text="first_name"
                        :items="options"
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
    name: 'CafedraModal',
    props: {
        options: [],
    },
    data: () => ({
        show: false,
        model: {
            id: -1,
            title: '',
            teacher_id: '',
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
                axios.post('/subjects', this.model);
            } else {
                axios.put(`/subjects/${this.model.id}`, this.model);
            }

            window.location.href = '/subjects';
        },
        deleteModel() {
            axios.delete(`/subjects/${this.model.id}`, this.model);

            window.location.href = '/subjects';
        },
    },
};
</script>

<style scoped>

</style>
