import Vue from 'vue'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.css'
import '@mdi/font/css/materialdesignicons.css'
import ru from 'vuetify/src/locale/ru.ts'

Vue.use(Vuetify)

const opts = {
    icons: {
        iconfont: 'mdi',
    },
    lang: {
        locales: {
            ru,
        },
        current: 'ru'
    }
}

export default new Vuetify(opts)
