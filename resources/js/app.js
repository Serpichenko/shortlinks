window.axios = require("axios");
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
window.axios.defaults.baseURL = "http://localhost:8000/api";

window.Vue = require("vue").default;

Vue.component(
    "app-component",
    require("./components/AppComponent.vue").default
);

const app = new Vue({
    el: "#app"
});
