function showToasting(messege,type) {
	if(type==0)
		{
			const Toast = Swal.mixin({
				toast: true,
				position: 'top-end',
				showConfirmButton: false,
				timer: 3000});

			Toast.fire({
				type: 'success',
				title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
			})
		}
		else if(type==1)
		{
			toastr.error(messege)
		}
		else if(type==2){
			toastr.warning(messege)
		}

}
