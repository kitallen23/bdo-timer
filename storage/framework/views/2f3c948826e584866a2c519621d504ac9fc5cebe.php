<html>
<head>
    <title> <?php echo $__env->yieldContent('title'); ?> </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/68f498a912.js"></script>
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/bootstrap.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/style.css')); ?>">
</head>
<body id="body">
<?php echo $__env->yieldContent('content'); ?>
<?php echo $__env->make('shared.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>