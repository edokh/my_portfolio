<template>
  <nav class="navbar navbar-expand-lg bg-gray-500">
    <!-- <b class="text-lg cursor-pointer ml-2" @click="goHome">EDO</b> -->
    <img
      alt="avatar"
      class="w-16 cursor-pointer"
      @click="goHome"
      src="images/logo.png"
    />
    <button
      class="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#navbarNav"
      aria-controls="navbarNav"
      aria-expanded="false"
      aria-label="Toggle navigation"
      @click="showNavbar"
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
    function showNavbar() {
      if (document.getElementById("navbarNav").style.display == "none")
        document.getElementById("navbarNav").style.display = "block";
      else document.getElementById("navbarNav").style.display = "none";
    }
    return { goHome, showNavbar };
  },
};
</script>

<style>
nav {
  position: absolute;
  z-index: 2;
  width: 100%;
  background-color: #200116;
  color: #eef5db;
}
.nav-link {
  color: #eef5db !important;
}

#app {
  background: #eef5db;
}
body {
  font-family: "Open Sans", sans-serif;
  color: #444444;
  background-color: #eef5db !important;
}

router-link:hover {
  color: #77b6ea;
  text-decoration: none;
}
.router-link-active {
  color: #77b6ea !important;
  border-bottom: 3px solid #77b6ea !important;
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

.about .content h3 {
  font-weight: 700;
  font-size: 26px;
  color: #555555;
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
  background: #77b6ea;
  bottom: 0;
  left: calc(50% - 25px);
}
.section-title p {
  margin-bottom: 0;
}
</style>