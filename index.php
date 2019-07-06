<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up Page</title>
        <link  href="css/styles.css" rel="stylesheet" type="text/css" />
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </head>
    <body>

    <h1> Sign Up </h1>

    First Name: <input type="text" name="fName"><br>
    Last Name:  <input type="text" name="lName"><br>
    Gender:     <input type="radio" name="gender" value="m"> Male
                <input type="radio" name="gender" value="f"> Female <br><br>
    
    Zip Code:   <input type="text" name="zip" id="zip"><br>
    City:       <span id="city"></span><br>
    Latitude:   <span id="latitude"></span><br>
    Longitude:  <span id="longitude"></span><br><br>

    State:
    <select id="state" name="state">
        <option value="">Select One</option>
        <option value="ca"> California</option>
        <option value="ny"> New York</option>
        <option value="tx"> Texas</option>
    </select><br />

    Select a County: <select id="county"></select><br><br>

    Desired Username: <input type="text" id="username" name="username"><br>
    Desired Password: <input type="password" id="password" name="password"><br>
    Repeat Password:  <input type="password" id="passwordAgain"><br>

    <input type="submit" value="Sign Up!">
<script>
//alert(  $("#zip").val()  );
    
    //Displaying City from API after typing a zip code
    $("#zip").on("change",function() {
        //alert(  $("#zip").val()  );
        
        $.ajax({
            method: "GET",
            url: "http://cst336.herokuapp.com/projects/api/cityInfoAPI.php",
            dataType: "json",
            data: {  "zip" : $("#zip").val() } ,
            success: function(result,status) {
                //alert(result);
                $("#city").html(result.city);
            } 
        });//ajax

        $.ajax({
            method: "GET",
            url: "http://cst336.herokuapp.com/projects/api/cityInfoAPI.php",
            dataType: "json",
            data: {  "zip" : $("#zip").val() } ,
            success: function(result,status) {
                //alert(result);
                $("#latitude").html(result.latitude);
            } 
        });//ajax

        $.ajax({
            method: "GET",
            url: "http://cst336.herokuapp.com/projects/api/cityInfoAPI.php",
            dataType: "json",
            data: {  "zip" : $("#zip").val() } ,
            success: function(result,status) {
                //alert(result);
                $("#longitude").html(result.longitude);
            } 
        });//ajax
        
    });//zip

    $("#state").on("change",function() {
        $.ajax({
            method: "GET",
            url: "http://cst336.herokuapp.com/projects/api/countyListAPI.php",
            dataType: "json",
            data: {  "state" : $("#state").val() } ,
            success: function(result,status) {
                $("#county").html("<option> Select One </option>");
                for(let i=0;i<result.length;i++) {
                    $("#county").append("<option>" + result[i].county + "</option>");
                }
            } 
        });//ajax
    })

</script>
    </body>

</html>
    