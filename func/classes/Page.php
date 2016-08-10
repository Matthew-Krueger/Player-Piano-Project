<?php
/**
* Page class to enable autogeneration of a page based on content in a database.
*/
class Page{

  private $_db,
          $_sessionName,
          $_cookieName;

  public function __construct($address = "/"){

    # Get the instance of the Database to use later on in the class
    $this->_db = DB::getInstance();

    # Get the session configuration in need be
    $this->_sessionName = Config::get("session/session_name");
    $this->_cookieName = Config::get("remember/cookie_name");

  }

  public function carousel(){

  }

  public function header($name='Untitled',$additionalTags=""){
    ?>
      <!-- Begin automated header generation -->
        <head>
        <title><?php echo $name . " - " . Config::get('siteData/name'); ?></title>
        <!-- Set the viewport for a responsive device -->
        <meta name=viewport content="width=device-width, initial-scale=1">

        <!-- Latest jQuery javascript -->
          <script async
            src="https://code.jquery.com/jquery-3.0.0.min.js"
            integrity="sha256-JmvOoLtYsmqlsWxa7mDSLMwa6dZ9rrIdtrrVYRnDRH0="
            crossorigin="anonymous"></script>

          <!-- jQuery UI components-->
            <script async src="/include/jQuery/jquery-ui.min.js"></script>
            <link async href="/include/jQuery/jquery-ui.min.css" rel="stylesheet">
            <!--<link async href="/include/jQuery/jquery-ui.structure.min.css" rel="stylesheet">
            <link async href="/include/jQuery/jquery-ui.theme.min.css" rel="stylesheet">-->

          <!-- Latest Bootstrapcdn delivered content for javascript and CSS -->
            <link
              async
              rel="stylesheet"
              href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
              integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7"
              crossorigin="anonymous">
            <link
              async
              rel="stylesheet"
              href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"
              integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r"
              crossorigin="anonymous">
            <script
              async
              src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
              integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
              crossorigin="anonymous"></script>

              <!-- Additional Tags -->
              <?php echo $additionalTags . "</head>";
  }

}
