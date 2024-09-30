import { createRouter, createWebHistory } from 'vue-router';
import ExampleComponent from '../components/ExampleComponent.vue';
import InputDetail from '../components/InputDetail.vue';

const routes = [
    { path: '/app', component: ExampleComponent },
    { path: '/input-detail', component: InputDetail },  // 新しいルートを追加
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
