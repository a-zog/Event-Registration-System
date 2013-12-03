<?php 
include('header.php');
?>


<div class="row-fluid">
    <div class="span6">

        <div class="card">


            <h2 class="card-heading simple">
                <span aria-hidden="true" class="icon-filter-2"></span> Already registred visitor
            </h2>

            <div class="card-body">
                <form class="form-horizontal">
                    <p>Use this form to quickly retrieve registred visitors.</p>
                    <div class="control-group">
                        <label class="control-label" for="inputGuessUser">Name Or Email</label>
                        <div class="controls">
                            <input type="text" class="span12" name="inputGuessUser" id="inputGuessUser" placeholder="Name Or Email">
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <a href="#" id="viewVisitorBtn" class="btn">View</a>
                            <button type="submit" name="submit" class="btn btn-info">Print Badge</button>
                        </div>
                    </div>
                    <hr/>
                    <div id="viewContainer">

                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="span6">
        <div class="card">


            <h2 class="card-heading simple">   
                Please Fill up all the details Below
            </h2>

            <div id="registrationContainer">

            </div>
            <div class="card-body">

                <form class="form-horizontal" id="newVisitorForm" method="POST">
                    <div class="control-group">
                        <label class="control-label" for="firstname">First Name <span class="label label-important">required</span></label>
                        <div class="controls">
                            <input type="text" class="span12" name="firstname" id="firstname" placeholder="First Name" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="lastname">Last Name  <span class="label label-important">required</span></label>
                        <div class="controls">
                            <input type="text" class="span12" name="lastname" id="lastname" placeholder="Last Name" required>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="age">Age</label>
                        <div class="controls">
                            <input type="text" class="span12" name="age" id="age" placeholder="Age">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="gender">Gender</label>
                        <div class="controls">
                            <select class="span12" name="gender">
                                <option></option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="address">Address</label>
                        <div class="controls">
                            <input type="text" class="span12" name="address" id="address" placeholder="Address">
                        </div>
                    </div>  
                    <div class="control-group">
                        <label class="control-label" for="organisation">Organization</label>
                        <div class="controls">
                            <input type="text" class="span12" name="organisation" id="organisation" placeholder="Organization">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="inputEmail">Email Adress  <span class="label label-important">required</span></label>
                        <div class="controls">
                            <input type="text" class="span12" name="email" id="inputEmail" placeholder="Email Address">
                        </div>
                    </div>


                    <div class="control-group">
                        <label class="control-label" for="c_number">Contact Number</label>
                        <div class="controls">
                            <input type="text" class="span12" name="c_number" id="c_number" placeholder="Contact Number" required>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                        <input type="hidden"  name="newVisitor"  value="true">
                            <button type="button" name="newVisitorSubmitted" id="newVisitorSubmitted" class="btn btn-success">Save</button>
                            <button type="button" name="newVisitorSubmittedandPrint" id="newVisitorSubmittedandPrint" class="btn btn-info">Save and Print Badge</button>
                        </div>
                    </div>
                </form>
            </div>


        </div>
    </div>

</div>
</div>
<div class="navbar navbar-inverse">
    <div class="navbar-inner ">
        <center id="color_white">
            Developed by <a href="https://twitter.com/a_zog" target="_blank">@azog</a> for <a href="http://www.expolugha.tn/" target="_blank">ExpoLugha</a>
        </center>
    </div>
</div>
<script type="text/javascript">



  $(document).ready(function(){



function submitNewVisitor(printAfter){

 var sentData=$( "#newVisitorForm").serialize();
        console.log(printAfter);
        if (printAfter){
           sentData=sentData + '&printAfter=' + printAfter;
        }

        console.log("-------------------");
        console.log(sentData);

        $.post("ajax.php", sentData, function(response) {
        console.log("-------------------Submission process Done");

    $("#registrationContainer").html(response);
});

 

        event.preventDefault();

  }


    $( "#newVisitorSubmitted" ).click(function() {
        console.log("new visitor submitted");
        submitNewVisitor(false);


return false;
    });

    $( "#newVisitorSubmittedandPrint" ).click(function() {

        console.log("new visitor submitted and print go");
        submitNewVisitor(true);


return false;
    });



});

</script>

</body>
</html>