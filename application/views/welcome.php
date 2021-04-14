<style>
#logo_container {
  display: flex;
  justify-content: center;
	width:100%;
	padding:15px;

}
</style>

<div class="template" id="app">
		<h2 class="animated tdFadeInDown">
			{{title}}
		</h2>

			<div class="subheading animated tdStampIn">
				<i class="fas fa-flag-checkered fa-2x"></i> <br/>
          {{sub_heading}}

				<div id="logo_container">
				</div>

				<div class="button-group">
					<a href="/race/start" class="btn btn-success btn-lg"><i class="fas fa-stopwatch"></i> RACE! </a>
					<br/><br/>
					<a href="/leaderboard" class="btn btn-warning btn-sm"><i class="fas fa-list-ol"></i>  View Leaderboard</a>
				</div>



			</div>
</div>


			<? $this->load->view('brand'); ?>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>

      <script type="template" id="logo">
        <? $this->load->view('animations/mountain'); ?>
      </script>


  <script>
  var app = new Vue({
    el: '#app',
    data: <? echo json_encode($user_data); ?>,

  });

  $('#logo_container').html($('#logo').html());
  </script>
