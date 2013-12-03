<?php 
include('header.php');
?>


        <div class="row-fluid">
            <div class="span6">

                <div class="card">


                    <h2 class="card-heading simple">
                        <span aria-hidden="true" class="icon-filter-2"></span> Connect to an external form
                    </h2>

                    <div class="card-body">


<div class="alert alert-info">
   <p>You can connect this service to an external Google spreadsheet in a very easy way.</p>
    <p>And because this app is exclusively made to run offline, you can refresh the registred visitors manually using <strong>"Visitor Management > Refresh visitor's list"</strong></p>
                          
</div>




<h4>1- Create a new Google Spreadsheet</h4>
<p>Go to <a href="#" target="_blank">Google Drive</a> and "Create > Google Form".</p>
<h4>2 - Be sure to create exactly those same fields.</h4>


                        <form class="form-horizontal" method="POST">
                            <div class="control-group">
                                <label class="control-label" for="inputGSID">Google Spreadsheet ID</label>
                                <div class="controls">
                                    <input type="text" class="span12" name="fn" id="inputGSID" placeholder="Google Spreadsheet ID" required>
                                </div>
                            </div>
                    

                           





                            <div class="control-group">
                                <div class="controls">

                                    <button type="submit" name="submit" class="btn btn-success">Save</button>
                                    <button type="submit" name="submit" class="btn btn-info">Test</button>
                                </div>
                            </div>
                        </form>


             


                    </div>
                </div>
            </div>
            <div class="span6">
                <div class="card">


                    <h2 class="card-heading simple">   
                        Settings
                    </h2>


                    <div class="card-body">



                        <form class="form-horizontal" method="POST">
                        
                        
                    
<p>Display the form fields in the "Express Management" feature (affects this feature only). It will allow you to fill this form faster.</p>
                         <div class="control-group">
              <div class="controls">
                <label class="checkbox">
                  <input type="checkbox" name="surname" checked> Surname
                </label>
              </div>


            <div class="controls">
                <label class="checkbox">
                  <input type="checkbox" name="firstname" checked> First Name
                </label>
              </div>

   <div class="controls">
                <label class="checkbox">
                  <input type="checkbox" name="age" checked> Age


                </label>
              </div>

             <div class="controls">
                <label class="checkbox">

                  <input type="checkbox" name="gender" checked> Gender

                </label>
              </div>

             <div class="controls">
                <label class="checkbox">
                  <input type="checkbox" name="address" checked> Address


                </label>
              </div>

             <div class="controls">
                <label class="checkbox">

                  <input type="checkbox" name="email" checked> Email

                </label>
              </div>

             <div class="controls">
                <label class="checkbox">

                  <input type="checkbox" name="c_number" checked> Contact Number

                </label>
              </div>

            </div>

                            <div class="control-group">
                                <div class="controls">

                                    <button type="submit" name="submit" class="btn btn-success">Save</button>
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

 
</body>
</html>