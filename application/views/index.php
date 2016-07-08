<!DOCTYPE html>
<html>

<head>
    <title>Phonpalit</title>
    <script src="<?php echo site_url('/js/jquery_v2.1.4.min.js'); ?>"></script>
    
</head>

<body>
    <h1><?php echo $hello." and ".$student_info[0]->name ?></h1>
    <hr>
    <p>get</p>
    <form method="post" action="<?php echo site_url(); ?>">
        <input type="number" name="id">
        <input type="submit" name="student_get">
    </form>
    <hr>
    <p>add</p>
    <form method="post" action="<?php echo site_url(); ?>">
        <label for="id">id</label>
        <input type="number" name="id">
        <label for="name">name</label>
        <input type="text" name="name">
        <label for="lastname">lastname</label>
        <input type="text" name="lastname">
        <label for="class">class</label>
        <input type="number" name="class">
        <input type="submit" name="student_add">
    </form>
    <hr>
    <p>del</p>
    <form method="post" action="<?php echo site_url(); ?>">
        <label for="id">id</label>
        <input type="number" name="id">
        <span>||</span>
        <label for="name">name</label>
        <input type="text" name="name">
        <input type="submit" name="student_del">
    </form>
    <hr>
   <a href="<?php echo site_url('/update_student'); ?>">update</a>
</body>

</html>
