
<style>
	.roundBox{
		border-width:2px;
		border-radius: 24px;
		border-style: solid;
		border-color: white;
		padding: 20px;
		text-align:center;
		margin:auto;

	}

	td{
		width: 33%;
	}

	.arcadeTable{
		left: 1%;
		width: 100%;
		font-family: arcade;
		font-size: 2em;

	}

	#id-<? echo $_SESSION['racer_id']; ?>{
			background-color: #34347d;

	}
</style>


<h1 style="font-family:arcade">RANKINGS</h1>

<div class="roundBox">

	<table class="arcadeTable">

			<? foreach($records as $i=>$rec) : ?>

				<tr id="id-<? echo $rec['id']; ?>">
					<td><? echo $nf->format($i+1); ?></td>
					<td><? echo $rec['initials']; ?></td>
					<td><? echo gmdate("H:i:s", $rec['duration']); ?></td>
				</tr>

			<? endforeach; ?>


	</table>



</div>
<br/>

<div class="center">
	<a href="#" class="btn btn-dark">View All Records</a>
</div>

<div class="vspace"></div>
