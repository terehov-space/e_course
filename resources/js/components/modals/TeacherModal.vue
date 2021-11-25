<template>
    <v-dialog
        v-model="show"
        @click:outside.prevent="closeModal"
    >
        <v-card class="rounded-lg">
            <v-card-title>
                Управление учителями
            </v-card-title>

            <v-card-text>
                <v-form
                    ref="form"
                    lazy-validation
                >
                    <v-text-field
                        v-model="model.last_name"
                        label="Фамилия"
                        required
                    />
                    <v-text-field
                        v-model="model.first_name"
                        label="Имя"
                        required
                    />
                    <v-text-field
                        v-model="model.middle_name"
                        label="Отчество"
                        required
                    />

                    <v-text-field
                        v-model="model.email"
                        label="E-mail"
                        required
                    ></v-text-field>

                    <v-text-field
                        v-model="model.phone"
                        label="Телефон"
                        required
                    ></v-text-field>
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
import axios from 'axios';

export default {
    name: 'TeacherModal',
    data: () => ({
        show: false,
        model: {
            id: -1,
            first_name: '',
            middle_name: '',
            last_name: '',
            phone: '',
            email: '',
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
                axios.post('/teachers', this.model);
            } else {
                axios.put(`/teachers/${this.model.id}`, this.model);
            }

            window.location.href = '/teachers';
        },
        deleteModel() {
            axios.delete(`/teachers/${this.model.id}`, this.model);

            window.location.href = '/teachers';
        },
    },
};
</script>

<style scoped>

</style>
