<style>
  .code{
    font-size: 2em;
    width: 60%;
    position: relative;
    left: 20%;
  }

  .submit{
    font-size: 2em;
  }
  .middle{
    width: 100%;
    text-align: center;
    margin: auto;
  }
</style>

<div id="app">
		<h1 class="animated tdFadeInDown">
			{{title}}
		</h1>

			<div class="subheading animated tdStampIn">
				<div class="alert alert-danger">
            Hmm...I can't find a profile for '<? echo $subdomain; ?>'.<br/>
            <button class="btn btn-primary" @click="show_form = true">
              Try a new code
            </button>


        </div>

        <div class="middle" v-if="show_form">
          <div class="animated tdFadeInDown">
            <input v-model="code" class="form-control code" placeholder="CODE">
            <p class="text-danger" v-if="error">
              {{error}}
            </p>

            <p class="text-primary" v-if="!error && code">
              {{code}}.timetrials.io
            </p>
            <button class="btn btn-primary submit" @click="go">GO!</button>
          </div>

        </div>

        <div v-else>
          <a href="https://timetrials.io/landing" class="btn btn-dark">Create my own Race Profile</a>
        </div>





			</div>

</div>

			<? $this->load->view('brand'); ?>

      <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>

<script>

var app = new Vue({
  el: '#app',
  data: {
    title: "TimeTrials.io",
    show_form: false,
    code: '',
    error: '',
  },
  methods: {
    go(){
      if(this.code){
        window.location = "https://" + this.code + ".timetrials.io/";
      }else{
        this.error = "Please enter code!";
      }

    }
  }
})

</script>
