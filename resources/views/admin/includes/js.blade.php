<!-- font awesome cdn -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<!-- <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script> -->
<script src="{{ asset('admin') }}/assets/js/app.js"></script>
<!-- Date range Picker -->
	<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
	

<!-- select 2-->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
      <script>
         $(function() {
         	var ctx = document.getElementById('chartjs-dashboard-line').getContext("2d");
         	var gradient = ctx.createLinearGradient(0, 0, 0, 225);
         	gradient.addColorStop(0, 'rgba(215, 227, 244, 1)');
         	gradient.addColorStop(1, 'rgba(215, 227, 244, 0)');
         	// Line chart
         	new Chart(document.getElementById("chartjs-dashboard-line"), {
         		type: 'line',
         		data: {
         			labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
         			datasets: [{
         				label: "Sales ($)",
         				fill: true,
         				backgroundColor: gradient,
         				borderColor: window.theme.primary,
         				data: [
         					2115,
         					1562,
         					1584,
         					1892,
         					1587,
         					1923,
         					2566,
         					2448,
         					2805,
         					3438,
         					2917,
         					3327
         				]
         			}]
         		},
         		options: {
         			maintainAspectRatio: false,
         			legend: {
         				display: false
         			},
         			tooltips: {
         				intersect: false
         			},
         			hover: {
         				intersect: true
         			},
         			plugins: {
         				filler: {
         					propagate: false
         				}
         			},
         			scales: {
         				xAxes: [{
         					reverse: true,
         					gridLines: {
         						color: "rgba(0,0,0,0.0)"
         					}
         				}],
         				yAxes: [{
         					ticks: {
         						stepSize: 1000
         					},
         					display: true,
         					borderDash: [3, 3],
         					gridLines: {
         						color: "rgba(0,0,0,0.0)"
         					}
         				}]
         			}
         		}
         	});
         });
      </script>
      <script>
         $(function() {
         	// Pie chart
         	new Chart(document.getElementById("chartjs-dashboard-pie"), {
         		type: 'pie',
         		data: {
         			labels: ["Chrome", "Firefox", "IE"],
         			datasets: [{
         				data: [4306, 3801, 1689],
         				backgroundColor: [
         					window.theme.primary,
         					window.theme.warning,
         					window.theme.danger
         				],
         				borderWidth: 5
         			}]
         		},
         		options: {
         			responsive: !window.MSInputMethodContext,
         			maintainAspectRatio: false,
         			legend: {
         				display: false
         			},
         			cutoutPercentage: 75
         		}
         	});
         });
      </script>
      <script>
         $(function() {
         	// Bar chart
         	new Chart(document.getElementById("chartjs-dashboard-bar"), {
         		type: 'bar',
         		data: {
         			labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
         			datasets: [{
         				label: "This year",
         				backgroundColor: window.theme.primary,
         				borderColor: window.theme.primary,
         				hoverBackgroundColor: window.theme.primary,
         				hoverBorderColor: window.theme.primary,
         				data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
         				barPercentage: .75,
         				categoryPercentage: .5
         			}]
         		},
         		options: {
         			maintainAspectRatio: false,
         			legend: {
         				display: false
         			},
         			scales: {
         				yAxes: [{
         					gridLines: {
         						display: false
         					},
         					stacked: false,
         					ticks: {
         						stepSize: 20
         					}
         				}],
         				xAxes: [{
         					stacked: false,
         					gridLines: {
         						color: "transparent"
         					}
         				}]
         			}
         		}
         	});
         });
      </script>
      <script>
         $(function() {
         	$("#world_map").vectorMap({
         		map: "world_mill",
         		normalizeFunction: "polynomial",
         		hoverOpacity: .7,
         		hoverColor: false,
         		regionStyle: {
         			initial: {
         				fill: "#e3eaef"
         			}
         		},
         		markerStyle: {
         			initial: {
         				"r": 9,
         				"fill": window.theme.primary,
         				"fill-opacity": .95,
         				"stroke": "#fff",
         				"stroke-width": 7,
         				"stroke-opacity": .4
         			},
         			hover: {
         				"stroke": "#fff",
         				"fill-opacity": 1,
         				"stroke-width": 1.5
         			}
         		},
         		backgroundColor: "transparent",
         		zoomOnScroll: false,
         		markers: [{
         				latLng: [31.230391, 121.473701],
         				name: "Shanghai"
         			},
         			{
         				latLng: [28.704060, 77.102493],
         				name: "Delhi"
         			},
         			{
         				latLng: [6.524379, 3.379206],
         				name: "Lagos"
         			},
         			{
         				latLng: [35.689487, 139.691711],
         				name: "Tokyo"
         			},
         			{
         				latLng: [23.129110, 113.264381],
         				name: "Guangzhou"
         			},
         			{
         				latLng: [40.7127837, -74.0059413],
         				name: "New York"
         			},
         			{
         				latLng: [34.052235, -118.243683],
         				name: "Los Angeles"
         			},
         			{
         				latLng: [41.878113, -87.629799],
         				name: "Chicago"
         			},
         			{
         				latLng: [51.507351, -0.127758],
         				name: "London"
         			},
         			{
         				latLng: [40.416775, -3.703790],
         				name: "Madrid"
         			}
         		]
         	});
         	setTimeout(function() {
         		$(window).trigger('resize');
         	}, 250)
         });
      </script>
      <script>
         $(function() {
         	$('#datetimepicker-dashboard').datetimepicker({
         		inline: true,
         		sideBySide: false,
         		format: 'L'
         	});
         });
      </script>

	 