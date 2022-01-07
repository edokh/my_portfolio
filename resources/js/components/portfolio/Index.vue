<template>
  <navbar />

  <div
    id="hero"
    class="d-flex align-items-center py"
    style="
      background: url(http://127.0.0.1:8000/images/home_bg.jpg) top right;
      background-repeat: no-repeat;
      background-size: cover;
    "
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

