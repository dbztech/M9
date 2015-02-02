<?php
class cards 
{
    public static function loadCards($cardsToLoad) {
        foreach($cardsToLoad as $currentCard) {
            $filename = "Cards/".$currentCard.".php";
            if ($currentCard == "Data" || $currentCard == "Users") {
                echo '<div class="card homeviews" id="'.$currentCard.'">';
            } else {
                echo '<div class="card" id="'.$currentCard.'">';
            }
            
            #echo $filename;
            if (file_exists($filename)) {
                include($filename);
    	    }
            echo '</div>';
        }
    }
    
    public static function adminPanel() {
        $type = user::getUserType();
        if ($type == "admin") {
            $cards = Array('Data', 'ChangeData', 'CreateData', 'ChangeDataContent', 'ChangeDataTag', 'Users', 'ChangeUsers', 'CreateUsers', 'ChangeUsername', 'ChangeUserPassword', 'ChangeUserType', 'AddGroup');
        } elseif ($type == "standard") {
            $cards = Array('Data', 'ChangeData', 'CreateData', 'ChangeDataContent', 'ChangeDataTag');
        }
        cards::loadCards($cards);
    }
}
?>