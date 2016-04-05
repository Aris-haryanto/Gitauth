<?php require( 'gitauth/git.php' ); ?>
 <html>
  <head>
  </head>
  <body>
    <p>
      <a href="<?php echo $git->git_authorize_url(); ?>">
          <button>Login with Github</button>
      </a>
    </p>
  </body>
</html>