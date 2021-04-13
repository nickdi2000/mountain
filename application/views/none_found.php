<style>

</style>

<div id="app">
		<h1 class="animated tdFadeInDown">
			Mountain Climber
		</h1>

			<div class="subheading animated tdStampIn">
				<div class="alert alert-danger">
            Hmm...I can't find a profile for '<? echo $subdomain; ?>'.<br/>
            <button class="btn btn-primary" @click="show_form = true">
              Try a new code
            </button>


        </div>

        <div>
            <input class="form-control code" placeholder="CODE">
            <br/>
            <button class="btn btn-primary submit" @click="go">GO!</button>
        </div>





			</div>

</div>

			<? $this->load->view('brand'); ?>
<script>

var app = new Vue({
  el: '#app',
  data: {
    show_form: false,
  },
  methods: {
    go(){
      window.location = "https://" + this.code + ".timetrials.io/";
    }
  }
})

</script>
