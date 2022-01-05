<template>
  <navbar />

  <div
    id="hero"
    class="d-flex align-items-center py"
    style="
      background: url(https://scontent.febl5-2.fna.fbcdn.net/v/t39.30808-6/271206106_3181470478741400_5607593860324761869_n.jpg?_nc_cat=107&ccb=1-5&_nc_sid=e3f864&_nc_eui2=AeEyvl6T6O_pnUv3ldqMTgfck3hgqHwIKJ-TeGCofAgonwfpKnOUb5devnw4U36-nQ8ytCnvTPg8q3mtcWgX4S87&_nc_ohc=pawiRC1e-KkAX8i5S-f&_nc_ht=scontent.febl5-2.fna&oh=00_AT92OWUgkbAOGrfD3oq2gb0qp8XKVjcGE5zeG6JD3fx9wQ&oe=61D82A51)
        top right;
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
          color: #8181dd;
          text-shadow: 2px 1px 15px #8d8989;
          font-size: 48px;
          font-weight: 700;
          line-height: 56px;
        "
      >
        Edo Khudeeda
      </h1>
      <h2 style="color: white; text-shadow: 2px 1px 15px #000000">
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

