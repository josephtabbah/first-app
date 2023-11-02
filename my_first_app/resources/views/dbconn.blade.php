<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel & MYSQL db connection</title>
</head>
<body>
    <div>
        <?php
        if(DB::connection() -> getPdo()){
            echo "successfully connected to DB and Db Name is ".DB::connection() -> getDatabase();
        }
            ?>
        
        </div>
        
</body>
</html>