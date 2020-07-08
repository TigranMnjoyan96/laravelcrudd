import Vue from 'vue'
import App from './components/App'
import router from './routes/index'


const app = new Vue({
    el: '#app',
    router,
    render: h => h(App)
});
