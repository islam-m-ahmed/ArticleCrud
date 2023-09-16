<template>
    <div class="row">
        <div class="col-12 mb-2 text-end">
            <router-link :to='{ name: "addArticle" }' class="btn btn-primary">Create</router-link>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>article</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody v-if="articles.length > 0">
                                <tr v-for="(article, key) in articles" :key="key">
                                    <td>{{ article.id }}</td>
                                    <td>{{ article.title }}</td>
                                    <td>{{ article.description }}</td>
                                    <td> <img :src="getImageUrl(article.image)" alt="img" class="gallery-thumb-img"
                                            style="height: 300px; width: 100%" />
                                    <td>
                                        <router-link :to='{ name: "updateArticle", params: { id: article.id } }'
                                            class="btn btn-success">Edit</router-link>
                                        <button type="button" @click="deleteArticle(article.id)"
                                            class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td colspan="4" align="center">No articles Found.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</template>
<script>
import Vue from 'vue';
import axios from 'axios';
import VueAxios from 'vue-axios';

Vue.use(VueAxios, axios);

export default {
    name: "article",
    data() {
        return {
            articles: []
        }
    },
    mounted() {
        this.getArticles()
    },
    methods: {
        async getArticles() {
            try {
                const response = await this.axios.get('http://127.0.0.1:8000/api/article');
                this.articles = response.data.data;
            } catch (error) {
                console.error(error);
                this.articles = [];
            }
        },

        getImageUrl(imageFileName) {            
            return `/images/article/${imageFileName}`;
        },

        async deleteArticle(id) {
            if (confirm("Are you sure to delete this article?")) {
                try {
                    await this.axios.delete('http://127.0.0.1:8000/api/article/' + id);
                    this.getArticles();
                } catch (error) {
                    console.error(error);
                }
            }
        }
    }
}
</script>

<!-- <script> 

import Vue from 'vue';
import axios from 'axios';
import VueAxios from 'vue-axios';

Vue.use(VueAxios, axios);

export default {
    name: "article",
    data() {
        return {
            articles: []
        }
    },
    mounted() {
        this.getArticles()
    },
    methods: {
        // async getArticles(){
        //     await this.axios.get('/api/article').then(response=>{
        //         this.articles = response.data
        //     }).catch(error=>{
        //         console.log(error)
        //         this.articles = []
        //     })
        getArticles() {
            var page = "http://127.0.0.1:8000/api/article";
            axios.get(page)
                .then(
                    ({ data }) => {
                        console.log(data.data);
                        this.articles = data.data;
                    }
                )
        },

        // deleteArticle(id) {
        //     if (confirm("Are you sure to delete this article ?")) {
        //         this.axios.post('http://127.0.0.1:800/api/article/delete/' + id).then(response => {
        //             this.getArticles()
        //         }).catch(error => {
        //             console.log(error)
        //         })
        //     }
        // }
        deleteArticle(id) {
            if (confirm("Are you sure to delete this article?")) {
                this.axios
                    .delete('http://127.0.0.1:8000/api/article/' + id)
                    .then(response => {
                        this.getArticles();
                    })
                    .catch(error => {
                        console.log(error);
                    });
            }
        }

    }
}

</script> -->