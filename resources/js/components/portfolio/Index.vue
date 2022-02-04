<template>
  <navbar />

  <header
    style="
      background: url(images/home-bg.jpg) top right;
      background-repeat: no-repeat;
      background-size: cover;
    "
    id="up"
    class="bg-fixed bg-no-repeat bg-center bg-cover h-screen relative"
  >
    <!-- Overlay Background + Center Control -->
    <div
      class="h-screen bg-opacity-25 bg-black flex items-center justify-center"
      style="background: rgba(0, 0, 0, 0.5)"
    >
      <div
        class="container d-flex flex-column align-items-center py-80"
        data-aos="zoom-in"
        data-aos-delay="100"
      >
        <h1
          class="text-info"
          style="
            color: #77b6ea;
            text-shadow: 2px 1px 15px #8d8989;
            font-size: 48px;
            font-weight: 700;
            line-height: 56px;
          "
        >
          Edo Khudeeda
        </h1>
        <h2 style="color: #eef5db; text-shadow: 2px 1px 15px #000000">
          I'm a professional software developer from Erbil
        </h2>
        <router-link class="nav-link btn btn-info" :class="about" to="/about"
          >About Me</router-link
        >
      </div>
    </div>
  </header>
</template>

<script>
import navbar from "../portfolio/Navbar";

export default {
  components: {
    navbar,
  },
  setup() {},
};
</script>

<style>
header {
  /* background: url("https://images.pexels.com/photos/57690/pexels-photo-57690.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"); */
}
</style>