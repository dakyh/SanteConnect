import { createApp } from 'vue';
import ExampleComponent from './components/ExampleComponent.vue';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap';
import 'jquery';

const app = createApp({});
app.component('example-component', ExampleComponent);
app.mount('#app');
