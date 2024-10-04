import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import { createVuetify } from 'vuetify';
import 'vuetify/styles'; // VuetifyのCSSをインポート
import '@mdi/font/css/materialdesignicons.css'; // Material Design Icons
import * as components from 'vuetify/components';
import * as directives from 'vuetify/directives';

// Vuetifyのインスタンス作成
const vuetify = createVuetify({
    components,
    directives,
});

// Vueアプリケーションの作成とマウント
createApp(App)
    .use(router)
    .use(vuetify) // Vuetifyを追加
    .mount('#app');
