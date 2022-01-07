<template>
  <navbar />
  <section id="about" class="about">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>About</h2>
        <p>
          As a full-time Software developer, I will dedicate all my hours to
          you. I'm so young and creative, and willing to solve any problem as
          quickly and efficiently as possible. Communication is our best
          concerning part in my business, because of the most importance to
          analyze full requests from clients and satisfy them absolutely. So
          far, We have developed a variant range of websites and mobile apps
          fulfilled with all requests of clients.
        </p>
      </div>

      <div class="row">
        <div class="col-lg-4">
          <img
            src="http://127.0.0.1:8000/images/about.jpg"
            class="img-fluid"
            alt=""
          />
        </div>
        <div class="col-lg-8 pt-4 pt-lg-0 content">
          <h3>Software Developer</h3>
          <div class="row">
            <div class="col-lg-6">
              <ul class="pl-0">
                <li class="mb-2">
                  <i class="bi bi-rounded-right"></i>
                  <strong>Birthday:</strong> 5 July 1996
                </li>
                <li class="mb-2">
                  <i class="bi bi-rounded-right"></i>
                  <strong>Website:</strong> www.webedo.com
                </li>
                <li class="mb-2">
                  <i class="bi bi-rounded-right"></i>
                  <strong>Phone:</strong> +964 780 060 7869
                </li>
                <li class="mb-2">
                  <i class="bi bi-rounded-right"></i>
                  <strong>City:</strong> Erbil, Iraq
                </li>
              </ul>
            </div>
            <div class="col-lg-6">
              <ul class="ml-0">
                <li class="mb-2">
                  <i class="bi bi-rounded-right"></i>
                  <strong>Degree:</strong> Bachelor's in Computer Science
                </li>
                <li class="mb-2">
                  <i class="bi bi-rounded-right"></i>
                  <strong>E-mail:</strong> eido.khudyda@gmail.com
                </li>
                <li class="mb-2">
                  <i class="bi bi-rounded-right"></i>
                  <strong>Freelance:</strong> Available
                </li>
              </ul>
            </div>
          </div>
          <!-- <p>
              Officiis eligendi itaque labore et dolorum mollitia officiis optio vero. Quisquam sunt adipisci omnis et
              ut. Nulla accusantium dolor incidunt officia tempore. Et eius omnis.
              Cupiditate ut dicta maxime officiis quidem quia. Sed et consectetur qui quia repellendus itaque neque.
              Aliquid amet quidem ut quaerat cupiditate. Ab et eum qui repellendus omnis culpa magni laudantium dolores.
            </p> -->
        </div>
      </div>
    </div>
  </section>
  <!-- End About Section -->

  <!-- ======= Skills Section ======= -->
  <section id="skills" class="skills">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>Skills</h2>
      </div>

      <div class="row skills-content">
        <div class="col-lg-6">
          <div class="progress">
            <div
              class="progress-bar"
              role="progressbar"
              style="width: 25%"
              aria-valuenow="25"
              aria-valuemin="0"
              aria-valuemax="100"
            >
              25%
            </div>
          </div>
          <div class="progress">
            <div
              class="progress-bar"
              role="progressbar"
              style="width: 90%"
              aria-valuenow="25"
              aria-valuemin="0"
              aria-valuemax="100"
            >
              HTML 90%
            </div>
          </div>

          <div class="progress">
            <div
              class="progress-bar"
              role="progressbar"
              style="width: 90%"
              aria-valuenow="25"
              aria-valuemin="0"
              aria-valuemax="100"
            >
              CSS 90%
            </div>
          </div>

          <div class="progress">
            <div
              class="progress-bar"
              role="progressbar"
              style="width: 75%"
              aria-valuenow="25"
              aria-valuemin="0"
              aria-valuemax="100"
            >
              Java Script 75%
            </div>
          </div>

          <div class="progress">
            <div
              class="progress-bar"
              role="progressbar"
              style="width: 75%"
              aria-valuenow="25"
              aria-valuemin="0"
              aria-valuemax="100"
            >
              VueJs 75%
            </div>
          </div>
          <div class="progress">
            <div
              class="progress-bar"
              role="progressbar"
              style="width: 60%"
              aria-valuenow="25"
              aria-valuemin="0"
              aria-valuemax="100"
            >
              Jquery 60%
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="progress">
            <div
              class="progress-bar"
              role="progressbar"
              style="width: 70%"
              aria-valuenow="25"
              aria-valuemin="0"
              aria-valuemax="100"
            >
              PHP 70%
            </div>
          </div>
          <div class="progress">
            <div
              class="progress-bar"
              role="progressbar"
              style="width: 70%"
              aria-valuenow="25"
              aria-valuemin="0"
              aria-valuemax="100"
            >
              Laravel 70%
            </div>
          </div>

          <div class="progress">
            <div
              class="progress-bar"
              role="progressbar"
              style="width: 90%"
              aria-valuenow="25"
              aria-valuemin="0"
              aria-valuemax="100"
            >
              WordPress/CMS 90%
            </div>
          </div>

          <div class="progress">
            <div
              class="progress-bar"
              role="progressbar"
              style="width: 55%"
              aria-valuenow="25"
              aria-valuemin="0"
              aria-valuemax="100"
            >
              Photoshop 55%
            </div>
          </div>
          <div class="progress">
            <div
              class="progress-bar"
              role="progressbar"
              style="width: 55%"
              aria-valuenow="25"
              aria-valuemin="0"
              aria-valuemax="100"
            >
              Figma 55%
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Skills Section -->
</template>

<script>
// import useProjects from "../../composables/projects";
// import { onMounted } from "vue";
import navbar from "../portfolio/Navbar";

export default {
  components: {
    navbar,
  },
};
</script>
<style>
.progress {
  margin-top: 12px !important;
}
</style>

