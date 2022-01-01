<template>
  <navbar />

  <div
    id="hero"
    class="d-flex align-items-center"
    style="
      background: url(https://images.unsplash.com/photo-1552872673-9b7b99711ebb?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80)
        top right;
      height: 57rem;
    "
  >
    <div
      class="container d-flex flex-column align-items-center"
      data-aos="zoom-in"
      data-aos-delay="100"
    >
      <h1 class="text-info">Edo Khudeeda</h1>
      <h2 style="color: white; text-shadow: 2px 1px 15px #000000">
        I'm a professional software developer from Erbil
      </h2>
      <a href="about.html" class="btn btn-info">About Me</a>
    </div>
  </div>

  <!-- </section>
    <section id="hero" class="d-flex align-items-center">
    <div
      class="container d-flex flex-column align-items-center"
      data-aos="zoom-in"
      data-aos-delay="100"
    >
      <h1 style="color: #8181dd; text-shadow: 2px 1px 15px #8d8989">
        Edo Khudeeda
      </h1>
      <h2 style="color: white; text-shadow: 2px 1px 15px #000000">
        I'm a professional software developer from Erbil
      </h2>
      <a href="about.html" class="btn-about">About Me</a>
    </div>
  </section> -->
</template>

<script>
// import useCompanies from "../../composables/companies";
// import { onMounted } from "vue";
import navbar from "../portfolio/Navbar";

export default {
  components: {
    navbar,
  },
  setup() {
    //     const { companies, getCompanies, destroyCompany } = useCompanies();
    //     onMounted(getCompanies);
    //     const deleteCompany = async (id) => {
    //       if (!window.confirm("Are you sure?")) {
    //         return;
    //       }
    //       await destroyCompany(id);
    //       await getCompanies();
    //     };
    // return {
    //   companies,
    //   deleteCompany,
    // };
  },
};
</script>

