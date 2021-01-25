 <!DOCTYPE html>
 <html>
 <head>
 
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" 
 integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" 
integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
 
 </head>
 <body>
 <center><h2 style="margin-top:5%;">Search for the student profile(s) here</h2></center>
 <div class="container">
 <div class="input-group" style="margin-top:5%;">
    <input type="text" id="search" class="search form-control" placeholder="Search for name/ topic / institute">
    <div class="input-group-append">
		<button type="submit" class="btn btn-secondary" id="search">
        <i class="fa fa-search"></i>
      </button>
    </div>
 </div>
     
<script>
  (function() {
    var cx = '017207126672775862101:1a9xcz17mfy';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:search></gcse:search>
     
<p>&nbsp;</p>
<div class="student_listing"></div>
</div>
</body>
</html>
  
<script type="text/javascript">
$(function() {
	
		$('#search').keyup(function(event) {
		if (event.keyCode === 13) {
			$('button#search').click();
		}
		});
	
		$('button#search').click(function() {
			
			var search_token = $('.search').val();
	
			$.ajax({
				url:'search_students.php',
				data:'search='+search_token,
				type: 'post',
				success:function(response)
				{
					$('.student_listing').html(response);
				}
			})
		})
});
</script>
