require("./bootstrap");

import "@babel/polyfill";
import Vue from "vue";
import VueI18n from "vue-i18n";
import VueRouter from "vue-router";
import ElementUI from "element-ui";
import VueEvents from "vue-events";
import enLocale from "element-ui/lib/locale/lang/en";
import viLocale from "element-ui/lib/locale/lang/vi";
import MediaRoutes from "../../Modules/Media/Assets/js/MediaRoutes";
import UserRoutes from "../../Modules/User/Assets/js/UserRoutes";
import CategoryRoutes from "../../Modules/Product/Assets/js/categories/CategoryRoutes";
import ProductRoutes from "../../Modules/Product/Assets/js/products/ProductRoutes";
import ContactRoutes from "../../Modules/Contact/Assets/js/contacts/ContactRoutes";

const { currentLocale, adminPrefix } = window.AsgardCMS;

const elementLocales = {
  en: enLocale,
  vi: viLocale
};

const elementLocale = elementLocales[currentLocale] || enLocale;

Vue.use(ElementUI, { locale: elementLocale });
Vue.use(VueI18n);
Vue.use(VueRouter);
Vue.use(require("vue-shortkey"), { prevent: ["input", "textarea"] });

Vue.use(VueEvents);
require("./mixins");

Vue.component("ckeditor", require("../../Modules/Core/Assets/js/components/CkEditor.vue").default);

function makeBaseUrl() {
  if (window.AsgardCMS.hideDefaultLocaleInURL === "1") {
    return adminPrefix;
  }
  return `${currentLocale}/${adminPrefix}`;
}

const router = new VueRouter({
  mode: "history",
  base: makeBaseUrl(),
  routes: [
    ...MediaRoutes, ...UserRoutes, ...ProductRoutes, ...CategoryRoutes, ...ContactRoutes]
}),
  messages = {
    [currentLocale]: window.AsgardCMS.translations,
  },
  i18n = new VueI18n({
    locale: currentLocale,
    messages,
  }),
  app = new Vue({
    el: "#app",
    router,
    i18n,
  });

window.axios.interceptors.response.use(null, (error) => {
  console.log(error);
  if (error.response === undefined) {
    console.log(error);
    return;
  }
  if (error.response.status === 403) {
    app.$notify.error({
      title: app.$t("core.unauthorized"),
      message: app.$t("core.unauthorized-access"),
    });
    window.location = route("dashboard.index");
  }
  if (error.response.status === 401) {
    app.$notify.error({
      title: app.$t("core.unauthenticated"),
      message: app.$t("core.unauthenticated-message"),
    });
    window.location = route("login");
  }
  return Promise.reject(error);
});
