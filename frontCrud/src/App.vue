<template>
  <main>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <div class="container-fluid">
              <router-link to="/article" class="navbar-brand" href="#">Articles</router-link>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                      <li class="nav-item" exact-active-class="active">
                          <router-link to="/" class="nav-link">Home</router-link>
                      </li>
                      <li class="nav-item" exact-active-class="active">
                          <router-link to="/article" class=" nav-link">Article</router-link>
                      </li>
                  </ul>
              </div>
          </div>
      </nav>
      <div class="container mt-5">
          <router-view></router-view>
      </div>
  </main>
</template>

<script>
export default {
  name: 'App'
}
</script>

