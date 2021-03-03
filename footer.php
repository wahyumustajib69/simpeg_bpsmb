</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<!--Edit Pegawai-->
	<script>
		$(document).ready(function(){
			$(".edit-pgw").click(function(e){
				var m = $(this).attr("id");
				$.ajax({
					url: "pegawai_edit.php",
					type: "GET",
					data : {id: m,},
					success: function(ajaxData){
						$("#pegawai-edit").html(ajaxData);
						$("#pegawai-edit").modal('show',{backdrop: 'true'});
					}
				});
			});
		});
	</script>
	<!--Edit Golongan-->
	<script>
		$(document).ready(function(){
			$(".modal_edit").click(function(e){
				var m = $(this).attr("id");
				$.ajax({
					url: "golongan_edit.php",
					type: "GET",
					data : {id: m,},
					success: function(ajaxData){
						$("#modaledit").html(ajaxData);
						$("#modaledit").modal('show',{backdrop: 'true'});
					}
				});
			});
		});
	</script>
	<!--Edit Golongan-->
	<script>
		$(document).ready(function(){
			$(".modal_edit").click(function(e){
				var m = $(this).attr("id");
				$.ajax({
					url: "jabatan_edit.php",
					type: "GET",
					data : {id: m,},
					success: function(ajaxData){
						$("#jbtnEdit").html(ajaxData);
						$("#jbtnEdit").modal('show',{backdrop: 'true'});
					}
				});
			});
		});
	</script>
	<!--Edit Pendidikan-->
	<script>
		$(document).ready(function(){
			$(".edit-pend").click(function(e){
				var m = $(this).attr("id");
				$.ajax({
					url: "pendidikan_edit.php",
					type: "GET",
					data : {id: m,},
					success: function(ajaxData){
						$("#pend-edit").html(ajaxData);
						$("#pend-edit").modal('show',{backdrop: 'true'});
					}
				});
			});
		});
	</script>
	<!--Edit SPPD-->
	<script>
		$(document).ready(function(){
			$(".modal_edit").click(function(e){
				var m = $(this).attr("id");
				$.ajax({
					url: "kepala-balai_edit.php",
					type: "GET",
					data : {id: m,},
					success: function(ajaxData){
						$("#kb-edit").html(ajaxData);
						$("#kb-edit").modal('show',{backdrop: 'true'});
					}
				});
			});
		});
	</script>
	<!--Edit SPPD-->
	<script>
		$(document).ready(function(){
			$(".modal_edit").click(function(e){
				var m = $(this).attr("id");
				$.ajax({
					url: "staf_edit.php",
					type: "GET",
					data : {id: m,},
					success: function(ajaxData){
						$("#stafEdit").html(ajaxData);
						$("#stafEdit").modal('show',{backdrop: 'true'});
					}
				});
			});
		});
	</script>
	<!--Edit Keluarga-->
	<script>
		$(document).ready(function(){
			$(".modal_edit").click(function(e){
				var m = $(this).attr("id");
				$.ajax({
					url: "keluarga_edit.php",
					type: "GET",
					data : {id: m,},
					success: function(ajaxData){
						$("#keluargaEdit").html(ajaxData);
						$("#keluargaEdit").modal('show',{backdrop: 'true'});
					}
				});
			});
		});
	</script>

	<!--Edit Cuti-->
	<script>
		$(document).ready(function(){
			$(".modal_edit").click(function(e){
				var m = $(this).attr("id");
				$.ajax({
					url: "cuti_edit.php",
					type: "GET",
					data : {id: m,},
					success: function(ajaxData){
						$("#cutiEdit").html(ajaxData);
						$("#cutiEdit").modal('show',{backdrop: 'true'});
					}
				});
			});
		});
	</script>

	<!--Edit Gaji-->
	<script>
		$(document).ready(function(){
			$(".modal_edit").click(function(e){
				var m = $(this).attr("id");
				$.ajax({
					url: "gaji_edit.php",
					type: "GET",
					data : {id: m,},
					success: function(ajaxData){
						$("#gajiEdit").html(ajaxData);
						$("#gajiEdit").modal('show',{backdrop: 'true'});
					}
				});
			});
		});
	</script>

	<!--Edit Tunjangan-->
	<script>
		$(document).ready(function(){
			$(".modal_edit").click(function(e){
				var m = $(this).attr("id");
				$.ajax({
					url: "tunjangan_edit.php",
					type: "GET",
					data : {id: m,},
					success: function(ajaxData){
						$("#tunjEdit").html(ajaxData);
						$("#tunjEdit").modal('show',{backdrop: 'true'});
					}
				});
			});
		});
	</script>
	

	<script>
		function konfirmasi(delete_url){
			$("#modal-delete").modal('show',{backdrop:'static'});
			document.getElementById('delete-link').setAttribute('href', delete_url);
		}
	</script>
	<script src="ckeditor/ckeditor.js"></script>
	<script>
		$(function () {
            CKEDITOR.replace('editor1');
            CKEDITOR.replace('editor2');
        });
	</script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
	<script src="js/select2.full.min.js"></script>

	<script>
		$(".nm-pgw").select2({
			dropdownParent: $("#modalPend")
		});
	</script>
	<script>
		$(".nm_pgw").select2({
			dropdownParent: $("#ModalTambah")
		});
	</script>
	<script>
		$(".nmpgw").select2({
			dropdownParent: $("#ModalStaf")
		});
	</script>
	<script>
		$(".keluarga").select2({
			dropdownParent: $("#modalKeluarga")
		});
	</script>
	<script>
		$(".cuti").select2({
			dropdownParent: $("#modalCuti")
		});
	</script>
	<script>
		$(".gaji").select2({
			dropdownParent: $("#modalGaji")
		});
	</script>
	<script>
		$(".tunj").select2({
			dropdownParent: $("#modalTunj")
		});
	</script>

	<script>
		
	window.onload = function(){
    
		// Line chart from swirlData for dashReport
		var ctx = document.getElementById("dashReport").getContext("2d");
		window.myLine = new Chart(ctx).Line(swirlData, {
			responsive: true,
			scaleShowVerticalLines: false,
			scaleBeginAtZero : true,
			multiTooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
		}); 
		
		// Pie Chart from doughutData
		var doctx = document.getElementById("chart-area3").getContext("2d");
		window.myDoughnut = new Chart(doctx).Pie(doughnutData, {responsive : true});

		// Dougnut Chart from doughnutData
		var doctx = document.getElementById("chart-area4").getContext("2d");
		window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, {responsive : true});

	}
	</script>
	<script>
        $(document).ready(function(){setTimeout(function(){$("#pesan").fadeIn('slow');}, 500);});
        setTimeout(function(){$("#pesan").fadeOut('slow');}, 3000);
   	</script>

</body>

</html>