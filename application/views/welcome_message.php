<!DOCTYPE html>

<html lang="en">

    <head> 

        <title>Pagination Demo | CodesQuery</title> 

        <meta charset="utf-8"> 

        <meta http-equiv="X-UA-Compatible" content="IE=edge">    

        <meta name="viewport" content="width=device-width, initial-scale=1"> 

        <!--bootstrap CSS -->

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-

        BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    </head>

    <body>

        <div class="wrapper"> 

            <div class="container" style="margin: 100px;"> 

                <div class="row"> 

                    <div class="pagination_demo "> 

                        <h4>Pagination Demo | CodesQuery</h4> 

                        <hr> 
                        <div class="col-md-12" style="margin-bottom: 10px">
                        	<form class="form-inline" method="get" action="<?php echo site_url("welcome/search");?>">
							  <div class="form-group">
							    <label for="exampleInputName2">Search</label>
							    <input type="text" class="form-control" id="search" name="search" value="<?php if(isset($_GET['search'])) echo $_GET['search'];?>" placeholder="Username or Email">
							  </div>
							  <button type="submit" class="btn btn-primary">Search</button>
							  <button type="button" class="btn btn-danger" id="btnReset">Reset</button>
							</form>
                        </div>

                        <table class="table table-bordered table-hover table-responsive paginated"> 

                            <thead> 

                                <tr> 


                                    <th class="text-center"> Name  </th> 

                                    <th class="text-center"> Email </th> 

                                </tr> 

                            </thead> 

                            <tbody> 

                                <?php 
                                foreach($users->result() as $item) { ?> 

                                     <tr> 

                                         <td> <?php echo $item->user_name;  ?></td> 

                                         <td> <?php echo $item->user_email; ?></td> 

                                     </tr> 

                                 <?php  }  ?> 

                             </tbody> 

                         </table> 

                         <div class="pagination_links"> 

                             <?php echo $links; ?> </div> 

                         </div> 

                     </div> 

                 </div> 

             </div>

         </div>

         <!-- Latest compiled and minified JavaScript -->
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-

         Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">

         </script>
         <script type="text/javascript">
        var global_base_url = "<?php echo site_url('/') ?>";
        </script>
         <script type="text/javascript">
         	$(function(){
         		$('#btnReset').click(function(){
         			location.href=global_base_url+'/welcome/search';
         			return false;
         		});
         	});
         </script>
      </body>

</html>
