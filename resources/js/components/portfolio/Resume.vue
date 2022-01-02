<template>
  <navbar />
  <section id="resume" class="resume">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2 >RESUME</h2>
          <p >Enjoy the journey not the destination.</p>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <h3 class="resume-title">Summary</h3>
            <div class="resume-item pb-0">
              <h4>Edo Khudeeda</h4>
              <p><em>Innovative and deadline-driven Software Developer with 2 years of experience designing and
                  developing user-centered
                  digital.</em></p>
              <p>
              <ul>
                <li>Newroz, Erbil</li>
                <li>+964 780-060-7869</li>
                <li>eido.khudyda@gmail.com</li>
              </ul>
              </p>
            </div>

            <h3 class="resume-title">Education</h3>
            <div class="resume-item">
              <h4>Bachelor's in Computer Science</h4>
              <h5>2016 - 2020</h5>
              <p><em>Department of Science, University of Duhok</em></p>
              <p>I have been ranked as 3<sup>th</sup> on my graduation batch</p>
            </div>
            <h3 class="resume-title">Volunteering</h3>
            <div class="resume-item">
              <h4>Computer Trainer</h4>
              <h5>June 2019-October 2019</h5>
              <p><em>Rawanga Org., Zakho</em></p>
              <p>Teaching students to be able to:</p>
              <li> How software and hardware works.</li>
              <li> Using office programs.</li>
              <li> Baisic typing skills.</li>

            </div>
          </div>
          <div class="col-lg-6">
            <h3 class="resume-title">Professional Experience</h3>
            <div class="resume-item">
              <h4>Web Developer</h4>
              <h5>Aug. 2021 – Present</h5>
              <p><em>Tourexpect Co., Brayati, Erbil </em></p>
              <p>
              <ul>
                <li>Working as Full time developer on Tour web applications.</li>
                <li>Working on Wordpress for developing the app. </li>
                <li>Working on PHP as a backend.</li>
                <li>Working on HTML and CSS as a frontend.</li>
              </ul>
              </p>
            </div>
            <div class="resume-item">
              <h4>Web Developer</h4>
              <h5>April 2021 - Present</h5>
              <p><em>Remote Working</em></p>
              <p>
              <ul>
                <li>Working as part time developer on Marketing POS web applications.</li>
                <li>Working on Laravel as a backend framework.</li>
                <li>Working on Vue.js as a frontend framework</li>
                <li>working on Tailwind CSS as a Designing framework.</li>
                <li>Designing APIs</li>
              </ul>
              </p>
            </div>
            <div class="resume-item">
              <h4>Software Developer</h4>
              <h5>August 2020 - Present</h5>
              <p><em>Freelancer</em></p>
              <p>
              <ul>
                <li>Developed application to become a link between a customer and the taxies to communicate and find
                  the location of each other.</li>
                <li>Developed a music player application for blind persons.
                </li>
                <li>Developed a kid’s application which display some cartoon actors on the camera.</li>
              </ul>
              </p>
            </div>
            <div class="resume-item">
              <h4>Graphic Designer</h4>
              <h5>March 2021 - Jul 2021</h5>
              <p><em>Sinun, Sinjar, Nainawa</em></p>
              <p>
              <ul>
                <li>Designing Banners,Business cards,accounting lists and Logos.</li>
              </ul>
              </p>
            </div>

          </div>
        </div>
        <a id="get-pdf" href="https://docs.google.com/document/d/17EtleDB8kLQemjQPJlm0fIAr5GwX8LQEjtwa-E6nAQU/edit?usp=sharing" target="_blank" class="btn-about ">Get in PDF</a>
      </div>
      
    </section>
</template>

<script>
import navbar from "../portfolio/Navbar";

export default {
  components: {
    navbar,
  },
  setup() {
    function getfile() {
      window.open("my_cv.pdf", "_blank");
    }
    return { getfile };
  },
};
</script>
<style>
#get-pdf {
  background-color: #34b7a7;
  color: white;
  padding: 10px 70px 10px 73px;
  margin-top: 15px;
  border-radius: 15px;
  width: 150px;
  text-decoration: none;
}
.resume .resume-title {
  font-size: 26px;
  font-weight: 400;
  margin-top: 20px;
  margin-bottom: 20px;
  color: #222222;
}
.resume .resume-item {
  padding: 0 0 20px 20px;
  margin-top: -2px;
  border-left: 2px solid #34b7a7;
  position: relative;
}
.resume .resume-item h4 {
  line-height: 18px;
  font-size: 18px;
  font-weight: 600;
  font-family: "Poppins", sans-serif;
  color: #1d685f;
  margin-bottom: 10px;
}
.resume .resume-item h5 {
  font-size: 16px;
  background: #effbf9;
  padding: 5px 15px;
  display: inline-block;
  font-weight: 600;
  margin-bottom: 10px;
  color: #34b7a7;
}
.resume .resume-item ul {
  padding-left: 20px;
}
.resume .resume-item ul li {
  padding-bottom: 10px;
}
.resume .resume-item:last-child {
  padding-bottom: 0;
}
.resume .resume-item::before {
  content: "";
  position: absolute;
  width: 16px;
  height: 16px;
  border-radius: 50px;
  left: -9px;
  top: 0;
  background: #fff;
  border: 2px solid #34b7a7;
}
</style>

