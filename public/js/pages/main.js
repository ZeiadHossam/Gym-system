$('Table').DataTable({
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": false,
    "autoWidth": true,
    "column-sizing" : true,
    dom: 'Bfrtip',
    buttons: [
    'excel'
	]
    });

	$(function() {
		$('.nav-sidebar li a').filter(function() {return this.href==location.href}).addClass('active').siblings().removeClass('active')
		$('.nav-sidebar li a').click(function() {
			$(this).addClass('active').siblings().removeClass('active')
		})
	})
