<!DOCTYPE html>
<html>

<head>
    <title>Phonpalit</title>
    <script src="<?php echo site_url('/js/jquery_v2.1.4.min.js'); ?>"></script>
    
</head>

<body>
 <p>update</p>
    <select class="selc_student">
        <?php 
   foreach ($student_all as $key => $value) {
    echo "<option value=".$student_all[$key]->id.">".$student_all[$key]->name."</option>";
   }
  
   ?>
    </select>
    <form class="update_form" method="post" action="<?php echo site_url('/update_student'); ?>">
        <label for="id">id</label>
        <input type="number"  readonly="readonly" name="id">
        <label for="name">name</label>
        <input type="text" name="name">
        <label for="lastname">lastname</label>
        <input type="text" name="lastname">
        <label for="class">class</label>
        <input type="number" name="class">
        <input type="submit" name="student_update">
    </form>
    <hr>
    <a href="<?php echo site_url() ?>">home</a>
    <script>
    $(document).ready(function() {
    	ajax_selc();
        $(document).on('change', '.selc_student', function() {
           ajax_selc();
        });

        function ajax_selc(){
        	 var selc_id = $(".selc_student").val();
            $.ajax({

                    method: "POST",
                    url: "<?php echo site_url('/update_student'); ?>",
                    data: {
                    	"update_form" : 1,
                        "id": selc_id,
                    }
                })
                .done(function(data) {

                	$(".update_form input[name='id']").val( data['id']); 
                  	$(".update_form input[name='name']").val( data['name']); 
                   	$(".update_form input[name='lastname']").val( data['lastname']); 
                    $(".update_form input[name='class']").val( data['class']); 
                  // 
                });
        }

    });
    </script>
</body>
</html>