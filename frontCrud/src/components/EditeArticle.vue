<template>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Update Article</h4>
          </div>
          <div class="card-body">
            <form @submit.prevent="update">
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
                    <img :src="getImageUrl(article.image)" alt="img" class="gallery-thumb-img"
                                            style="height: 300px; width: 100%" />
                  </div>
                </div>
                <div class="col-12 mb-2">
                  <button type="submit" class="btn btn-primary">Update</button>
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
    name: "updateArticle",
    data() {
      return {
        article: {
          title: "",
          description: "",
          image: null, // Initialize image as null
          // _method: "patch",
        },
        errors: {}
      };
    },
    mounted() {
      this.showArticle();
    },
    methods: {
      async showArticle() {
        try {
          const response = await this.axios.get('http://127.0.0.1:8000/api/article/' + this.$route.params.id);
        //   console.log(response.data.data);
          const { title, description, image } = response.data.data; // Retrieve image data from the response
          this.article.title = title;
          this.article.description = description;
          this.article.image = image; // Set the retrieved image data
        } catch (error) {
          console.error(error);
        }
      },
      getImageUrl(imageFileName) {
      // Assuming your images are served from a specific URL (e.g., '/images/articles/')
      return `/images/articles/${imageFileName}`;
    },
      async update() {
        const formData = new FormData();
        formData.append("title", this.article.title);
        formData.append("description", this.article.description);
        formData.append("image", this.article.image);
  
        try {
          await this.axios.post('http://127.0.0.1:8000/api/article/' + this.$route.params.id, formData);
          this.$router.push({ name: "article" });
        } catch (error) {
          this.errors = error.response.data.errors;
        }
      },
      handleFileChange(event) {
        this.article.image = event.target.files[0];
      },
    },
  };
  </script>
  