<!DOCTYPE html>
<html lang="en">

<head>
  <title>maribelajarcoding.com</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>

<body>
  <div class="container">
    <span>
      <h2 align="center">Kirim Email Attachment dengan PHP</h2>
    </span>
    <form class="form-horizontal" method="POST" enctype='multipart/form-data' id="FormEmail">
      <div class="form-group">
        <label class="control-label col-sm-2" for="email">Email Penerima:</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" id="email" name="email">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="nama">Nama Penerima:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="nama" name="nama">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="nama">Subjek:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="subjek" name="subjek">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="pesan">Pesan:</label>
        <div class="col-sm-10">
          <textarea class="form-control" rows="5" id="pesan" name="pesan"></textarea>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="Attachment">Attachment:</label>
        <div class="col-sm-10">
          <input type="file" class="form-control" id="attachment" name="attachment">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" name="submit" class="btn btn-primary">Kirim</button>
        </div>
      </div>
    </form>
    <!-- <h4 align="center"><a href="https://maribelajarcoding.com" target="_blank">maribelajarcoding.com</a></h4>-->
  </div>
  <script type="text/javascript">
    $("form").submit(function(e) {
      e.preventDefault();
      var form = $('#FormEmail')[0];

      var data = new FormData(form);
      $.ajax({
        url: 'send-mail.php',
        type: 'post',
        enctype: 'multipart/form-data',
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        success: function(data) {
          alert(data);

        }
      });
    });
  </script>
</body>

</html>