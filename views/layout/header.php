<!DOCTYPE html>
<html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Warehouse Management System</title>
	<link type="text/css" rel="stylesheet" href="<?=BASE_URL;?>assets/css/styles.css">

        <script>
                const BASE_URL = <?php echo json_encode(BASE_URL); ?>;
                const IS_ADMIN = <?php echo json_encode($this->isAdmin($this->user)); ?>;
        </script>
</head>
<body>
