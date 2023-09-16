import Vue from 'vue'
import Router from 'vue-router'
import Welcome from '@/components/Welcome'
import articleVue from '@/components/Articles'
import addArticle from '@/components/AddArticle'
import updateArticle from '@/components/EditeArticle'

import axios from 'axios';
Vue.use(axios);
Vue.use(Router);

export default new Router({
  routes: [
    {
      path: '/',
      name: 'welcome',
      component: Welcome
    },
    {
      path: '/article',
      name: 'article',
      component: articleVue
    },
    {
      path: '/addArticle',
      name: 'addArticle',
      component: addArticle
    },
    {
      path: '/updateArticle',
      name: 'updateArticle',
      component: updateArticle
    }
  ]
})
