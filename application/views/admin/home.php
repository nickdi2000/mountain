
<div class="container" id="app">

<header>
	<h3>Race Setup</h3>
</header>

<div class="alert alert-warning">
	Set your coordinates.  You can either enter them in manually by obtaining the lat and long yourself (<a href="https://support.google.com/maps/answer/18539?co=GENIE.Platform%3DDesktop&hl=en" target="_BLANK">help</a>)
	Or be a little more adventurous and use your device's location.
</div>

<form action="/admin/save" method="post">
	<div class="form-group alert alert-light">
		Race Name<br/>
		<input type="text" name="name" v-model="admin.name" class="form-control" required>
	</div>

  <div class="form-group alert alert-light" id="starting">
  	<h4>Starting Point</h4>
    <input type="text" name="starting_lat" v-model="admin.starting_lat" class="form-control" id="starting_lat" placeholder="Latitude">
    <input type="text" name="starting_lon" v-model="admin.starting_lon"  class="form-control" id="starting_lon" placeholder="Longitude"><br/>
 	<a href="javascript:void(0)" onclick="get_location('starting')" class="btn btn-secondary btnstarting"><i class="fas fa-location-arrow"></i> Use Current Location</a>

  </div>

  <div class="alert alert-danger" v-if="error"></div>

   <div class="form-group alert alert-light" id="ending">
  	<h4>Ending Point</h4>
    <input type="text" name="ending_lat" v-model="admin.ending_lat"  class="form-control" id="ending_lat" placeholder="Latitude">
    <input type="text" name="ending_lon" v-model="admin.ending_lon" class="form-control" id="ending_lon" placeholder="Longitude"><br/>
	<a href="javascript:void(0)" onclick="get_location('ending')" class="btn btn-secondary btnending"><i class="fas fa-location-arrow"></i> Use Current Location</a>

  </div>
	<br/>
	<hr>
  <button type="submit" class="btn btn-success">Save</button>
  <a href="/admin" class="btn btn-secondary">Cancel</a>
</form>

</div>


<script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>


<script>
var app = new Vue({
  el: '#app',
  data:
	{
    admin: <? echo json_encode($admin_data); ?>,
		test: 'test',
		error: null
  }
})


function get_location(type){
	loading(type);



	let geolocation = navigator.geolocation;
		if (geolocation) {
		  geolocation.getCurrentPosition(function(position){
		  	console.log("lat: " + position.coords.latitude);
		  	console.log("long: " + position.coords.longitude);

		  	$('#' + type + '_lat').val(position.coords.latitude);
		  	$('#' + type + '_lon').val(position.coords.longitude);
		  	stopLoading(type);

		  	$('.spinner').hide();
		  	//var distance = getDistance(position.coords.latitude, position.coords.longitude, clock.lat, clock.lon);

		  }, function(){}, {maximumAge:10000, timeout:5000, enableHighAccuracy: true});
		}
	}

	function loading(type){
		$('.btn' + type).html($('#spinner').html());
	}

	function stopLoading(type){
		var def = "<i class='fas fa-location-arrow'></i> Get Current Location";
		$('.btn' + type).html(def);
	}
</script>

<script type="text/template" id="spinner">
<div class="spinner-border text-primary spinner" role="status">
  <span class="sr-only">Loading...</span>
</div>
</script>
