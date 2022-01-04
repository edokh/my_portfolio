<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- <router-link class="navbar-brand" to="/"></router-link> -->
    <b class="text-lg cursor-pointer ml-2" @click="goHome">EDO</b>
    <button
      class="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#navbarNav"
      aria-controls="navbarNav"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <router-link class="nav-link" :class="about" to="/about"
            >About</router-link
          >
        </li>
        <li class="nav-item">
          <router-link class="nav-link" :class="resume" to="/resume"
            >Resume</router-link
          >
        </li>
        <li class="nav-item">
          <router-link class="nav-link" :class="portfolio" to="/portfolio"
            >Portfolio</router-link
          >
        </li>
        <li class="nav-item">
          <router-link class="nav-link" :class="contact" to="/contact"
            >Contact</router-link
          >
        </li>
        <li class="nav-item">
          <router-link class="nav-link" :class="contact" to="/test"
            >Test</router-link
          >
        </li>
      </ul>
    </div>
  </nav>
</template>

<script>
import router from "../../router";
export default {
  setup() {
    function goHome() {
      router.push("/");
    }
    return { goHome };
  },
};
</script>

<style>
/* .nav-link:hover {
  color: #34b7a7 !important;
}
.nav-link:focus {
  color: #34b7a7 !important;
} */

#app {
  background: white;
}
body {
  font-family: "Open Sans", sans-serif;
  color: #444444;
}

router-link:hover {
  color: #51cdbe;
  text-decoration: none;
}
.router-link-active {
  color: #51cdbe !important;
  border-bottom: 3px solid #51cdbe !important;
  font-weight: bold !important;
  padding-bottom: 2px !important;
}

h1,
h2,
h3,
h4,
h5,
h6 {
  font-family: "Raleway", sans-serif;
}
#main {
  margin-top: 50px;
}
@media (max-width: 992px) {
  #main {
    margin-top: 30px;
  }
}
/*--------------------------------------------------------------
# Header Social Links
--------------------------------------------------------------*/
.header-social-links {
  padding-right: 15px;
}
.header-social-links a {
  color: #6f6f6f;
  padding-left: 6px;
  display: inline-block;
  line-height: 0px;
  transition: 0.3s;
  font-size: 16px;
}
.header-social-links a:hover {
  color: #34b7a7;
}

.about .content h3 {
  font-weight: 700;
  font-size: 26px;
  color: #555555;
}

element.style {
}
b,
strong {
  font-weight: bolder;
}

section {
  padding: 60px 0;
}

.section-bg {
  background-color: #e7f8f6;
}

.section-title {
  text-align: center;
  padding-bottom: 30px;
}
.section-title h2 {
  font-size: 32px;
  font-weight: bold;
  text-transform: uppercase;
  margin-bottom: 20px;
  padding-bottom: 20px;
  position: relative;
}
.section-title h2::after {
  content: "";
  position: absolute;
  display: block;
  width: 50px;
  height: 3px;
  background: #34b7a7;
  bottom: 0;
  left: calc(50% - 25px);
}
.section-title p {
  margin-bottom: 0;
}
</style>