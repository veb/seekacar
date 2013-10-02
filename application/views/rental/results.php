<script type='text/javascript' language='javascript'>
$(document).ajaxStart(function () {
    $('#result_table').fadeIn();
});
$(document).ajaxStop(function () {
    $('#result_table').fadeOut();
});
$(document).ready(function() {	
	$.ajax({
        url: 'list_companies',
        type:'POST',
		dataType: 'json',
		data: {pickuplocation: "<?php echo $plocation; ?>", dropofflocation: "<?php echo $dlocation; ?>"},
		success: function(companies){			
			$.each(companies, function(i, company) {					
                $.ajax({
                    url: 'get_cars',
                    type: 'POST',
                    dataType: 'json',
                    data: {name: company.name, puc: company.puc, doc: company.doc, pickupdate: "<?php echo $pudate; ?>", pickuptime: "<?php echo $putime; ?>", dropoffdate: "<?php echo $dodate; ?>", dropofftime: "<?php echo $dotime; ?>"},
                    success: function(cars){
						$.each(cars, function(i, car) {
							$('#carTable tr:last').after('<tr><td>&nbsp;</td><td>' + car.company + '</td><td>' + car.title + '</td><td>' + car.type + '</td><td>' + car.gearbox + '</td><td>' + car.size + '</td><td>' + car.price + '</td></tr>');
						});							
                    }
			    });
		    });	
		} // End of success function of ajax 
    }); // End of ajax call  
});
</script>
<div class="container-fluid">
	<div class="row-fluid">
        <div class="span3">
			<div class="well sidebar-nav">
				<ul class="nav nav-list">
					<li class="nav-header">Search</li>              
				</ul>  
				<div class="left-search-form">
					<form action="">
						<fieldset>
							<div class="clearfix">
                                <select class="full-width">
                                    <option>Pickup Location</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
							</div>
							<div class="clearfix">
								<input class="sixty-width" type="text" placeholder="Pickup Date"> 
                                <input class="forty-width" type="text" placeholder="Pickup Time">
							</div>
							<div class="clearfix">
                                <select class="full-width">
                                    <option>Dropoff Location</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
							</div>
							<div class="clearfix">
								<input class="sixty-width" type="text" placeholder="Dropoff Date"> 
                                <input class="forty-width" type="text" placeholder="Dropoff Time">
							</div>
							<div class="clearfix">
								<button class="btn btn-large btn-primary" type="submit">Search</button>
							</div>
						</fieldset>
					</form> 
                </div>
			</div><!--/.well -->
        </div><!--/span-->
        <div class="span9">
			<div class="leaderboard">            
				<h1>Search Results</h1>	            	
				<div class="row">
					<div class="span4 select_height">	Showing 1 - 10 of 50 results</div>
					<div class="pull-right">
						Sort by : 
						<select id="sort" name="sort" class="span2">
							<option value="">Company Name</option>
							<option value="">Price: Low to High</option>
							<option value="">Price: High to Low</option>
						</select>
					</div>
				</div>
				<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="carTable">
					<thead>
						<tr>
							<th>Image</th>
							<th>Company Name</th>
							<th>Title</th>
							<th>Type</th>
							<th>Gearbox</th>
							<th>Size</th>
							<th>Price</th>
						</tr>		
					</thead>		
					<tbody>
						<tr id="result_table"><td colspan="7" style="text-align: center;"><img src="http://www.sanbaldo.com/wordpress/wp-content/bigrotation2.gif" id="img-load" /> Finding Cars...</td></tr>
					</tbody>
				</table>
				<div class="row premium">
					<div class="span2">
						<a href="" class="thumbnail " ><img alt="" src="https://www.acerentalcars.co.nz/images/cars/premcomp_md.jpg"></a>
						<h5>Daily price: $28NZD</h5>
				
					</div>			
					<div class="span3">
						<img style="margin-bottom: 30px; float: left;" alt="" src="http://rental.simple-hosts.com/images/ace.jpg">
						<a href="property.html"><h3>Premium Compact</h3></a>
						<h6>Adults: 4</h6>
						<h6>Transmission: Manual</h6>
						<h6>Car: Daihatsu Sirion</h6> 
						<button class="btn btn-primary">Book...</button>
					</div>
					<div class="span2">
						<a href="" class="thumbnail " ><img alt="" src="https://www.acerentalcars.co.nz/images/cars/premcomp_md.jpg"></a>
						<h5>Daily price: $28NZD</h5>
				
					</div>
					<div class="span3">
						<img style="margin-bottom: 30px; float: left;" alt="" src="http://rental.simple-hosts.com/images/ace.jpg">
						<a href="property.html"><h3>Premium Compact</h3></a>
						<h6>Adults: 4</h6>
						<h6>Transmission: Manual</h6>
						<h6>Car: Daihatsu Sirion</h6> 
						<button class="btn btn-primary">Book...</button>
					</div>
				</div>
				<hr />	
            </div>          
        </div>          
    </div>   
</div><!--/.fluid-container-->