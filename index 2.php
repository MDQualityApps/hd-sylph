<!DOCTYPE html>
<html>
<head>
    <title>Send an Email</title>
</head>
    
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>    
<body>
<div class= container>
	
		<h4 class="sent-notification"></h4>

		<form id="myForm">
			<h2>Send an Email</h2>
              <div class="row">
              <div class="col">
			<div class="form-group">
      <label for="name">Name:</label>
      <input type="name" class="form-control" id="name" placeholder="Enter name"me na="name">
    </div>
			
            
             <div class="form-group">
      <label for="number">Phone number:</label>
      <input type="number" class="form-control" id="number" placeholder="Enter number" name="number" >
    </div>
			
          
			<div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>

            </div>      
            

            <div class="col">  
<!--
			<label>Subject</label>
			<input id="subject" type="text" placeholder=" Enter Subject"> 
			<br><br>
-->


            <label>Request type:</label>
            <select name="request" id="request" class="custom-select mb-3">
             <option value="constructions">constructions</option>
             <option value="Interior">Interior</option>
             <option value="Renovations">Renovations</option> 
            </select>
                
             <label>Preferable contact time:</label>
             <select name="time" id="prefertime" class="custom-select mb-3">
             <option selected value="anytime">Any Time</option>
             <option value="8AM-12PM">8AM-12PM</option>
             <option value="12PM-8PM">12PM-8PM</option>   
             </select>    

              <div class="form-group">
             <label for="comment">Comment:</label>
             <textarea class="form-control" rows="5" id="body"></textarea>
              </div>
			
                
                
            </div>         
            </div>
		<center><button type="button" onclick="sendEmail()" value="Send An Email" class="btn btn-primary" name="submit">Submit</button> 
		</center>	
</form>
   
</div>
<!--	<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>-->
	<script type="text/javascript">
           function sendEmail() {
            var name = $("#name");
            var number = $("#number");   
            var email = $("#email");
//            var subject = $("#subject");
            var request = $("#request");
            var prefertime = $("#prefertime");  
            var body = $("#body");

            if (isNotEmpty(name) && isNotEmpty(email) &&  isNotEmpty(body)) {
                $.ajax({
                   url: 'sendEmail2.php',
                   method: 'POST',
                   dataType: 'json',
                   data: {
                       name: name.val(),
                       number: number.val(),
                       email: email.val(),
//                       subject: subject.val(),
                       request: request.val(),
                       prefertime: prefertime.val(),
                       body: body.val()
                   }, success: function (response) {
                        $('#myForm')[0].reset();
                        $('.sent-notification').text("Message Sent Successfully.");
                   }
                });
            }
        }

        function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            } else
                caller.css('border', '');

            return true;
        }
    </script>

</body>
</html>