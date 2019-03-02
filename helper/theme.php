<?php
$query = "SELECT * FROM list_theme WHERE id = '1'";
$themes = $database->select($query);
while($result = $themes->fetch_assoc()){
    if($result['themecolor'] == '0'){?>
        <link rel="stylesheet" href="helper/theme/color/default.css">
        <?php
    }elseif($result['themecolor'] == '1'){?>
        <link rel="stylesheet" href="helper/theme/color/blue.css">
        <?php
    }elseif($result['themecolor'] == '2'){?>
        <link rel="stylesheet" href="helper/theme/color/violet.css">
        <?php
    }elseif($result['themecolor'] == '3'){?>
        <link rel="stylesheet" href="helper/theme/color/green.css">
        <?php
    }elseif($result['themecolor'] == '4'){?>
        <link rel="stylesheet" href="helper/theme/color/pink.css">
        <?php
    }elseif($result['themecolor'] == '5'){?>
        <link rel="stylesheet" href="helper/theme/color/yellow.css">
        <?php
    }elseif($result['themecolor'] == '6'){?>
        <link rel="stylesheet" href="helper/theme/color/sea.css">
        <?php
    }

    if($result['themefont'] == '0'){?>
        <link rel="stylesheet" href="helper/theme/font/default.css">
        <?php
    }elseif($result['themefont'] == '1'){?>
        <link rel="stylesheet" href="helper/theme/font/opensans.css">
        <?php
    }elseif($result['themefont'] == '2'){?>
        <link rel="stylesheet" href="helper/theme/font/raleway.css">
        <?php
    }
}
?>