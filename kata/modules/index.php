<?php include '../templates/head.php' ?>


<body>
  <script>
    $(document).ready(function(){
      console.log( Modernizr.inputtypes );
    });
  </script>
  <h1>Modules</h1>
  <form>
    <input type="text" min="3" />
    <input type="date" />
    <input type="range" />
    <input type="submit" value="Submit" name="submit" />
  </form>
</body>
