<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Header</title>

    </head>
    <body>
   
  
    <h1 id="myheader" style="background:darkcyan; color:white; padding:10px 20px;">
  BReads
</h1>

<br/>
<button type="button" onclick="toggle();">Change Color</button>




<script>
  let toggle = () => {
    let element = document.getElementById("myheader");

    if (element.style.backgroundColor === "darkcyan") {
       element.style.backgroundColor = "#302ea3";
    } else {
       element.style.backgroundColor = "darkcyan";
    }
  }
</script>

        
    </body>

</html>