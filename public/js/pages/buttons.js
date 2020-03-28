$(function() {
	const Toast = Swal.mixin({
		toast: true,
		position: 'top-end',
		showConfirmButton: false,
		timer: 2000
	});
$('.toastrDefaultSuccess').click(function() {
	toastr.success('Signed in successfully')
});
$('.toastrDefaultError').click(function() {
	toastr.error('Deleted successfully')
});

});
