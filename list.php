<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Title Page-->
    <title>View Charger</title>
	
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" ></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
        <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
        <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style>
	.dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover{
		color: #f9f5f5 !important;
		border: 1px solid #bb3e3e;
		background-color: #bb3e3e;
		background: linear-gradient(to bottom, #d74949 0%, #871414 100%);
	    border-radius: 16px;
	}
	.dataTables_wrapper .dataTables_paginate .paginate_button:hover{
		color: #f9f5f5 !important;
		border: 1px solid #bb3e3e;
		background-color: #bb3e3e;
		background: linear-gradient(to bottom, #d74949 0%, #871414 100%);
	    border-radius: 16px;
	}
</style>
</head>
<body>
<!--<h2>Responsive Table with DataTables</h2>-->

<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <table id="example" class="table table-hover dt-responsive table-striped" style="width:100%">
        <thead>
          <tr>
            <th>EVSE ID</th>
            <th>OCPP Charger ID</th>
            <th>Site</th>
            <th>Slot</th>
            <th>Installed</th>
			<th>Teamviewer ID</th>
			<th>Installed</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>EV88705</td>
            <td>PS0001</td>
            <td>41,803,125</td>
            <td>31.3</td>
            <td>2,780,387</td>
			<td>2,780,387</td>
			<td>2,780,387</td>
		  </tr>
		  <tr>
            <td>EV88705</td>
            <td>PS0001</td>
            <td>41,803,125</td>
            <td>31.3</td>
            <td>2,780,387</td>
			<td>2,780,387</td>
			<td>2,780,387</td>
		  </tr>
		  <tr>
            <td>EV88705</td>
            <td>PS0001</td>
            <td>41,803,125</td>
            <td>31.3</td>
            <td>2,780,387</td>
			<td>2,780,387</td>
			<td>2,780,387</td>
		  </tr>
		  <tr>
            <td>EV88705</td>
            <td>PS0001</td>
            <td>41,803,125</td>
            <td>31.3</td>
            <td>2,780,387</td>
			<td>2,780,387</td>
			<td>2,780,387</td>
		  </tr>
		  <tr>
            <td>EV88705</td>
            <td>PS0001</td>
            <td>41,803,125</td>
            <td>31.3</td>
            <td>2,780,387</td>
			<td>2,780,387</td>
			<td>2,780,387</td>
		  </tr>
		  <tr>
            <td>EV88705</td>
            <td>PS0001</td>
            <td>41,803,125</td>
            <td>31.3</td>
            <td>2,780,387</td>
			<td>2,780,387</td>
			<td>2,780,387</td>
		  </tr>
		  <tr>
            <td>EV88705</td>
            <td>PS0001</td>
            <td>41,803,125</td>
            <td>31.3</td>
            <td>2,780,387</td>
			<td>2,780,387</td>
			<td>2,780,387</td>
		  </tr>
		  <tr>
            <td>EV88705</td>
            <td>PS0001</td>
            <td>41,803,125</td>
            <td>31.3</td>
            <td>2,780,387</td>
			<td>2,780,387</td>
			<td>2,780,387</td>
		  </tr><tr>
            <td>EV88705</td>
            <td>PS0001</td>
            <td>41,803,125</td>
            <td>31.3</td>
            <td>2,780,387</td>
			<td>2,780,387</td>
			<td>2,780,387</td>
		  </tr><tr>
            <td>EV88705</td>
            <td>PS0001</td>
            <td>41,803,125</td>
            <td>31.3</td>
            <td>2,780,387</td>
			<td>2,780,387</td>
			<td>2,780,387</td>
		  </tr>
		  <tr>
            <td>EV88705</td>
            <td>PS0001</td>
            <td>41,803,125</td>
            <td>31.3</td>
            <td>2,780,387</td>
			<td>2,780,387</td>
			<td>2,780,387</td>
		  </tr>
		  <tr>
            <td>EV88705</td>
            <td>PS0001</td>
            <td>41,803,125</td>
            <td>31.3</td>
            <td>2,780,387</td>
			<td>2,780,387</td>
			<td>2,780,387</td>
		  </tr><tr>
            <td>EV88705</td>
            <td>PS0001</td>
            <td>41,803,125</td>
            <td>31.3</td>
            <td>2,780,387</td>
			<td>2,780,387</td>
			<td>2,780,387</td>
		  </tr>
        </tbody>
              </table>
    </div>
  </div>
</div>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script>
	var table = $('#example').DataTable({
                language: {
                    paginate: {
                      next: '>>',
                      previous: '<<'  
                    }
                  }
            });
			</script>
</body>
</html>
