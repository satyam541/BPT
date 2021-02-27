

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
</head>
<body>
    <div style="width:100%;">
       
        <div>
           New User Created
        </div>

        <div style="margin-top:10px; width:100%">
            <div style="background-color: #4286f3; padding: 6px; color: #fff; font-size: 20px;width:100% ">
                 Account Details
            </div>
                    <table style="width:100%">
				
                        <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                            <td style="width:20%;float:left">
                                Name:
                            </td>
                            <td style="width:80%">
                                {{ $user->name }}
                            </td>
                        </tr>
                
                        <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                            <td style="width:20%;float:left">
                                Email:
                            </td>
                            <td style="width:80%">
                             {{ $user->email }}
                            </td>
                        </tr>
					
                    </table>
            </div>

   </div>
</body>
</html>
