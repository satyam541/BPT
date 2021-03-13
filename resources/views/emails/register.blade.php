

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
</head>
<body>
    <div style="width:100%;">
       
        <div>
           Your are successfully regsitered  to cms in <a href="bestpracticetraining.com">Best Practice Training</a>.
        </div>


        <div style="margin-top:10px; width:100%">
            <div style="background-color: #f94a3a; padding: 6px; color: #fff; font-size: 20px;width:100% ">
                 Account Details
            </div>
                    <table style="width:100%">
				
                        <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                            <td style="width:30%;float:left">
                                Name:
                            </td>
                            <td style="width:70%">
                                {{ $user->name }}
                            </td>
                        </tr>
                
					  
                        <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                            <td style="width:30%;float:left">
                                Email:
                            </td>
                            <td style="width:70%">
                             {{ $user->email }}
                            </td>
                        </tr>
					
                        <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                            <td style="width:30%;float:left">
                                Password:
                            </td>
                            <td style="width:70%">
                               <code>{{ $user->rawPassword }}</code>
                            </td>
                        </tr>
					

						

                    </table>
          
        </div>

   

   </div>
</body>
</html>
