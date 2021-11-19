
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!--CSS-->
     <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <title>Search Form</title>
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="lab_A_form.php">
            Home
            </a>

            <a class="navbar-brand" href="search.php">
            Search Page
            </a>
        </div>
  
</nav>
    <main class="main">    
            <!--Search form 1-->
            <div class="container form-input">
            <h1>Form 1</h1>
            <p id="showText">The search result is displayed on this same page</p>
            <h1 ></h1>
            <form method="POST" action="result_page.php" class="input-group">
            <input type="text" name="search" class="form-control" id="inputVal">
            <button class="btn btn-primary text-white" name='submit'>Submit</button>
            </div>           
        </form>
        
      <div>
          <input onkeyup="addToDatabase(this.value)" type="text" Placeholder="Update Header">
      </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

<script>
function addToDatabase(str) {
  if (str.length == 0) {
    document.getElementById("showText").innerHTML = "The search result is displayed on this same page";
 
  } else {
    //const xmlhttp = new XMLHttpRequest();
    document.getElementById("showText").innerHTML = str;
//    xmlhttp.onload = function() {
//     document.getElementById("showText").innerHTML = str;
//     }
  }
}
</script>
</body>

</html>