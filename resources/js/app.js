import './bootstrap';
import { createApp } from 'vue';
import router from './router';  // Подключаем маршрутизатор
import App from './components/App.vue';  // Основной компонент

const app = createApp(App);  // Используем основной компонент

app.use(router);  // Подключаем маршрутизатор

app.mount('#app');  // Монтируем приложение в элемент с id="app"
