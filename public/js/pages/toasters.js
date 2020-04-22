function showToasting(messege,type) {
	const Toast = Swal.mixin({
		toast: true,
		position: 'top-end',
		showConfirmButton: false,
		timer: 3000});
	if(type==0)
		{

			Toast.fire({
				type: 'success',
				title: messege
			})
		}
		else if(type==1)
		{
			Toast.fire({
				type: 'error',
				title: messege
			})		}
		else if(type==2){

		Toast.fire({
			type: 'warning',
			title: messege

		})
		}
//	toastr.warning(messege)

}
