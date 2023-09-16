<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Article</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="create">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" v-model="article.title">
                                    <p v-if="errors.title" class="text-danger text-xs">{{ errors.title[0] }}</p>
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" class="form-control" v-model="article.description">
                                    <p v-if="errors.description" class="text-danger text-xs">{{ errors.description[0] }}</p>
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" class="form-control" @change="handleFileChange">
                                    <p v-if="errors.image" class="text-danger text-xs">{{ errors.image[0] }}</p>
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "addArticle",
    data() {
        return {
            article: {
                title: "",
                description: "",
                image: null,
            },
            errors: {}
        }
    },
    methods: {
        async create() {
            const formData = new FormData();
            formData.append("title", this.article.title);
            formData.append("description", this.article.description);
            formData.append("image", this.article.image);

            await this.axios
                .post("http://127.0.0.1:8000/api/article", formData)
                .then((response) => {
                    // Reset the form after successful submission
                    this.article.title = "";
                    this.article.description = "";
                    this.article.image = null;

                    this.$router.push({ name: "article" });
                })
                .catch((error) => {
                    this.errors = error.response.data.errors;
                });
        },
        handleFileChange(event) {
            this.article.image = event.target.files[0];
        },
    }
}
</script>