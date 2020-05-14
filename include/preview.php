<div id="image_display"></div>
 
  <div class="form-group">
 <label>Product Image</label>  
   <input type="file" id="images" name="image" />
  </div>
 
<script type="text/javascript"> 
  var fileCollection = new Array();
  $('#images').on('change', function(e){

        var files = e.target.files;

        $.each(files, function(i, file){

            fileCollection.push(file);

            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function(e){

                var template = '<form action="/uploads">' +
                        '<img class="img-thumbnail" width="400" height="250" src="'+e.target.result+'"/>' +'<br/>' + '<div>' +

                        '<div class="progress progress-striped active">' +
                        '<div class="progress-bar" style="width:0%">' + '</div>' +
                        '</div>' + '</div>' + '</form>'

                $('#image_display').append(template);

            };

        });
    });
</script>