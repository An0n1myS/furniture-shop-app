import { createRouter, createWebHistory } from 'vue-router';
import Home from '../components/Home.vue';  // Импортируйте ваши компоненты
import About from '../components/About.vue';  // Пример компонента для маршрута

const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home,
    },
    {
        path: '/about',
        name: 'About',
        component: About,
    },
    // Добавьте другие маршруты здесь
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
