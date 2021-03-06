
    <!DOCTYPE html>  
    <html>  
    <head>  
        <title>form validation</title>  
        <meta charset="utf-8" />  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

        <script type="text/javascript">  
            (function () {  
                'use strict';  
                window.addEventListener('load', function () {  
                    var form = document.getElementById('needs-validation');  
                    form.addEventListener('submit', function (event) {  
                        if (form.checkValidity() === false) {  
                            event.preventDefault();  
                            event.stopPropagation();  
                        }  
                        form.classList.add('was-validated');  
                    }, false);  
                }, false);  
            })();  
        </script>  
    </head>  
    <body>  
        <div class="container py-5">  
            <div class="row">  
                <div class="offset-md-2 col-md-8 offset-md-2">  
                    <div class="card">  
                        <div class="card-header bg-primary text-white">  
                            <h4 class="card-title text-uppercase">Employee Form</h4>  
                        </div>  
                        <div class="card-body">  
                            <form id="needs-validation" novalidate>  
                                <div class="row">  
                                    <div class="col-sm-6 col-md-6 col-xs-12">  
                                        <label for="firstName">First Name</label>  
                                        <input type="text" class="form-control" id="firstName" placeholder="First Name" required  data-toggle="tooltip" data-placement="top" title="minusculas, mayusculas numero y caracter especial">  
                                        <div class="invalid-tooltip">  
                                            Please enter first name.  
                                        </div>  
                                    </div>  
                                    <div class="col-sm-6 col-md-6 col-xs-12">  
                                        <label for="lastName">Last Name</label>  
                                        <input type="text" class="form-control" id="lastName" placeholder="Last Name" required>  
                                        <div class="invalid-tooltip">  
                                            Please enter last name.  
                                        </div>  
                                    </div>  
                                </div>  
                                <div class="row">  
                                     <div class="col-sm-4 col-md-4 col-xs-12">  
                                         <label for="Gender">Gender</label>  
                                         <select class="custom-select" required>  
                                             <option value="">Select Gender</option>  
                                             <option value="1">Male</option>  
                                             <option value="2">Female</option>  
                                         </select>  
                                         <div class="invalid-tooltip">Please choose gender</div>  
                                     </div>  
                                    <div class="col-sm-4 col-md-4 col-xs-12">  
                                        <label for="email">Email address</label>  
                                        <input type="email" class="form-control" id="email" placeholder="email address" aria-describedby="inputGroupPrepend" required>  
                                        <div class="invalid-tooltip">  
                                            Please provide a valid email.  
                                        </div>  
                                    </div>  
                                    <div class="col-sm-4 col-md-4 col-xs-12">  
                                        <label for="phonenumber">Mobile Number</label>  
                                        <input type="tel" pattern="^\d{10}$" class="form-control" id="phonenumber" placeholder="Mobile Number" aria-describedby="inputGroupPrepend" required>  
                                        <div class="invalid-tooltip">  
                                            Please enter 10 digit mobile number.  
                                        </div>  
                                    </div>  
                                </div>  
                                <div class="row">  
                                    <div class="col-sm-12 col-md-12 col-xs-12">  
                                        <div class="form-group">  
                                            <label>Mandatory Skills</label>  
                                        </div>  
                                        <div class="form-check-inline">  
                                            <div class="custom-control custom-radio ">  
                                                <input type="radio" class="custom-control-input" id="html" aria-describedby="inputGroupPrepend" name="radio-html" required>  
                                                <label class="custom-control-label" for="html">HTML 5</label>  
                                                <div class="invalid-tooltip">Choose skill</div>  
                                            </div>  
                                        </div>  
                                        <div class="form-check-inline">  
                                            <div class="custom-control custom-radio ">  
                                                <input type="radio" class="custom-control-input" id="javascript" aria-describedby="inputGroupPrepend" name="radio-javascript" required>  
                                                <label class="custom-control-label" for="javascript">JavaScript</label>  
                                                <div class="invalid-tooltip">Choose skill</div>  
                                            </div>  
                                        </div>  
                                        <div class="form-check-inline">  
                                            <div class="custom-control custom-radio ">  
                                                <input type="radio" class="custom-control-input" id="csharp" aria-describedby="inputGroupPrepend" name="radio-csharp" required>  
                                                <label class="custom-control-label" for="csharp">C# Programming</label>  
                                                <div class="invalid-tooltip">Choose skill</div>  
                                            </div>  
                                        </div>  
                                        <div class="form-check-inline">  
                                            <div class="custom-control custom-radio">  
                                                <input type="radio" class="custom-control-input" id="aspdotnet" aria-describedby="inputGroupPrepend" name="radio-aspdotnet" required>  
                                                <label class="custom-control-label" for="aspdotnet">ASP.NET</label>  
                                                <div class="invalid-tooltip">Choose skill</div>  
                                            </div>  
                                        </div>  
                                        <div class="form-check-inline">  
                                            <div class="custom-control custom-radio">  
                                                <input type="radio" class="custom-control-input" id="MVC" name="radio-MVC" required>  
                                                <label class="custom-control-label" for="MVC">ASP.NET MVC</label>  
                                                <div class="invalid-tooltip">Choose skill</div>  
                                            </div>  
                                        </div>  
                                    </div>  
                                </div>  
                                <div class="row">  
                                    <div class="col-sm-12 col-md-12 col-xs-12">  
                                        <div class="form-group">  
                                            <label>Profile Picture</label>  
                                            <div class="custom-file">  
                                                <input type="file" class="custom-file-input" id="validatedCustomFile" required>  
                                                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>  
                                                <div class="invalid-tooltip">Choose file for upload</div>  
                                            </div>  
                                        </div>  
                                    </div>  
                                </div>  
                                <div class="row">  
                                    <div class="col-sm-12 col-md-12 col-xs-12">  
                                        <label for="address">Address</label>  
                                        <textarea class="form-control" rows="3" id="address" aria-describedby="inputGroupPrepend" required></textarea>  
                                        <div class="invalid-tooltip">please enter address</div>  
                                    </div>  
                                </div>  
                                <div class="row">  
                                    <div class="col-sm-12 col-md-12 col-xs-12">  
                                       <div class="form-check">  
                                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>  
                                                <label class="form-check-label" for="invalidCheck">  
                                                    Agree to terms and conditions  
                                                </label>  
                                                <div class="invalid-tooltip">  
                                                    You must agree before submitting.  
                                                </div>  
                                            </div>  
                                    </div>  
                                </div>  


                                <button type="button" id="tooltip-demo" class="btn btn-danger" data-toggle="tooltip" data-placement="left" title="Left">
 
  Left Demo
 
</button>



                                <div class="row">  
                                    <div class="col-sm-12 col-md-12 col-xs-12">  
                                        <div class="float-right">  
                                            <button class="btn btn-danger rounded-0" type="submit">Cancel</button>  
                                            <button class="btn btn-primary rounded-0" type="submit">Register</button>  
                                        </div>  
                                    </div>  
                                </div>  
                            </form>  
                        </div>  
                    </div>  
                </div>  
            </div>  
        </div>  
        
    <script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>

    </body>  



    </html>  
