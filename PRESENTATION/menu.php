<?php
$role = (!empty($_SESSION['USER']['role']))?$_SESSION['USER']['role']:'';
        if ($role == 'admin') {
            $menu = [
                'Profile'=>'profile.php',
                'Staff Management'=>'staff_registration.php',
                'User Management'=>'user_registration.php',
                'Slot Management'=>'slot_management.php',
                'Rate Management'=>'rate_management.php',
                'Search Slot'=>'search_slot.php',
                'Reservation Management'=>'rate_management.php',
                ];
        }elseif ($role ==  'staff') {
            $menu = [
                'Profile'=>'profile.php',
                'User Management'=>'user_registration.php',
                'Slot Management'=>'slot_management.php',
                'Rate Management'=>'rate_management.php',
                'Search Slot'=>'search_slot.php',
                'Reservation Management'=>'rate_management.php',
                ];
        }elseif ($role ==  'user') {
            $menu = [
                'Profile'=>'profile.php',
                'Search Slot'=>'search_slot.php',
                'Reservation Management'=>'rate_management.php',
                ];
        } else {
           $menu =[];
        }

?>

<ul class="nav">
    <?php    foreach($menu as $title =>$url){ ?>
        <li>
                        <a class="nav-link" href="<?php echo $url; ?> ">
                            <!--<i class="nc-icon nc-chart-pie-35"></i>-->
                            <p><?php echo $title; ?></p>
                        </a>
                    </li>
    <?php } ?>       
                </ul>

