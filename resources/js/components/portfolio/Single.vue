<template>
  <div class="single-project bg-white shadow">
    <div class="row align-items-start single-row bg-gray-500 h-100 w-100">
      <div class="col-8">One of three columns</div>
      <!-- <div class="col-4 text-right">One of three columns</div> -->
      <div class="col-4">
        <div class="">
          <h3>Project information</h3>
          <ul>
            <li><strong>Category</strong>: Web Developing</li>
            <li><strong>Client</strong>: Yadgar Company</li>
            <!-- <li><strong>Project date</strong>: 01 March, 2020</li> -->
            <li>
              <strong>Project URL</strong>:
              <a href="http://admin.yadgarsoft.com/"
                >http://admin.yadgarsoft.com/</a
              >
            </li>
          </ul>
        </div>
        <div class="portfolio-description">
          <h2>About the project</h2>
          <p>
            We Developed this multi language website for managing chains of
            markets, stores and it could be for any thing like this.
          </p>
        </div>
      </div>
    </div>
  </div>
</template>



<style>
.single-project {
  width: 80%;
  height: 30rem;
  margin: auto;
}
.single-row {
  margin: auto !important;
}
</style>