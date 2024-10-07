import { createRouter, createWebHistory } from 'vue-router';
import ExampleComponent from '../components/ExampleComponent.vue';
import InputDetail from '../components/InputDetail.vue';
import ShowDetail from '../components/ShowDetail.vue';

const routes = [
    { path: '/', component: ExampleComponent },
    { path: '/input-detail', component: InputDetail },
    { path: '/show-detail', component: ShowDetail },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
