<?php include ("shared/main.php")?>

 <section class="content">
 
        <div class="container-fluid">
            <br> 
			<form  role="form"  action="#" method="post">
                <div class="card-body">
				<div class="form-group row">
                    <label for="Method" class="col-sm-2 col-form-label">Method:</label>
                    <div class="col-sm-10">
                      <input type="Text" class="form-control" >
                    </div>
                  </div>
				  
				  <div class="btn-group tablebuttons">
                                <button type="submit" class="btn btn-success btn-flat ">Confirm</button>
					<button type="reset" class="btn btn-danger btn-flat ">Clear Fields</button>
				  
				    </div>
				  
				  
				  
				  
				 
				  
				
				  
		
 </div>			
</form> 
 </div>		
<br>
		<div class="row">
			<table id="custTable" class="addmembertable table table-bordered table-striped">
				<thead>
					<tr>
						<th>Method</th>
						
					    <th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Visa</td>
						
						<td>
							 <div class="btn-group tablebuttons">
                                <button type="button" class="btn btn-info">Edit
                                
                                </button>
                                
                                <button type="button" class="btn btn-danger btn-sm ">Delete</button>
                            </div>
						</td>
					</tr>
					<tr>
						<td>Cash</td>
						
						<td>
							 <div class="btn-group tablebuttons">
                                <button type="button" class="btn btn-info">Edit
                                
                                </button>
                                
                                <button type="button" class="btn btn-danger btn-sm ">Delete</button>
                            </div>
						</td>
					</tr>
				</tbody>
			</table>

		</div>

 </div>			
</section>		
<?php include ("shared/footer.php")?>
