<?php
require '../TOOLS/header_util.php';
?>
</head>
<body>


<form id="task-form" autocomplete="off">
   <div class="header">
       <h1>User Registration Form</h1>
   </div>
    <div class="myContainer">
        <table  width="100%" class="mytbl" >
            <tr>
               <td class="tdLabel"><label for="fname">First name:</label></td>
                <td class="tdInput">

                    <input type="text" id="fname" name="fname" minlength="2" maxlength="30">
                    <label class="tblMsg" id="fNameMessages"></label>
                </td>
            </tr>

            <tr>
               <td class="tdLabel"><label for="lname">Last name:</label></td>
                <td class="tdInput">
                    <input type="text" id="lname" name="lname" minlength="2" maxlength="50">
                    <label class="tblMsg" id="lNameMessages"></label>
                </td>

            </tr>

            <tr>
               <td class="tdLabel"><label for="fname">Email:</label></td>
                <td class="tdInput">
                    <input type="text" id="email" name="email" minlength="7" maxlength="50">
                    <label class="tblMsg" id="emailMessages"></label>
                </td>

            </tr>

            <tr>
                <td> </td>
                <td><button class="submitBtn" type="submit"> submit</button></td>
            </tr>
        </table>



    </div>
</form>

<?php
require '../TOOLS/footer_util.php';
?>
